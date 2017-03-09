<?php
add_action( 'tgmpa_register', 'qode_revolution_slider_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
if (!function_exists('qode_revolution_slider_register_required_plugins')) {
	function qode_revolution_slider_register_required_plugins() {

		/**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(

			// This is an example of how to include a plugin pre-packaged with a theme
			array(
				'name'               => 'Revolution Slider',
				'slug'               => 'revslider',
				'source'             => get_template_directory() . '/plugins/revslider.zip',
				'version'            => '5.2.6',
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => ''
			)
		);

		// Change this to your theme text domain, used for internationalising strings

		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'           => 'qode',
			'default_path'     => '',
			'parent_slug' 	   => 'themes.php',
			'capability' 	   => 'edit_theme_options',
			'menu'             => 'install-required-plugins',
			'has_notices'      => true,
			'is_automatic'     => false,
			'message'          => '',
			'strings'          => array(
				'page_title'                      => esc_html__('Install Required Plugins', 'qode'),
				'menu_title'                      => esc_html__('Install Plugins', 'qode'),
				'installing'                      => esc_html__('Installing Plugin: %s', 'qode'),
				'oops'                            => esc_html__('Something went wrong with the plugin API.', 'qode'),
				'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'qode'),
				'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'qode'),
				'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'qode'),
				'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'qode'),
				'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'qode'),
				'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'qode'),
				'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'qode'),
				'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'qode'),
				'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', 'qode'),
				'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins', 'qode'),
				'return'                          => esc_html__('Return to Required Plugins Installer', 'qode'),
				'plugin_activated'                => esc_html__('Plugin activated successfully.', 'qode'),
				'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'qode'),
				'nag_type'                        => 'updated'
			)
		);


		tgmpa( $plugins, $config );
	}
}
?>