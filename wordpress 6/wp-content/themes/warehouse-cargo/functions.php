<?php
/**
 * Warehouse Cargo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Warehouse Cargo
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Warehouse_Cargo_Loader.php' );

$Warehouse_Cargo_Loader = new \WPTRT\Autoload\Warehouse_Cargo_Loader();

$Warehouse_Cargo_Loader->warehouse_cargo_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Warehouse_Cargo_Loader->warehouse_cargo_register();

if ( ! function_exists( 'warehouse_cargo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function warehouse_cargo_setup() {

		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        add_image_size('warehouse-cargo-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','warehouse-cargo' ),
	        'footer'=> esc_html__( 'Footer Menu','warehouse-cargo' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'warehouse_cargo_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'warehouse_cargo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function warehouse_cargo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'warehouse_cargo_content_width', 1170 );
}
add_action( 'after_setup_theme', 'warehouse_cargo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function warehouse_cargo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'warehouse-cargo' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'warehouse-cargo' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'warehouse_cargo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function warehouse_cargo_scripts() {

	wp_enqueue_style('warehouse-cargo-font', warehouse_cargo_font_url(), array());

	wp_enqueue_style( 'warehouse-cargo-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'flatly-css', esc_url(get_template_directory_uri()) . '/assets/css/flatly.css');

    wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri()) . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'warehouse-cargo-style', get_stylesheet_uri() );

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', esc_url(get_template_directory_uri()).'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('warehouse-cargo-theme-js', esc_url(get_template_directory_uri()) . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', esc_url(get_template_directory_uri()) . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'warehouse_cargo_scripts' );

/**
 * Enqueue theme color style.
 */
function warehouse_cargo_theme_color() {

    $theme_color_css = '';
    $warehouse_cargo_theme_color = get_theme_mod('warehouse_cargo_theme_color');
    $warehouse_cargo_theme_color_2 = get_theme_mod('warehouse_cargo_theme_color_2');
    $warehouse_cargo_preloader_bg_color = get_theme_mod('warehouse_cargo_preloader_bg_color');
    $warehouse_cargo_preloader_dot_1_color = get_theme_mod('warehouse_cargo_preloader_dot_1_color');
    $warehouse_cargo_preloader_dot_2_color = get_theme_mod('warehouse_cargo_preloader_dot_2_color');

    if(get_theme_mod('warehouse_cargo_preloader_bg_color') == '') {
			$warehouse_cargo_preloader_bg_color = '#000';
		}
		if(get_theme_mod('warehouse_cargo_preloader_dot_1_color') == '') {
			$warehouse_cargo_preloader_dot_1_color = '#fff';
		}
		if(get_theme_mod('warehouse_cargo_preloader_dot_2_color') == '') {
			$warehouse_cargo_preloader_dot_2_color = '#fb7b15';
		}

	$theme_color_css = '
		.social-link i:hover,.headerbtn a,.slider-box-btn a,.details-bg a,span.onsale,.pro-button a,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce-account .woocommerce-MyAccount-navigation ul li,.woocommerce a.added_to_cart,.main-navigation .sub-menu,.main-navigation .sub-menu > li > a:hover, .main-navigation .sub-menu > li > a:focus,.post-navigation .nav-previous a:hover,.post-navigation .nav-next a:hover,.posts-navigation .nav-previous a:hover,.posts-navigation .nav-next a:hover,.navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover,.navigation.pagination .nav-links span.current,.navigation.pagination .nav-links span:hover,.comment-respond input#submit,#colophon,.sidebar .tagcloud a:hover,.toggle-nav i,.sidenav .closebtn,#button,.sidebar input[type="submit"], .sidebar button[type="submit"],.sidebar h5,.woocommerce .woocommerce-ordering select,.pro-button a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{
		background: '.esc_attr($warehouse_cargo_theme_color).';
		}
		@media screen and (max-width:1000px){
	         .sidenav #site-navigation {
	        background: '.esc_attr($warehouse_cargo_theme_color).';
	 		}
		}
		a,.top_header i,.postcat-name,a.btn-text,p.price,.woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce-message::before,.woocommerce-info::before,.main-navigation .menu > li > a:hover,.widget a:hover, .widget a:focus,.details i,.sidebar ul li a:hover{
			color: '.esc_attr($warehouse_cargo_theme_color).';
		}
		.woocommerce-message,.woocommerce-info,.post-navigation .nav-previous a:hover,.post-navigation .nav-next a:hover,.posts-navigation .nav-previous a:hover,.posts-navigation .nav-next a:hover,.woocommerce-message, .woocommerce-info{
			border-color: '.esc_attr($warehouse_cargo_theme_color).';
		}
		#button:hover,#button:active,.top_header,.slider-box,.slider-box-btn a:hover,.headerbtn a:hover,.details-bg a:hover,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{
		background: '.esc_attr($warehouse_cargo_theme_color_2).';
		}
		h1,h2,h3,h4,h5,h6,.article-box a,thead.table-book{
		color: '.esc_attr($warehouse_cargo_theme_color_2).';
		}
		.socialmedia{
		border-color: '.esc_attr($warehouse_cargo_theme_color_2).';
		}








		.loading{
			background-color: '.esc_attr($warehouse_cargo_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($warehouse_cargo_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($warehouse_cargo_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'warehouse-cargo-style',$theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'warehouse_cargo_theme_color' );

/**
 * Enqueue S Header.
 */
function warehouse_cargo_sticky_header() {

	$warehouse_cargo_sticky_header = get_theme_mod('warehouse_cargo_sticky_header');

	$warehouse_cargo_custom_style= "";

	if($warehouse_cargo_sticky_header != true){

		$warehouse_cargo_custom_style .='.stick_header{';

			$warehouse_cargo_custom_style .='position: static;';
			
		$warehouse_cargo_custom_style .='}';
	} 

	wp_add_inline_style( 'warehouse-cargo-style',$warehouse_cargo_custom_style );

}
add_action( 'wp_enqueue_scripts', 'warehouse_cargo_sticky_header' );

function warehouse_cargo_font_url(){
	$font_url = '';
	$poppins = _x('on','Poppins:on or off','warehouse-cargo');
	
	if('off' !== $poppins ){
		$font_family = array();
		if('off' !== $poppins){
			$font_family[] = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
		}
		$query_args = array(
			'family' => urlencode(implode('|',$font_family)),
		);
		$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	}
	return $font_url;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*radio button sanitization*/
function warehouse_cargo_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/*dropdown page sanitization*/
function warehouse_cargo_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*checkbox sanitization*/
function warehouse_cargo_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function warehouse_cargo_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function warehouse_cargo_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function warehouse_cargo_remove_sections( $wp_customize ) {
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('display_header_text');
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_setting('header_textcolor');	
}
add_action( 'customize_register', 'warehouse_cargo_remove_sections');

/**
 * Get CSS
 */

function warehouse_cargo_getpage_css($hook) {
	if ( 'appearance_page_warehouse-cargo-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'warehouse-cargo-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'warehouse_cargo_getpage_css' );

add_action('after_switch_theme', 'warehouse_cargo_setup_options');

function warehouse_cargo_setup_options () {
	wp_redirect( admin_url() . 'themes.php?page=warehouse-cargo-info.php' );
}

if ( ! defined( 'WAREHOUSE_CARGO_CONTACT_SUPPORT' ) ) {
define('WAREHOUSE_CARGO_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/warehouse-cargo/','warehouse-cargo'));
}
if ( ! defined( 'WAREHOUSE_CARGO_REVIEW' ) ) {
define('WAREHOUSE_CARGO_REVIEW',__('https://wordpress.org/support/theme/warehouse-cargo/reviews/','warehouse-cargo'));
}
if ( ! defined( 'WAREHOUSE_CARGO_LIVE_DEMO' ) ) {
define('WAREHOUSE_CARGO_LIVE_DEMO',__('https://www.themagnifico.net/demo/warehouse-cargo/','warehouse-cargo'));
}
if ( ! defined( 'WAREHOUSE_CARGO_GET_PREMIUM_PRO' ) ) {
define('WAREHOUSE_CARGO_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/warehouse-wordpress-theme/','warehouse-cargo'));
}
if ( ! defined( 'WAREHOUSE_CARGO_PRO_DOC' ) ) {
define('WAREHOUSE_CARGO_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/warehouse-cargo-pro-doc/','warehouse-cargo'));
}

