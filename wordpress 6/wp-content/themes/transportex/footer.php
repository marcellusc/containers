<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package transportex
 */
?>
<!--==================== transportex-FOOTER AREA ====================-->
<?php $transportex_footer_text_color = get_theme_mod('transportex_footer_text_color','#fff'); ?>
  <style>
  footer .transportex-widget h1, footer .transportex-widget h2,footer .transportex-widget h3, footer .transportex-widget h4,footer .transportex-widget h5,footer .transportex-widget h6 {color: <?php echo esc_attr($transportex_footer_text_color); ?>}
  </style>
  <?php 
  $transportex_footer_widget_background = get_theme_mod('transportex_footer_widget_background');
  $transportex_overlay_footer_widget_control = get_theme_mod('transportex_overlay_footer_widget_control'); 
   if($transportex_footer_widget_background != '') { ?>
<footer style="background-image:url('<?php echo esc_url($transportex_footer_widget_background);?>');">
  <?php } else { ?>
<footer> 
  <?php } ?>
  <div class="overlay" style="background-color: <?php echo esc_attr($transportex_overlay_footer_widget_control);?>;">
      <?php if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
      <div class="transportex-footer-widget-area">
        <div class="container">
          <div class="row">
            <?php  dynamic_sidebar( 'footer_widget_area' ); ?>
          </div>
          <!--/row-->
        </div>
        <!--/container-->
      </div>
      <?php } ?>
      <div class="transportex-footer-copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
			<p>&copy; <?php echo esc_html(date('Y')).' '; bloginfo( 'name' ); ?> | <?php printf( esc_html__( 'Theme by %1$s', 'transportex' ),  '<a href="'.esc_url('https://www.themeansar.com').'" rel="designer">Themeansar</a>' ); ?></p>
			</div>
			
			
            <div class="col-md-6 text-right text-xs">
              <ul class="transportex-social">
                <?php if(get_theme_mod('social_link_facebook','#')) { ?>
                <li><span class="icon-soci"> <a href="<?php echo esc_url(get_theme_mod('social_link_facebook')); ?>" <?php if(get_theme_mod('Social_link_facebook_tab')==1){ echo "target='_blank'"; } ?> ><i class="fab fa-facebook-square"></i></a></span></li>
                <?php } if(get_theme_mod('social_link_twitter','#')) { ?>
            <li><span class="icon-soci"><a href="<?php echo esc_url(get_theme_mod('social_link_twitter')); ?>" <?php if(get_theme_mod('Social_link_twitter_tab')==1){ echo "target='_blank'"; } ?> ><i class="fab fa-twitter"></i></a></span></li>
            <?php } if(get_theme_mod('social_link_linkedin','#')) { ?>
            <li><span class="icon-soci"><a href="<?php echo esc_url(get_theme_mod('social_link_linkedin')); ?>" <?php if(get_theme_mod('Social_link_linkedin_tab')==1){ echo "target='_blank'"; } ?> ><i class="fab fa-linkedin"></i></a></span></li>
            <?php } if(get_theme_mod('social_link_google','#')) { ?>
            <li><span class="icon-soci"><a href="<?php echo esc_url(get_theme_mod('social_link_google')); ?>" <?php if(get_theme_mod('Social_link_google_tab')==1){ echo "target='_blank'"; } ?> ><i class="fab fa-google-plus-g"></i></a></span></li>
            <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/overlay-->
  </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>