<?php
/**
 * Warehouse Cargo Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Warehouse Cargo
 */

use WPTRT\Customize\Section\Warehouse_Cargo_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Warehouse_Cargo_Button::class );

    $manager->add_section(
        new Warehouse_Cargo_Button( $manager, 'warehouse_cargo_pro', [
            'title'       => __( 'Warehouse Cargo Pro', 'warehouse-cargo' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'warehouse-cargo' ),
            'button_url'  => esc_url( 'https://www.themagnifico.net/themes/warehouse-wordpress-theme/', 'warehouse-cargo')
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'warehouse-cargo-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'warehouse-cargo-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function warehouse_cargo_customize_register($wp_customize){
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('warehouse_cargo_logo_title', array(
        'default' => true,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_logo_title',array(
        'label'          => __( 'Enable Disable Title', 'warehouse-cargo' ),
        'section'        => 'title_tagline',
        'settings'       => 'warehouse_cargo_logo_title',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('warehouse_cargo_logo_text', array(
        'default' => true,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_logo_text',array(
        'label'          => __( 'Enable Disable Tagline', 'warehouse-cargo' ),
        'section'        => 'title_tagline',
        'settings'       => 'warehouse_cargo_logo_text',
        'type'           => 'checkbox',
    )));

    // Theme Color
    $wp_customize->add_section('warehouse_cargo_color_option',array(
        'title' => esc_html__('Theme Color','warehouse-cargo'),
        'description' => esc_html__('Change theme color on one click.','warehouse-cargo'),
        'priority'   => 10
    ));

    $wp_customize->add_setting( 'warehouse_cargo_theme_color', array(
        'default' => '#fb7b15',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'warehouse_cargo_theme_color', array(
        'label' => esc_html__('First Color Option','warehouse-cargo'),
        'section' => 'warehouse_cargo_color_option',
        'settings' => 'warehouse_cargo_theme_color' 
    )));

    $wp_customize->add_setting( 'warehouse_cargo_theme_color_2', array(
        'default' => '#292119',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'warehouse_cargo_theme_color_2', array(
        'label' => esc_html__('Second Color Option','warehouse-cargo'),
        'section' => 'warehouse_cargo_color_option',
        'settings' => 'warehouse_cargo_theme_color_2' 
    )));

    // General Settings
     $wp_customize->add_section('warehouse_cargo_general_settings',array(
        'title' => esc_html__('General Settings','warehouse-cargo'),
        'description' => esc_html__('General settings of our theme.','warehouse-cargo'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('warehouse_cargo_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'warehouse-cargo' ),
        'section'        => 'warehouse_cargo_general_settings',
        'settings'       => 'warehouse_cargo_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'warehouse_cargo_preloader_bg_color', array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'warehouse_cargo_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','warehouse-cargo'),
        'section' => 'warehouse_cargo_general_settings',
        'settings' => 'warehouse_cargo_preloader_bg_color' 
    )));
    
    $wp_customize->add_setting( 'warehouse_cargo_preloader_dot_1_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'warehouse_cargo_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','warehouse-cargo'),
        'section' => 'warehouse_cargo_general_settings',
        'settings' => 'warehouse_cargo_preloader_dot_1_color' 
    )));

    $wp_customize->add_setting( 'warehouse_cargo_preloader_dot_2_color', array(
        'default' => '#fb7b15',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'warehouse_cargo_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','warehouse-cargo'),
        'section' => 'warehouse_cargo_general_settings',
        'settings' => 'warehouse_cargo_preloader_dot_2_color' 
    )));

    $wp_customize->add_setting('warehouse_cargo_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'warehouse_cargo_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'warehouse_cargo_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'warehouse-cargo' ),
        'section'        => 'warehouse_cargo_general_settings',
        'settings'       => 'warehouse_cargo_sticky_header',
        'type'           => 'checkbox',
    )));

    // Top Header
    $wp_customize->add_section('warehouse_cargo_top_header',array(
        'title' => esc_html__('Top Header','warehouse-cargo'),
    ));
    
    $wp_customize->add_setting('warehouse_cargo_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('warehouse_cargo_facebook_url',array(
        'label' => esc_html__('Facebook Link','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('warehouse_cargo_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('warehouse_cargo_twitter_url',array(
        'label' => esc_html__('Twitter Link','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('warehouse_cargo_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('warehouse_cargo_intagram_url',array(
        'label' => esc_html__('Intagram Link','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('warehouse_cargo_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('warehouse_cargo_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('warehouse_cargo_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('warehouse_cargo_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_pintrest_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('warehouse_cargo_email',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('warehouse_cargo_email',array(
        'label' => esc_html__('Add Email','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_email',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('warehouse_cargo_phone',array(
        'default' => '',
        'sanitize_callback' => 'warehouse_cargo_sanitize_phone_number'
    ));
    $wp_customize->add_control('warehouse_cargo_phone',array(
        'label' => esc_html__('Add Phone Number','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_phone',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('warehouse_cargo_location',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_location',array(
        'label' => esc_html__('Add Location','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_location',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('warehouse_cargo_careers_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('warehouse_cargo_careers_text',array(
        'label' => esc_html__('Careers Text','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_careers_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('warehouse_cargo_careers_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('warehouse_cargo_careers_url',array(
        'label' => esc_html__('Careers URL','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_careers_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('warehouse_cargo_headerbtn_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('warehouse_cargo_headerbtn_text',array(
        'label' => esc_html__('Button Text','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_headerbtn_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('warehouse_cargo_headerbtn_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('warehouse_cargo_headerbtn_url',array(
        'label' => esc_html__('Button URL','warehouse-cargo'),
        'section' => 'warehouse_cargo_top_header',
        'setting' => 'warehouse_cargo_headerbtn_url',
        'type'  => 'url'
    ));

    //Slider
    $wp_customize->add_section('warehouse_cargo_top_slider',array(
        'title' => esc_html__('Slider Option','warehouse-cargo')
    ));

    for ( $count = 1; $count <= 3; $count++ ) {
        $wp_customize->add_setting( 'warehouse_cargo_top_slider_page' . $count, array(
            'default'           => '',
            'sanitize_callback' => 'warehouse_cargo_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'warehouse_cargo_top_slider_page' . $count, array(
            'label'    => __( 'Select Slide Page', 'warehouse-cargo' ),
            'section'  => 'warehouse_cargo_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    // Details Section
    $wp_customize->add_section('warehouse_cargo_details_section',array(
        'title' => esc_html__('Contact Details Section','warehouse-cargo')
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_call_heading',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('warehouse_cargo_detail_call_heading',array(
        'label' => esc_html__('Call Center Heading','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_call_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('warehouse_cargo_detail_call_text',array(
        'label' => esc_html__('Calling Number','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_working_heading',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_working_heading',array(
        'label' => esc_html__('Working Hour Heading','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_working_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('warehouse_cargo_detail_working_text',array(
        'label' => esc_html__('Timming','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_location_heading',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_location_heading',array(
        'label' => esc_html__('Location Heading','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_location_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('warehouse_cargo_detail_location_text',array(
        'label' => esc_html__('Location','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_quote_heading',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_quote_heading',array(
        'label' => esc_html__('Detailed Quote Heading','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_quote_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('warehouse_cargo_detail_quote_text',array(
        'label' => esc_html__('Button Text','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'text',
    ));

    $wp_customize->add_setting('warehouse_cargo_detail_quote_url',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('warehouse_cargo_detail_quote_url',array(
        'label' => esc_html__('Button URL','warehouse-cargo'),
        'section'   => 'warehouse_cargo_details_section',
        'type'      => 'url',
    ));



    // Latest Post Section
    $wp_customize->add_section('warehouse_cargo_latest_post',array(
        'title' => esc_html__('Latest Post Section','warehouse-cargo')
    ));

    $wp_customize->add_setting('warehouse_cargo_latest_post_loop',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('warehouse_cargo_latest_post_loop',array(
        'label' => esc_html__('No of latest post','warehouse-cargo'),
        'section'   => 'warehouse_cargo_latest_post',
        'type'      => 'number',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 0,
            'max'              => 12,
        ),
    ));

    $latest_post_loop = get_theme_mod('warehouse_cargo_latest_post_loop');

    $args = array('numberposts' => -1);
    $post_list = get_posts($args);
    $i = 1;
    $pst_sls[]= __('Select','warehouse-cargo');
    foreach ($post_list as $key => $p_post) {
        $pst_sls[$p_post->ID]=$p_post->post_title;
    }
    for ( $i = 1; $i <= $latest_post_loop; $i++ ) {
        $wp_customize->add_setting('warehouse_cargo_other_latest_post_section'.$i,array(
            'sanitize_callback' => 'warehouse_cargo_sanitize_choices',
        ));
        $wp_customize->add_control('warehouse_cargo_other_latest_post_section'.$i,array(
            'type'    => 'select',
            'choices' => $pst_sls,
            'label' => __('Select Post','warehouse-cargo'),
            'section' => 'warehouse_cargo_latest_post',
        ));
    }
    wp_reset_postdata();
    
    // Footer
    $wp_customize->add_section('warehouse_cargo_site_footer_section', array(
        'title' => esc_html__('Footer', 'warehouse-cargo'),
    ));

    $wp_customize->add_setting('warehouse_cargo_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('warehouse_cargo_footer_text_setting', array(
        'label' => __('Replace the footer text', 'warehouse-cargo'),
        'section' => 'warehouse_cargo_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
}
add_action('customize_register', 'warehouse_cargo_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function warehouse_cargo_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function warehouse_cargo_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function warehouse_cargo_customize_preview_js(){
    wp_enqueue_script('warehouse-cargo-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'warehouse_cargo_customize_preview_js');