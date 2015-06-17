<?php
/**
 *
 *	This file deals with adding our custom component to Aesop Story Engine frontend interface
 *
 *  @package   Chat for Aesop Story Engine
 */

/**
 *  Frontend component definition
 */
class ChatComponentFront {

    /**
     *  Create the components used by Lasso.
     */
	function __construct() {
		add_action( 'lasso_toolbar_components',   array( $this, 'components_list' ) );
		add_filter( 'lasso_components',           array( $this, 'components_available' ), 11, 1 );
	}

	/**
	 *
	 *	Add our component to the drop-up list of components
	 *
	 *	Note: data-type must match the component slug listed above
	 */
	function components_list() {
		?><li data-type="chat" title="Chat"></li><?php
	}

	/**
	 *
	 * First let's wipe out the existing components and replace with our own
	 *
	 * @param array $existing Variable passed on to array_merge().
	 */
	function components_available( $existing ) {

		$components = array(
			'chat' => array(
				'name' => 'Image',
				'content' => self::my_callback(),
			),
		);

		return array_merge( $existing, $components );
	}

	/**
	 *
	 *	Create a docs image component ( Dynamic (shortcode) Based )
	 */
	function my_callback() {
		return do_shortcode( '[aesop_chat]' ); // Note how this matches above. 'aesop' is automatically prefixed.
	}

}
new ChatComponentFront;
