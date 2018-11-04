<?php
/**
 * Template Name: Donation Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">
  <div class="<?php echo esc_attr( $container ); ?>" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">
          <article id="post-126" class="post-126 page type-page status-publish hentry">
            <div class="entry-content">

              <!-- Error Modal -->
              <div id="error_modal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title">Donation Error!</h2>
                    </div>
                    <div id="error_modal_text" class="modal-body"></div>
                    <div class="modal-footer">
                      <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Address Validation Modal -->
              <div id="address_validate_modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title">Confirm You Address</h2>
                    </div>
                    <div class="modal-body">
                      <h4>We found record of your address at:</h4>
                      <pre id="verify_address"></pre>
                      <pre id="usps_extra" hidden=""></pre>
                      <p><button id="use_validated_address" class="btn btn-primary" type="button" data-dismiss="modal">Confirm Address</button></p>
                      <h4>If address above is incorrect, we can use your original entry:</h4>
                      <pre id="entered_address"></pre>
                      <p><button id="use_entered_address" class="btn btn-primary" type="button" data-dismiss="modal">Use Address Originally Entered</button></p>
                    </div>
                    <div class="modal-footer"><button id="cancel_address_validation" class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>`
                    </div>
                  </div>
                </div>
              </div>

              <section id="donation">
                <div id="donation-form" class="">
                  <!--  -->
                </div>
                <div id="donation-success" hidden="">Thanks for you donation! A receipt has been emailed to you.</div>
              </section>
            </div><!-- .entry-content -->
          </article>
        </main><!-- #main -->
      </div><!-- #primary -->
    </div><!-- .row end -->
  </div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>
<!-- I don't feel great about loading this script right here because, network latency, etc.
could cause the next script to fail. Maybe set a better checker there? -->
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
  window.$ = jQuery.noConflict();

	console.log("I'm here and running.");
		// This needs to be moved to a secret if possible.
	var stripe = Stripe('pk_live_4ya4D9KVkQXROVBM4XKgcEgx');
	var elements = stripe.elements();
	var card = elements.create('card', {
		hidePostalCode: true,
		style: {
			base: {
			iconColor: '#666EE8',
			color: '#31325F',
			lineHeight: '40px',
			fontWeight: 300,
			fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
			fontSize: '15px',
			height: '20px',
			'::placeholder': {
					color: '#CFD7E0',
				}
			},
		}
	});

	// Use Alpaca styling for Stripe forms.
	card.addEventListener('change', function(event) {
		if (event.error) {
			$('#card-errors').parent().removeClass('alpaca-field-valid')
				.addClass('has-error')
				.addClass('alpaca-invalid');
			$('#card-errors').html('<i class="glyphicon glyphicon-exclamation-sign"></i>&nbsp;')
				.append(event.error.message).show();
			$('#donation-form input[name=donation_info_stripe_token]').val('bad');
		} else {
			$('#card-errors').parent().removeClass('has-error')
				.removeClass('alpaca-invalid')
				.addClass('alpaca-field-valid');
			$('#card-errors').text('').hide();
			if (event.complete) {
				$('#donation-form input[name=donation_info_stripe_token]').val('tok_000000000000000000000000');
			}
		}
	});

	// Get Alpaca-ready field to build form.
	$.getJSON( "/donation/donate", function(schema) {
		var now = new Date();
		schema.options.fields.donation_info.fields.first_charge = {
			"picker": {
				"defaultDate": now,
				"minDate": now,
				"maxDate": new Date().setDate(now.getDate() + 60)
			}
		};

		schema.options.fields.donation_info.fields.custom_amount['validator'] = function(callback) {
			value = this.getValue();
			if (!value) {
				callback({
					'status': false,
					'message': 'This field is not optional.'
				});
			} else if (value < this.schema.minimum) {
				callback({
					'status': false,
					'message': Alpaca.substituteTokens("Value must be at least ${0}.", [this.schema.minimum])
				});
			} else if (value > this.schema.maximum) {
				callback({
					'status': false,
					'message': Alpaca.substituteTokens("Value may be at most ${0}.", [this.schema.maximum])
				});
			} else {
				callback({'status': true});
			}
    };

    schema.postRender = function(control) {
			$('#donation-form button[type=submit]').addClass('ladda-button')
				.addClass('btn-primary')
				.removeClass('btn-default')
				.attr('data-style', 'expand-left');
      card.mount('#card-element');
    };
    $("#donation-form").alpaca(schema);
  });

	$('#donation-form').submit(function(event) {
    event.preventDefault();
    Ladda.create(document.querySelector('#donation-form button[type=submit]')).start();
    var address = {
			address_line_1: $('#donation-form input[name=billing_address_address_line_1]').val(),
			address_line_2: $('#donation-form input[name=billing_address_address_line_2]').val(),
			city: $('#donation-form input[name=billing_address_city]').val(),
			state: $('#donation-form select[name=billing_address_state]').val(),
			zip_code: $('#donation-form input[name=billing_address_zip_code]').val(),
    };
    $.ajax({
			type: 'POST',
			url: '/usps/validate',
			data: JSON.stringify(address),
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			success: process_validated_address,
			error: function(jqxhr) {
				var errorElement = document.getElementById('error_modal_text');
				errorElement.textContent = result.error;
				$('#error_modal').modal('show');
				Ladda.stopAll();
      }
    });
  });

	// TODO: Remove from global scope.
	var address;
  function process_validated_address(data) {
    if (!($('#donation-form input[name=billing_address_address_line_1]').val() != data['address_line_1'] ||
			$('#donation-form input[name=billing_address_address_line_2]').val() != data['address_line_2'] ||
			$('#donation-form input[name=billing_address_city]').val() != data['city'] ||
			$('#donation-form select[name=billing_address_state]').val() != data['state'] ||
			$('#donation-form input[name=billing_address_zip_code]').val() != data['zip_code'])) {
        address_selected();
        return;
    }
    $('#verify_address').text(data["address_line_1"] + " " + data["address_line_2"] + "\n" + data["city"] + ", " + data["state"] + "  " + data["zip_code"]);
    if (data.usps_extra.ReturnText) {
      $('#usps_extra').text("USPS WARNING:\n" + data.usps_extra.ReturnText).show();
    } else {
      $('#usps_extra').hide();
    }
    $('#entered_address').text(
			$('#donation-form input[name=billing_address_address_line_1]').val() + " " +
			$('#donation-form input[name=billing_address_address_line_2]').val() + "\n" +
			$('#donation-form input[name=billing_address_city]').val() + ", " +
			$('#donation-form select[name=billing_address_state]').val() + "  " +
			$('#donation-form input[name=billing_address_zip_code]').val()
		);

    $('#address_validate_modal').modal('show');
    address = data;
  }
	$('#use_validated_address').click(function(event) {
		$('#donation-form input[name=billing_address_address_line_1]').val(address["address_line_1"]);
		$('#donation-form input[name=billing_address_address_line_2]').val(address["address_line_2"]);
		$('#donation-form input[name=billing_address_city]').val(address["city"]);
		$('#donation-form select[name=billing_address_state]').val(address["state"]);
		$('#donation-form input[name=billing_address_zip_code]').val(address["zip_code"]);
 	  address_selected();
  });

	$('#use_entered_address').click(address_selected);

	$('#cancel_address_validation').click(function(event) {
		Ladda.stopAll();
	});

	function address_selected() {
		var stripe_info = {
			name: $('#donation-form input[name=personal_info_first_name]').val() + ' ' + $('#donation-form input[name=personal_info_last_name]').val(),
			address_line1: $('#donation-form input[name=billing_address_address_line_1]').val(),
			address_line2: $('#donation-form input[name=billing_address_address_line_2]').val(),
			address_city: $('#donation-form input[name=billing_address_city]').val(),
			address_state: $('#donation-form select[name=billing_address_state]').val(),
			address_zip: $('#donation-form input[name=billing_address_zip_code]').val(),
		};
		stripe.createToken(card, stripe_info).then(process_stripe_token_creation);
	}

	function process_stripe_token_creation(result) {
		if (result.token) {
			$('#donation-form input[name=donation_info_stripe_token]').val(result.token.id);
			$.ajax({
				type: 'POST',
				url: '/donation/donate',
				data: JSON.stringify($("#donation-form").alpaca("get").getValue()),
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				success: process_donation,
				error: function(jqxhr) {
					var errorElement = document.getElementById('error_modal_text');
					if (jqxhr.responseJSON) {
						errorElement.textContent = jqxhr.responseJSON.error;
					} else {
						errorElement.textContent = 'Unknown error.';
					}
					$('#error_modal').modal('show');
					Ladda.stopAll();
				}
			});
		} else if (result.error) {
			var errorElement = document.getElementById('error_modal_text');
			errorElement.textContent = result.error.message;
			$('#error_modal').modal('show');
			Ladda.stopAll();
		}
	}

	function process_donation(result) {
		if (result.error) {
			var errorElement = document.getElementById('error_modal_text');
			errorElement.textContent = result.error;
			$('#error_modal').modal('show');
			Ladda.stopAll();
		} else {
			$('#donation-form').hide();
			$('#donation-success').show();
			Ladda.stopAll();
		}
	}
</script>
<style type="text/css">
.StripeElement {
  background-color: white;
  padding: 10px 12px;
  border-radius: 4px;
  border: 1px solid transparent;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
  width: 100%;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
