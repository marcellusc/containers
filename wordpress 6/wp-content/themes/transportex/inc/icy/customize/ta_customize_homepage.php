<?php function transportex_homepage_setting( $wp_customize ) { 
			
			$wp_customize->add_panel( 'homepage_setting', array(
                'priority' => 30,
                'capability' => 'edit_theme_options',
                'title' => __('Homepage Section Settings', 'transportex'),
            ) );       
}

add_action( 'customize_register', 'transportex_homepage_setting' );
?>