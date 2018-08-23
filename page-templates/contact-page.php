<?php
/**
 * Template Name: Contact Page
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
					
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

				<img class="vinyl_img" style="max-height: 800px;" src="<?php echo get_template_directory_uri() . '/images/contact_vinyl.svg'; ?>)">
				
			</div>

			<div class="col-lg-6 col-md-6 align-self-center col-sm-6 col-xs-12">
				<p class="mobile_text_center">426 Jackson Street
				<br>Camden, NJ 08104</p>
				<p class="mobile_text_center"><b>856.202.3968</b></p>

				<h2 class="pt-5 entry-title ">SEND US A MESSAGE</h2>
				<?= do_shortcode( '[civicrm component="profile" gid="16" mode="create" hijack="1"]' ); ?>

				<!-- Message Confirmation lives here...
				https://themusecollaborative.org/contact/message-confirmation/ -->
			</div>

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

<script type="text/javascript">

	jQuery(document).ready(function(){
		
		jQuery('#editrow-email-Primary').keyup(function () { 
			jQuery('#editrow-email-Primary').find('.label').hide(); 
		});

		jQuery('#editrow-first_name').keyup(function () { 
			jQuery('#editrow-first_name').find('.label').hide(); 
		});
		
		jQuery('#editrow-last_name').keyup(function () { 
			jQuery('#editrow-last_name').find('.label').hide(); 
		});

		jQuery('#custom_8').keyup(function () { 
			jQuery('#editrow-custom_8').find('.label').hide(); 
		});

	});
</script>

<style type="text/css">
	#crm-container.crm-public input[type="text"], .crm-container textarea {
		background: #534f4c;
		width: 80%;
		border: none;
		border-radius: 0px;
	}
	.crm-container textarea {
		width: 102%;
		/*border-radius: 3px;*/
	}
	.crm-container .crm-section .label {
	    width: unset;
	}
	.crm-container div.messages, #printer-friendly, .crm-submit-buttons .cancel {
		visibility: hidden;
		position: absolute;
	}
	#crm-container.crm-public .label {
	/*	visibility: hidden;*/
		position: absolute;
		color: white;
		padding-top: 11px;
	}
	.crm-container .required {
	    color: white;
	}
	.crm-container .crm-marker, .crm-i-button>.crm-i {
		visibility: hidden;
	}
	#editrow-last_name .label label{
		padding-left: 7px;
	}
	.crm-container .crm-section .content {
		margin: 0px;
	}
	div.crm-container label {
	    display: table;
	    padding-left: 8px;
	}
	.crm-container .crm-button {
		border-radius: 0px;
	    text-shadow: none;
	    background: #534f4c;
	    border: none;
	    text-align: center;
	}
	.crm-container .crm-button.crm-i-button input.crm-form-submit {
		padding: 5px 32px;
    	font-size: 15px;
	}
	.crm-submit-buttons {
		margin-top: 50px !important;
	}
	@media screen and (max-width: 575px) {
		.vinyl_img {
			transform: rotate(90deg);
			max-height: 200px !important;
		}	
		.mobile_text_center {
			text-align: center;
		}
	}
</style>