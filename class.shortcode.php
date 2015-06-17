<?php

/**
*
*	Draws the shorcode component used for Aesop Story Engine
* 	Note: components in shortcode form not required see class.front-end.php
*
*/
class chatComponentSC {

	// the shortcode HAS to start with aesop_
	function __construct(){
		add_shortcode('aesop_chat', 			array($this, 'shortcode') );
	}

	/**
	*
	*	Components are shortcodes
	*
	*
	*/
	function shortcode($atts, $content = null) {

		$defaults = array(
            'style'         => '',
			'width'         => '',
            'bg'            => '#eeeeee',
            'bubble'        => '#333333',
            'text'          => '#ffffff',
            'dir'           => 'left',
            'content'       => '',
            'avatar'        => '',
            'avatar_style'  => '',
		);

		$atts 	= shortcode_atts($defaults, $atts);

		// account for multiple instances of this component
		static $instance = 0;
		$instance++;
		$unique = sprintf('chat-shortcode-%s-%s',get_the_ID(), $instance);

		// example of getting an option value
		$style          = $atts[ 'style' ];
        $bg             = $atts[ 'bg' ];
        $width          = $atts[ 'width' ];
        $dir            = $atts[ 'dir' ];
        $bubble         = $atts[ 'bubble' ];
        $text           = $atts[ 'text' ];
        $content        = $atts[ 'content' ];
        $avatar         = $atts[ 'avatar' ];
        $avatar_style   = $atts[ 'avatar_style' ];
        
        $has_avatar = $avatar != '' ? 'has-avatar' : '';

		// if lasso is active we need to map the sc atts as data-attributes
		if ( class_exists( 'lasso_autoloader' ) && ( function_exists('lasso_user_can') && lasso_user_can() ) ) {
			$options = function_exists('aesop_component_data_atts') ? aesop_component_data_atts('chat', $unique, $atts) : false;
		} else {
			$options = false;
		}

		$out = sprintf('<div id="%s" %s class="aesop-component aesop-component-chat %s %s" style="background-color: %s;"><div class="aesop-component-chat-container clearfix" style="max-width: %spx; text-align: %s;"><p class="aesop-component-chat-bubble aesop-component-chat-direction-%s" style="background-color: %s; color: %s;"><span class="aesop-component-chat-bubble-arrow" style="border-color: %s;"></span>%s</p><div class="aesop-component-chat-avatar %s" style="background-image: url(\'%s\');"></div></div></div>', $unique, $options, $style, $has_avatar, $bg, $width, $dir, $dir, $bubble, $text, $bubble, $content, $avatar_style, $avatar);

		return $out;
	}
}
new chatComponentSC;