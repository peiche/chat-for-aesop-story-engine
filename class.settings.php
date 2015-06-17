<?php
/**
 *
 *	This class is responsible for creating custom options used by both Aesop Story Engine and Lasso
 *
 *  @package   Chat for Aesop Story Engine
 */

/**
 * Settings definition, used by front- and backend
 */
class chatComponentSettings {

    /**
     * Add the options for Lasso (frontend) and Aesop Story Engine (backend)
     */
	function __construct() {

		// If you arent using Lasso then this filter isn't needed.
		add_filter( 'lasso_custom_options',   array( $this, 'options' ) );

		// If you arent using aesop story engine then this filter isn't needed.
		add_filter( 'aesop_avail_components', array( $this, 'options' ) );
	}

	/**
	 *
	 *	This adds our options into the generator for both Lasso and Aesop Story Engine
	 *
     *  @param array $shortcodes The shortcodes used by the addon.
	 */
	function options( $shortcodes ) {

		$custom = array(
			'chat' 						=> array(
				'name' 					=> 'Chat Component',
				'type' 					=> 'single',
				'atts' 					=> array(
					'style'   		    => array(
						'type'			=> 'select',
						'values' 		=> array(
							array(
								'value' => '',
								'name'	=> 'Default',
							),
                            array(
                                'value' => 'generic',
                                'name'  => 'Generic',
                            ),
                            array(
								'value' => 'hangouts',
								'name'	=> 'Google Hangouts',
							),
							array(
								'value' => 'fb',
								'name'	=> 'Facebook Messenger',
							),
                            array(
								'value' => 'ios',
								'name'	=> 'iOS',
							),
						),
						'default' 		=> '',
						'desc' 			=> 'Appearance',
						'tip'			=> 'The style of the chat bubble.',
					),
                    'width' 		    => array(
						'type'			=> 'text_small',
						'default' 		=> '',
						'desc' 			=> 'Width',
						'prefix'		=> 'px',
						'tip'			=> 'Set the chat width.',
					),
                    'bg' 			    => array(
						'type'			=> 'color',
						'default' 		=> '#eeeeee',
						'desc' 			=> 'Background Color',
						'tip'			=> 'Set the chat background color.',
					),
                    'bubble'    	    => array(
						'type'			=> 'color',
						'default' 		=> '#333333',
						'desc' 			=> 'Chat Color',
						'tip'			=> 'Set the chat bubble color.',
					),
                    'text' 		        => array(
						'type'			=> 'color',
						'default' 		=> '#ffffff',
						'desc' 			=> 'Text Color',
						'tip'			=> 'Set the chat text color.',
					),
                    'dir'   		    => array(
						'type'			=> 'select',
						'values' 		=> array(
							array(
								'value' => 'left',
								'name'	=> 'Left',
							),
							array(
								'value' => 'right',
								'name'	=> 'Right',
							),
						),
						'default' 		=> 'left',
						'desc' 			=> 'Direction',
						'tip'			=> 'The direction of the chat bubble.',
					),
                    'content' 		    => array(
						'type'			=> 'text_area',
						'default' 		=> 'left',
						'desc' 			=> 'Content',
						'tip'			=> 'The content of the chat bubble.',
					),
                    'avatar'            => array(
                        'type'          => 'media_upload',
                        'default'       => '',
                        'desc'          => 'Avatar',
                        'tip'           => 'The avatar for the chat bubble.',
                    ),
                    'avatar_style'      => array(
                        'type'          => 'select',
                        'values'        => array(
                            array(
                                'value' => '',
                                'name'  => 'Square',
                            ),
                            array(
                                'value' => 'squircle',
                                'name'  => 'Rounded Corners',
                            ),
                            array(
                                'value' => 'circle',
                                'name'  => 'Circle',
                            ),
                        ),
                        'default'       => '',
                        'desc'          => 'Avatar Style',
                        'tip'           => 'The shape of the avatar.',
                    ),
				),
			),
		);

		return array_merge( $shortcodes, $custom );
	}
}
new chatComponentSettings;
