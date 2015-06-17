<?php

/**
* Plugin Name: Chat for Aesop Story Engine
* Stylized conversation content driven by Aesop Story Engine.
*
* @package   Lasso
* @author    Paul Eiche <peiche@gmail.com>
* @link      http://eichefam.net/projects/ase-chat
*
* Plugin Name:       Chat for Aesop Story Engine
* Plugin URI:        http://eichefam.net/projects/ase-chat
* Description:       Stylized conversation content driven by Aesop Story Engine.
* Version:           1.0.0
* Author:            Paul Eiche
* Author URI:        http://eichefam.net
* Text Domain:       ase-chat
* Domain Path:       /languages
*/

class chatComponent {

	function __construct(){

		define('MY_VERSION', '1.0');
		define('MY_DIR', plugin_dir_path( __FILE__ ));
		define('MY_URL', plugins_url( '', __FILE__ ));

		require_once(MY_DIR.'class.shortcode.php');
		require_once(MY_DIR.'class.settings.php');

		if ( class_exists('Aesop_Core') )
			require_once(MY_DIR.'class.backend.php');

		// compatibility aesop front end editor
		if ( class_exists( 'lasso_autoloader' ) ) {

			//define('LASSO_CUSTOM', true);
			require_once(MY_DIR.'class.front-end.php');
		}

		// optional enqueue js or css
		add_action('wp_enqueue_scripts', 		array($this,'scripts'));
        
        if ( !class_exists( 'TGM_Plugin_Activation' ) ) {
			include MY_DIR.'inc/class-tgm-plugin-activation.php';
		}
        
        add_action( 'tgmpa_register',  array( $this,'required_plugins' ));
        
	}

	/**
	*
	*	Optional add js or css
	*/
	function scripts(){

		// this handy function checks a post or page to see if your component exists beore enqueueing assets
		if ( function_exists('aesop_component_exists') && aesop_component_exists('chat') ) {

			wp_enqueue_style('chat-style', MY_URL.'/css/style.css', MY_VERSION ); // chat.css
			
		}

	}
    
    /**
	 * Register the required plugins for this theme.
	 *
	 *	@since 1.0.0
	 */
	function required_plugins() {

	    $plugins = array(

	        array(
	            'name'      => __('Aesop Story Engine','ase-chat'),
	            'slug'      => 'aesop-story-engine',
	            'required'  => false,
	        ),

	    );

	    $config = array(
	        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
	        'menu'         => 'ase-chat-install-plugins', // Menu slug.
	        'has_notices'  => true,                    // Show admin notices or not.
	        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
	        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
	        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
	        'message'      => '',                      // Message to output right before the plugins table.
	        'strings'      => array(
	            'page_title'                      => __( 'Install Required Plugins', 'ase-chat' ),
	            'menu_title'                      => __( 'Install Plugins', 'ase-chat' ),
	            'installing'                      => __( 'Installing Plugin: %s', 'ase-chat' ), // %s = plugin name.
	            'oops'                            => __( 'Something went wrong with the plugin API.', 'ase-chat' ),
	            'notice_can_install_required'     => _n_noop( 'This plugin requires the following plugin: %1$s.', 'This plugin requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
	            'notice_can_install_recommended'  => _n_noop( 'This plugin recommends the following plugin: %1$s.', 'This plugin recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
	            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
	            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
	            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
	            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
	            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this plugin: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this plugin: %1$s.' ), // %1$s = plugin name(s).
	            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
	            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
	            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
	            'return'                          => __( 'Return to Required Plugins Installer', 'ase-chat' ),
	            'plugin_activated'                => __( 'Plugin activated successfully.', 'ase-chat' ),
	            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'ase-chat' ), // %s = dashboard link.
	            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
	        )
	    );

	    tgmpa( $plugins, $config );

	}

}

new chatComponent;

