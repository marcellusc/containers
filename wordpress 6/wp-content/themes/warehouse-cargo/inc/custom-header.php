<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Warehouse Cargo
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses warehouse_cargo_header_style()
 */
function warehouse_cargo_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'warehouse_cargo_custom_header_args', array(
		'width'                  => 1600,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'warehouse_cargo_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'warehouse_cargo_custom_header_setup' );

if ( ! function_exists( 'warehouse_cargo_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see warehouse_cargo_custom_header_setup().
	 */
	function warehouse_cargo_header_style() {
		$header_text_color = get_header_textcolor(); ?>

		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				.navigation_header,.page-template-home-template .navigation_header {
					background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
					background-position: center top;
				    background-size: cover;
				}
			<?php endif; ?>
		</style>
		
		<?php
	}
endif;