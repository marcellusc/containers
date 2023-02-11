<?php
/* Notify in customizer */
require get_template_directory() . '/inc/icy/customizer-notify/transportex-customizer-notify.php';

$config_customizer = array(
	'recommended_plugins'       => array(
		'icyclub' => array(
			'recommended' => true,
			'description' => sprintf('Activate by installing <strong>ICYCLUB</strong> plugin to use front page and all theme features %s.', 'transportex'),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'transportex' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'transportex' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'transportex' ),
	'activate_button_label'     => esc_html__( 'Activate', 'transportex' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'transportex' ),
);
Transportex_Customizer_Notify::init( apply_filters( 'transportex_customizer_notify_array', $config_customizer ) );