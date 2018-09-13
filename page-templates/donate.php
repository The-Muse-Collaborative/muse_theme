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
					
					<script src="https://js.stripe.com/v3/"></script>


					<form action="/charge" method="post" id="payment-form">
					  <div class="form-row">
					    <label for="card-element">
					      Credit or debit card
					    </label>
					    <div id="card-element">
					      <!-- A Stripe Element will be inserted here. -->
					    </div>

					    <!-- Used to display Element errors. -->
					    <div id="card-errors" role="alert"></div>
					  </div>

					  <button>Submit Payment</button>
					</form>

					<script type="text/javascript">
						// Create a Stripe client.
						var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');

						// Create an instance of Elements.
						var elements = stripe.elements();

						// Custom styling can be passed to options when creating an Element.
						// (Note that this demo uses a wider set of styles than the guide below.)
						var style = {
						  base: {
						    color: '#32325d',
						    lineHeight: '18px',
						    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
						    fontSmoothing: 'antialiased',
						    fontSize: '16px',
						    '::placeholder': {
						      color: '#aab7c4'
						    }
						  },
						  invalid: {
						    color: '#fa755a',
						    iconColor: '#fa755a'
						  }
						};

						// Create an instance of the card Element.
						var card = elements.create('card', {style: style});

						// Add an instance of the card Element into the `card-element` <div>.
						card.mount('#card-element');

						// Handle real-time validation errors from the card Element.
						card.addEventListener('change', function(event) {
						  var displayError = document.getElementById('card-errors');
						  if (event.error) {
						    displayError.textContent = event.error.message;
						  } else {
						    displayError.textContent = '';
						  }
						});

						// Handle form submission.
						var form = document.getElementById('payment-form');
						form.addEventListener('submit', function(event) {
						  event.preventDefault();

						  stripe.createToken(card).then(function(result) {
						    if (result.error) {
						      // Inform the user if there was an error.
						      var errorElement = document.getElementById('card-errors');
						      errorElement.textContent = result.error.message;
						    } else {
						      // Send the token to your server.
						      stripeTokenHandler(result.token);
						    }
						  });
						});
						</script>

						<p>To cancel an existing recurring donation please click <a href="//localhost:3000/cancel-donation">here</a>.</p>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

<style type="text/css">
.StripeElement {
  background-color: white;
  height: 40px;
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