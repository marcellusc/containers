<?php
// Footer copyright section 
function transportex_footer_copyright( $wp_customize ) {
	$wp_customize->add_panel('transportex_copyright', array(
		'priority' => 32,
		'capability' => 'edit_theme_options',
		'title' => __('Footer Section', 'transportex'),
	) );
    
	//Footer social link 
	$wp_customize->add_section('copyright_social_icon', array(
        'title' => __('Social Media','transportex'),
        'priority' => 45,
		'panel' => 'transportex_copyright',
    ) );

	// Facebook link
	$wp_customize->add_setting('social_link_facebook', array(
        'sanitize_callback' => 'esc_url_raw',
		'default' => '#',
    ) );
	$wp_customize->add_control('social_link_facebook', array(
        'label' => __('Facebook','transportex'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_facebook_tab',array(
        'sanitize_callback' => 'transportex_copyright_sanitize_checkbox',
	));
	$wp_customize->add_control('Social_link_facebook_tab', array(
        'type' => 'checkbox',
        'label' => __('Open link in a new tab','transportex'),
        'section' => 'copyright_social_icon',
    ) );

	//Twitter link
	$wp_customize->add_setting( 'social_link_twitter', array(
       'sanitize_callback' => 'esc_url_raw',
	   'default' => '#',
    ) );
	$wp_customize->add_control( 'social_link_twitter', array(
        'label' => __('Twitter','transportex'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting( 'Social_link_twitter_tab',array(
	   'sanitize_callback' => 'transportex_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'Social_link_twitter_tab', array(
        'type' => 'checkbox',
        'label' => __('Open link in a new tab','transportex'),
        'section' => 'copyright_social_icon',
    ) );

	//Linkdin link
	$wp_customize->add_setting( 'social_link_linkedin', array(
       'sanitize_callback' => 'esc_url_raw',
	   'default' => '#',
    ) );
	$wp_customize->add_control( 'social_link_linkedin', array(
        'label' => __('Linkedin','transportex'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting( 
        'Social_link_linkedin_tab',array(
        'sanitize_callback' => 'transportex_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'Social_link_linkedin_tab', array(
        'type' => 'checkbox',
        'label' => __('Open link in a new tab','transportex'),
        'section' => 'copyright_social_icon',
    ) );

	//Google-plus link
	$wp_customize->add_setting('social_link_google', array(
        'sanitize_callback' => 'esc_url_raw',
		'default' => '#',
    ) );
	$wp_customize->add_control('social_link_google', array(
        'label' => __('Google-plus','transportex'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_google_tab',array(
        'sanitize_callback' => 'transportex_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control('Social_link_google_tab', array(
        'type' => 'checkbox',
        'label' => __('Open link in a new tab','transportex'),
        'section' => 'copyright_social_icon',
    ) );

    $wp_customize->add_section('footer_widget_back', array(
        'title' => __('Background Setting','transportex'),
        'priority' => 30,
        'panel' => 'transportex_copyright',
    ) );
    
	
	//Footer Widget Background image
    $wp_customize->add_setting( 
        'transportex_footer_widget_background', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'transportex_footer_widget_background', array(
        'label'    => __( 'Background Image', 'transportex' ),
        'section'  => 'footer_widget_back',
        'settings' => 'transportex_footer_widget_background',
    ) ) );
    
	//Footer Widget Overlay Color
	$wp_customize->add_setting(
				'transportex_overlay_footer_widget_control', array(
				'sanitize_callback' => 'esc_url_raw',
				)


			);

			$wp_customize->add_control(new Transportex_Customize_Alpha_Color_Control( $wp_customize,'transportex_overlay_footer_widget_control', array(
				'label' => __('Overlay Color', 'transportex' ),
				'palette' => true,
				'section' => 'footer_widget_back')
	) );


	//Footer text color
	$wp_customize->add_setting(
		'transportex_footer_text_color', array( 'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'transportex_footer_text_color', array(
		'label' => __('Title Color', 'transportex' ),
		'palette' => true,
		'section' => 'footer_widget_back')
	) );
	
	
    

   $wp_customize->add_section('footer_widget_column', array(
        'title' => __('Widget Column Layout','transportex'),
        'priority' => 30,
		'panel' => 'transportex_copyright',
    ) );
	
	
	
	 $wp_customize->add_setting(
                'transportex_footer_column_layout', array(
                'default' => 3,
                'sanitize_callback' => 'transportex_sanitize_select',
            ) );

            $wp_customize->add_control(
                'transportex_footer_column_layout', array(
                'type' => 'select',
                'label' => __('Select Column Layout','transportex'),
                'section' => 'footer_widget_column',
                'choices' => array(1=>1, 2=>2,3=>3,4=>4),
            ) );
		
	function transportex_footer_copyright_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

	}
	

	function transportex_copyright_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
}
add_action( 'customize_register', 'transportex_footer_copyright' );
?>