add_action('admin_menu', 'warehouse_cargo_themepage');
function warehouse_cargo_themepage(){
	$theme_info = add_theme_page( __('Theme Options','warehouse-cargo'), __('Theme Options','warehouse-cargo'), 'manage_options', 'warehouse-cargo-info.php', 'warehouse_cargo_info_page' );
}

function warehouse_cargo_info_page() {
	$user = wp_get_current_user();
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap warehouse-cargo-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','warehouse-cargo'); ?><?php echo esc_html( $theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "warehouse-cargo"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Warehouse Cargo , feel free to contact us for any support regarding our theme.", "warehouse-cargo"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( WAREHOUSE_CARGO_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "warehouse-cargo"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "warehouse-cargo"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "warehouse-cargo"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( WAREHOUSE_CARGO_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
							<?php esc_html_e("Get Premium", "warehouse-cargo"); ?>
						</a></p>
					</div>
				</div>  
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "warehouse-cargo"); ?></h3>
						<p><?php esc_html_e("If You love Warehouse Cargo theme then we would appreciate your review about our theme.", "warehouse-cargo"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( WAREHOUSE_CARGO_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "warehouse-cargo"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<h2><?php esc_html_e("Free Vs Premium","warehouse-cargo"); ?></h2>
		<div class="warehouse-cargo-button-container">
			<a target="_blank" href="<?php echo esc_url( WAREHOUSE_CARGO_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "warehouse-cargo"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( WAREHOUSE_CARGO_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "warehouse-cargo"); ?>
			</a>
		</div>
		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong class="points"><?php esc_html_e("Theme Feature", "warehouse-cargo"); ?></strong></th>
					<th><strong class="points"><?php esc_html_e("Basic Version", "warehouse-cargo"); ?></strong></th>
					<th><strong class="points"><?php esc_html_e("Premium Version", "warehouse-cargo"); ?></strong></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "warehouse-cargo"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "warehouse-cargo"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "warehouse-cargo"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "warehouse-cargo"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="warehouse-cargo-button-container">
			<a target="_blank" href="<?php echo esc_url( WAREHOUSE_CARGO_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
				<?php esc_html_e("Go Premium", "warehouse-cargo"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Change number or products per row to 3

add_filter('loop_shop_columns', 'warehouse_cargo_loop_columns', 999);
if (!function_exists('warehouse_cargo_loop_columns')) {
	function warehouse_cargo_loop_columns() {
		return 3;
	}
}