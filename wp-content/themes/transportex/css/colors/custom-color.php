<?php
/*----Custom Colors----*/ 
function transportex_custom_color() {


	$transportex_calltoaction_text_color = get_theme_mod('transportex_calltoaction_text_color', '#fff');

	$transportex_service_overlay_color = get_theme_mod('transportex_service_overlay_color',);
    $transportex_service_text_color = get_theme_mod('transportex_service_text_color', );

	$transportex_callout_overlay_color = get_theme_mod('transportex_callout_overlay_color',);
	$transportex_callout_text_color = get_theme_mod('transportex_callout_text_color',);

	$testimonial_overlay_color = get_theme_mod('testimonial_overlay_color',);
	$testimonial_text_color = get_theme_mod('testimonial_text_color', );
?>
<style type="text/css">


.ta-calltoaction-box-info h5 , .ta-calltoaction-box-info p {
	color: <?php echo $transportex_calltoaction_text_color; ?>;
}

.ta-service-section .overlay{
	background:<?php echo $transportex_service_overlay_color; ?>;
}

.ta-service-section .ta-heading h3 , .ta-service-section .ta-heading p {
	color:<?php echo $transportex_service_text_color; ?>;
}

.ta-callout .overlay {
	background:<?php echo $transportex_callout_overlay_color; ?>;
}

.ta-callout-inner h3 , .ta-callout-inner p {
	color: <?php echo $transportex_callout_text_color; ?>;
}

.testimonials-section .overlay {
	background:<?php echo $testimonial_overlay_color; ?>;
}

.testimonials-section .ta-heading h3,  .testimonials-section .ta-heading p {
	color: <?php echo $testimonial_text_color; ?>;
}

</style>
<?php
}

add_action('wp_footer','transportex_custom_color');
?>