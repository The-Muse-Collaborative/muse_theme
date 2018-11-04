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
                  <form role="form" id="alpaca3" data-alpaca-form-id="alpaca3" class="alpaca-form">
                    <div class="alpaca-field alpaca-field-object alpaca-optional alpaca-create alpaca-top alpaca-invalid" data-alpaca-field-id="alpaca2" data-alpaca-field-path="/" data-alpaca-field-name="">

                      <!-- Personal Info -->
                      <div class="alpaca-container alpaca-vertical alpaca-container-has-items" data-alpaca-container-item-count="3">
                        <div class="alpaca-container-item alpaca-container-item-first" data-alpaca-container-item-index="0" data-alpaca-container-item-name="personal_info" data-alpaca-container-item-parent-field-id="alpaca2">
                          <div class="alpaca-field alpaca-field-object alpaca-required alpaca-invalid" data-alpaca-field-id="alpaca4" data-alpaca-field-path="/personal_info" data-alpaca-field-name="personal_info">
                            <legend class="alpaca-container-label">Personal Information</legend>
                            <div class="alpaca-container alpaca-vertical alpaca-container-has-items" data-alpaca-container-item-count="3">
                              <div class="alpaca-container-item alpaca-container-item-first" data-alpaca-container-item-index="0" data-alpaca-container-item-name="personal_info_email" data-alpaca-container-item-parent-field-id="alpaca4">
                                <div class="form-group alpaca-field alpaca-field-email alpaca-required alpaca-autocomplete has-error alpaca-invalid" data-alpaca-field-id="alpaca5" data-alpaca-field-path="/personal_info/email" data-alpaca-field-name="personal_info_email">
                                  <label class="control-label alpaca-control-label" for="alpaca5"><span class="alpaca-icon-required glyphicon glyphicon-star"></span><span class="alpaca-icon-required glyphicon glyphicon-star"></span>Email Address</label>
                                  <input type="email" id="alpaca5" name="personal_info_email" class="alpaca-control form-control" autocomplete="off">
                                  <div class="help-block alpaca-message alpaca-message-notOptional">
                                      <i class="glyphicon glyphicon-exclamation-sign"></i>&nbsp;This field is not optional.
                                  </div>
                                </div>
                              </div>
                              <div class="alpaca-container-item" data-alpaca-container-item-index="1" data-alpaca-container-item-name="personal_info_first_name" data-alpaca-container-item-parent-field-id="alpaca4">
                                <div class="form-group alpaca-field alpaca-field-text alpaca-required alpaca-autocomplete" data-alpaca-field-id="alpaca6" data-alpaca-field-path="/personal_info/first_name" data-alpaca-field-name="personal_info_first_name">
                                <label class="control-label alpaca-control-label" for="alpaca6"><span class="alpaca-icon-required glyphicon glyphicon-star"></span><span class="alpaca-icon-required glyphicon glyphicon-star"></span>First Name</label>
                                <input type="text" id="alpaca6" name="personal_info_first_name" class="alpaca-control form-control" autocomplete="off">
                              </div>
                            </div>
                            <div class="alpaca-container-item alpaca-container-item-last" data-alpaca-container-item-index="2" data-alpaca-container-item-name="personal_info_last_name" data-alpaca-container-item-parent-field-id="alpaca4">
                              <div class="form-group alpaca-field alpaca-field-text alpaca-required alpaca-autocomplete" data-alpaca-field-id="alpaca7" data-alpaca-field-path="/personal_info/last_name" data-alpaca-field-name="personal_info_last_name">
                                <label class="control-label alpaca-control-label" for="alpaca7"><span class="alpaca-icon-required glyphicon glyphicon-star"></span><span class="alpaca-icon-required glyphicon glyphicon-star"></span>Last Name</label>
                                <input type="text" id="alpaca7" name="personal_info_last_name" class="alpaca-control form-control" autocomplete="off">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Billing Address -->
                      <div class="alpaca-container-item" data-alpaca-container-item-index="1" data-alpaca-container-item-name="billing_address" data-alpaca-container-item-parent-field-id="alpaca2">
                        <div class="alpaca-field alpaca-field-object alpaca-required" data-alpaca-field-id="alpaca8" data-alpaca-field-path="/billing_address" data-alpaca-field-name="billing_address">
                          <legend class="alpaca-container-label">Billing Address</legend>
                          <div class="alpaca-container alpaca-vertical alpaca-container-has-items" data-alpaca-container-item-count="5">
                            <div class="alpaca-container-item alpaca-container-item-first" data-alpaca-container-item-index="0" data-alpaca-container-item-name="billing_address_address_line_1" data-alpaca-container-item-parent-field-id="alpaca8">
                              <div class="form-group alpaca-field alpaca-field-text alpaca-required alpaca-autocomplete" data-alpaca-field-id="alpaca9" data-alpaca-field-path="/billing_address/address_line_1" data-alpaca-field-name="billing_address_address_line_1">
                                <label class="control-label alpaca-control-label" for="alpaca9"><span class="alpaca-icon-required glyphicon glyphicon-star"></span><span class="alpaca-icon-required glyphicon glyphicon-star"></span>Billing Address</label>
                                <input type="text" id="alpaca9" placeholder="Street and number, P.O. box, c/o." name="billing_address_address_line_1" class="alpaca-control form-control" autocomplete="off">
                              </div>
                            </div>
                            <div class="alpaca-container-item" data-alpaca-container-item-index="1" data-alpaca-container-item-name="billing_address_address_line_2" data-alpaca-container-item-parent-field-id="alpaca8">
                              <div class="form-group alpaca-field alpaca-field-text alpaca-optional alpaca-autocomplete" data-alpaca-field-id="alpaca10" data-alpaca-field-path="/billing_address/address_line_2" data-alpaca-field-name="billing_address_address_line_2">
                                <input type="text" id="alpaca10" placeholder="[Optional] Apartment, suite, unit, building, floor, etc." name="billing_address_address_line_2" class="alpaca-control form-control" autocomplete="off">
                              </div>
                            </div>
                            <div class="alpaca-container-item" data-alpaca-container-item-index="2" data-alpaca-container-item-name="billing_address_city" data-alpaca-container-item-parent-field-id="alpaca8">
                              <div class="form-group alpaca-field alpaca-field-text alpaca-required alpaca-autocomplete" data-alpaca-field-id="alpaca11" data-alpaca-field-path="/billing_address/city" data-alpaca-field-name="billing_address_city">
                                <label class="control-label alpaca-control-label" for="alpaca11"><span class="alpaca-icon-required glyphicon glyphicon-star"></span><span class="alpaca-icon-required glyphicon glyphicon-star"></span>City</label>
                                <input type="text" id="alpaca11" name="billing_address_city" class="alpaca-control form-control" autocomplete="off">
                              </div>
                            </div>
                            <div class="alpaca-container-item" data-alpaca-container-item-index="3" data-alpaca-container-item-name="billing_address_state" data-alpaca-container-item-parent-field-id="alpaca8">
                              <div class="form-group alpaca-field alpaca-field-select alpaca-required" data-alpaca-field-id="alpaca12" data-alpaca-field-path="/billing_address/state" data-alpaca-field-name="billing_address_state">
                                <label class="control-label alpaca-control-label" for="alpaca12"><span class="alpaca-icon-required glyphicon glyphicon-star"></span><span class="alpaca-icon-required glyphicon glyphicon-star"></span>State</label>
                                <select id="alpaca12" name="billing_address_state" class="alpaca-control form-control">
                                  <option value="">Select a state...</option>
                                  <option value="AL">Alabama</option>
                                  <option value="AK">Alaska</option>
                                  <option value="AS">American Samoa</option>
                                  <option value="AZ">Arizona</option>
                                  <option value="AR">Arkansas</option>
                                  <option value="AA">Armed Forces Americas</option>
                                  <option value="AE">Armed Forces Europe</option>
                                  <option value="AP">Armed Forces Pacific</option>
                                  <option value="CA">California</option>
                                  <option value="CO">Colorado</option>
                                  <option value="CT">Connecticut</option>
                                  <option value="DE">Delaware</option>
                                  <option value="DC">District of Columbia</option>
                                  <option value="FM">Federated States of Micronesia</option>
                                  <option value="FL">Florida</option>
                                  <option value="GA">Georgia</option>
                                  <option value="GU">Guam</option>
                                  <option value="HI">Hawaii</option>
                                  <option value="ID">Idaho</option>
                                  <option value="IL">Illinois</option>
                                  <option value="IN">Indiana</option>
                                  <option value="IA">Iowa</option>
                                  <option value="KS">Kansas</option>
                                  <option value="KY">Kentucky</option>
                                  <option value="LA">Louisiana</option>
                                  <option value="ME">Maine</option>
                                  <option value="MH">Marshall Islands</option>
                                  <option value="MD">Maryland</option>
                                  <option value="MA">Massachusetts</option>
                                  <option value="MI">Michigan</option>
                                  <option value="MN">Minnesota</option>
                                  <option value="MS">Mississippi</option>
                                  <option value="MO">Missouri</option>
                                  <option value="MT">Montana</option>
                                  <option value="NE">Nebraska</option>
                                  <option value="NV">Nevada</option>
                                  <option value="NH">New Hampshire</option>
                                  <option value="NJ">New Jersey</option>
                                  <option value="NM">New Mexico</option>
                                  <option value="NY">New York</option>
                                  <option value="NC">North Carolina</option>
                                  <option value="ND">North Dakota</option>
                                  <option value="MP">Northern Mariana Islands</option>
                                  <option value="OH">Ohio</option>
                                  <option value="OK">Oklahoma</option>
                                  <option value="OR">Oregon</option>
                                  <option value="PW">Palau</option>
                                  <option value="PA">Pennsylvania</option>
                                  <option value="PR">Puerto Rico</option>
                                  <option value="RI">Rhode Island</option>
                                  <option value="SC">South Carolina</option>
                                  <option value="SD">South Dakota</option>
                                  <option value="TN">Tennessee</option>
                                  <option value="TX">Texas</option>
                                  <option value="UT">Utah</option>
                                  <option value="VT">Vermont</option>
                                  <option value="VI">Virgin Islands</option>
                                  <option value="VA">Virginia</option>
                                  <option value="WA">Washington</option>
                                  <option value="WV">West Virginia</option>
                                  <option value="WI">Wisconsin</option>
                                  <option value="WY">Wyoming</option>
                                </select>
                              </div>
                            </div>
                            <div class="alpaca-container-item alpaca-container-item-last" data-alpaca-container-item-index="4" data-alpaca-container-item-name="billing_address_zip_code" data-alpaca-container-item-parent-field-id="alpaca8">
                              <div class="form-group alpaca-field alpaca-field-text alpaca-required alpaca-autocomplete" data-alpaca-field-id="alpaca13" data-alpaca-field-path="/billing_address/zip_code" data-alpaca-field-name="billing_address_zip_code">
                                <label class="control-label alpaca-control-label" for="alpaca13"><span class="alpaca-icon-required glyphicon glyphicon-star"></span><span class="alpaca-icon-required glyphicon glyphicon-star"></span>Zip Code</label>
                                <input type="text" id="alpaca13" name="billing_address_zip_code" class="alpaca-control form-control" autocomplete="off">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Donation Details -->
                      <div class="alpaca-container-item alpaca-container-item-last" data-alpaca-container-item-index="2" data-alpaca-container-item-name="donation_info" data-alpaca-container-item-parent-field-id="alpaca2">
                        <div class="alpaca-field alpaca-field-object alpaca-required" data-alpaca-field-id="alpaca14" data-alpaca-field-path="/donation_info" data-alpaca-field-name="donation_info">
                          <legend class="alpaca-container-label">
                            Donation Details
                          </legend>
                          <div class="alpaca-container alpaca-vertical alpaca-container-has-items" data-alpaca-container-item-count="6">
                            <div class="alpaca-container-item alpaca-container-item-first" data-alpaca-container-item-index="0" data-alpaca-container-item-name="donation_info_amount" data-alpaca-container-item-parent-field-id="alpaca14">
                                <div class="form-group alpaca-field alpaca-field-radio alpaca-required" data-alpaca-field-id="alpaca15" data-alpaca-field-path="/donation_info/amount" data-alpaca-field-name="donation_info_amount">
                                  <label class="control-label alpaca-control-label" for="alpaca15"><span class="alpaca-icon-required glyphicon glyphicon-star"></span><span class="alpaca-icon-required glyphicon glyphicon-star"></span>Donation Amount</label>
                                  <div class="radio alpaca-control" name="donation_info_amount">
                                    <label>
                                      <input type="radio" name="donation_info_amount" value="5" class="">$5.00
                                    </label>
                                  </div>
                                  <div class="radio alpaca-control" name="donation_info_amount">
                                    <label>
                                      <input type="radio" name="donation_info_amount" value="10" class="">$10.00
                                    </label>
                                  </div>
                                  <div class="radio alpaca-control" name="donation_info_amount">
                                    <label>
                                      <input type="radio" name="donation_info_amount" value="25" class="">$25.00
                                    </label>
                                  </div>
                                  <div class="radio alpaca-control" name="donation_info_amount">
                                    <label>
                                      <input type="radio" name="donation_info_amount" value="0" class="">Custom Amount
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="alpaca-container-item" data-alpaca-container-item-index="1" data-alpaca-container-item-name="donation_info_custom_amount" data-alpaca-container-item-parent-field-id="alpaca14">
                                <div class="form-group alpaca-field alpaca-field-currency alpaca-optional alpaca-autocomplete" data-alpaca-field-id="alpaca16" data-alpaca-field-path="/donation_info/custom_amount" data-alpaca-field-name="donation_info_custom_amount" style="display: none;">
                                  <label class="control-label alpaca-control-label" for="alpaca16"><span class="alpaca-icon-required glyphicon glyphicon-star"></span>Custom Donation Amount</label>
                                  <input type="text" id="alpaca16" name="donation_info_custom_amount" class="alpaca-control form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="alpaca-container-item" data-alpaca-container-item-index="2" data-alpaca-container-item-name="donation_info_recurring" data-alpaca-container-item-parent-field-id="alpaca14">
                                <div class="form-group alpaca-field alpaca-field-checkbox alpaca-required" data-alpaca-field-id="alpaca17" data-alpaca-field-path="/donation_info/recurring" data-alpaca-field-name="donation_info_recurring">
                                  <div class="alpaca-control checkbox" name="donation_info_recurring">
                                    <label>
                                      <input type="checkbox" name="donation_info_recurring" class="">
                                        Make this a recurring donation
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="alpaca-container-item" data-alpaca-container-item-index="3" data-alpaca-container-item-name="donation_info_frequency" data-alpaca-container-item-parent-field-id="alpaca14">
                                <div class="form-group alpaca-field alpaca-field-radio alpaca-optional" data-alpaca-field-id="alpaca18" data-alpaca-field-path="/donation_info/frequency" data-alpaca-field-name="donation_info_frequency" style="display: none;">
                                  <label class="control-label alpaca-control-label" for="alpaca18"><span class="alpaca-icon-required glyphicon glyphicon-star"></span>Donation Frequency</label>
                                   <div class="radio alpaca-control" name="donation_info_frequency" style="display: block;">
                                  <label>
                                    <input type="radio" name="donation_info_frequency" value="monthly" checked="checked" class="">Monthly
                                  </label>
                                </div>
                                <div class="radio alpaca-control" name="donation_info_frequency" style="display: block;">
                                  <label>
                                    <input type="radio" name="donation_info_frequency" value="bimonthly" class="">Bi-Monthly
                                  </label>
                                </div>
                                <div class="radio alpaca-control" name="donation_info_frequency" style="display: block;">
                                  <label>
                                    <input type="radio" name="donation_info_frequency" value="annually" class="">Annually
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="alpaca-container-item" data-alpaca-container-item-index="4" data-alpaca-container-item-name="donation_info_first_charge" data-alpaca-container-item-parent-field-id="alpaca14">
                              <div class="form-group alpaca-field alpaca-field-date alpaca-optional alpaca-autocomplete" data-alpaca-field-id="alpaca19" data-alpaca-field-path="/donation_info/first_charge" data-alpaca-field-name="donation_info_first_charge" style="position: relative; display: none;">
                                <label class="control-label alpaca-control-label" for="alpaca19"><span class="alpaca-icon-required glyphicon glyphicon-star"></span>First Donation Date</label>
                                <input type="text" id="alpaca19" name="donation_info_first_charge" class="alpaca-control form-control" autocomplete="off">
                              </div>
                            </div>
                            <div class="alpaca-container-item alpaca-container-item-last" data-alpaca-container-item-index="5" data-alpaca-container-item-name="donation_info_stripe_token" data-alpaca-container-item-parent-field-id="alpaca14">
                              <div class="form-group alpaca-field alpaca-field-text alpaca-required alpaca-autocomplete" data-alpaca-field-id="alpaca20" data-alpaca-field-path="/donation_info/stripe_token" data-alpaca-field-name="donation_info_stripe_token">
                                <label class="control-label alpaca-control-label" for="alpaca20"><span class="alpaca-icon-required glyphicon glyphicon-star"></span><span class="alpaca-icon-required glyphicon glyphicon-star"></span>Credit/Debit Card</label>
                                <input type="hidden" name="donation_info_stripe_token" class="alpaca-control form-control" autocomplete="off"><div id="card-element" class="alpaca-control StripeElement StripeElement--empty" name="donation_info_stripe_token" autocomplete="off"><div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe frameborder="0" allowtransparency="true" scrolling="no" name="__privateStripeFrame3" allowpaymentrequest="true" src="https://js.stripe.com/v3/elements-inner-card-dfa445c7157d008e89836b741a11c7ff.html#hidePostalCode=true&amp;style[base][iconColor]=%23666EE8&amp;style[base][color]=%2331325F&amp;style[base][lineHeight]=40px&amp;style[base][fontWeight]=300&amp;style[base][fontFamily]=%22Helvetica+Neue%22%2C+Helvetica%2C+sans-serif&amp;style[base][fontSize]=15px&amp;style[base][::placeholder][color]=%23CFD7E0&amp;componentName=card&amp;wait=false&amp;rtl=false&amp;keyMode=live&amp;origin=https%3A%2F%2Fthemusecollaborative.org&amp;referrer=https%3A%2F%2Fthemusecollaborative.org%2Fdonate%2F&amp;controllerId=__privateStripeController0" title="Secure payment input frame" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; height: 40px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"><input class="__PrivateStripeElement-safariInput" aria-hidden="true" tabindex="-1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div></div><div id="card-errors" class="help-block alpaca-control" name="donation_info_stripe_token" autocomplete="off">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="alpaca-form-buttons-container">
                      <button data-key="submit" type="submit" class="alpaca-form-button alpaca-form-button-submit btn ladda-button btn-primary" data-style="expand-left">Donate</button>
                    </div>
                  </form>
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
