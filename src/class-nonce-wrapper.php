<?php

namespace Nonce;

/**
 * Class Nonce_Wrapper
 *
 * @author Asvin <asvin.balloo@gmail.com>
 * @package Nonce
 */

interface Nonce_Interface {
	/**
	 * [wp_nonce_ays description]
	 * @param  String $action The nonce action.
	 */
	public static function wp_nonce_ays( $action );

	/**
	 * Generates and returns a nonce. The nonce is generated based on the current time, the $action argument, and the current user ID.
	 * @param  Integer $action Action name. Default: -1.
	 * @return String          The one use form token.
	 */
	public static function wp_create_nonce( $action = -1 );

	/**
	 * Verify that a nonce is correct and unexpired with the respect to a specified action.
	 * @param  String $nonce   Nonce to verify.
	 * @param  String $action  Action name. Default: -1.
	 * @return Boolean/Integer False if the nonce is invalid, 1 – if the nonce has been generated in the past 12 hours or less., 2 – if the nonce was generated between 12 and 24 hours ago.
	 */
	public static function wp_verify_nonce( $nonce, $action = -1 );

	/**
	 * Retrieves or displays the nonce hidden form field.
	 * @param  String  $action  Action name. Optional but recommended. Default value: -1.
	 * @param  String  $name    Nonce name. Default: '_wpnonce'.
	 * @param  Boolean $referer Whether also the referer hidden form field should be created with the wp_referer_field() function. Default: true.
	 * @param  Boolean $echo    Whether to display or return the nonce hidden form field, and also the referer hidden form field if the $referer argument is set to true. Default: true.
	 * @return String           The nonce hidden form field, optionally followed by the referer hidden form field if the $referer argument is set to true.
	 */
	public static function wp_nonce_field( $action = -1, $name = '_wpnonce', $referer = true, $echo = true );

	/**
	 * Retrieve URL with nonce added to URL query.
	 * @param  String $actionurl URL to add nonce action.
	 * @param  String $action    Nonce action name Default: -1.
	 * @param  String $name      Nonce name. Default: '_wpnonce'.
	 * @return String            URL with nonce action added.
	 */
	public static function wp_nonce_url( $actionurl, $action = -1, $name = '_wpnonce' );

	/**
	 * Tests either if the current request carries a valid nonce
	 * @param  String $action    Action name. Optional but recommended. Default value: -1.
	 * @param  String $query_arg Nonce name. Default: '_wpnonce'.
	 * @return Boolean            Either true or false.
	 */
	public static function check_admin_referer( $action = -1, $query_arg = '_wpnonce' );

	/**
	 * Verifies the AJAX request to prevent processing requests external of the blog.
	 * @param  String  $action    Action nonce. Default: -1.
	 * @param  String  $query_arg Where to look for nonce in $_REQUEST. Default: false.
	 * @param  Boolean $die       whether to die if the nonce is invalid. Default: true.
	 * @return Boolean            If parameter $die is set to false this function will return a boolean of true if check passes or false if check fails.
	 */
	public static function check_ajax_referer( $action = -1, $query_arg = false, $die = true );

	/**
	 * Retrieves or displays the referer hidden form field.
	 * @param  boolean $echo Whether to display or return the referer hidden form field. Default: true.
	 * @return String        Referer field.
	 */
	public static function wp_referer_field( $echo = true );
}

/**
 * Class Nonce_Wrapper
 *
 * @author Asvin <asvin.balloo@gmail.com>
 * @package Nonce
 */
class Wrapper implements Nonce_Interface {
	/**
	 * [wp_nonce_ays description]
	 * @param  String $action The nonce action.
	 */
	public static function wp_nonce_ays( $action ) {
		wp_nonce_ays( $action );
	}

	/**
	 * Generates and returns a nonce. The nonce is generated based on the current time, the $action argument, and the current user ID.
	 * @param  Integer $action Action name. Default: -1.
	 * @return String          The one use form token.
	 */
	public static function wp_create_nonce( $action = -1 ) {
		return wp_create_nonce( $action );
	}

	/**
	 * Verify that a nonce is correct and unexpired with the respect to a specified action.
	 * @param  String $nonce   Nonce to verify.
	 * @param  String $action  Action name. Default: -1.
	 * @return Boolean/Integer False if the nonce is invalid, 1 – if the nonce has been generated in the past 12 hours or less., 2 – if the nonce was generated between 12 and 24 hours ago.
	 */
	public static function wp_verify_nonce( $nonce, $action = -1 ) {
		return wp_verify_nonce( $nonce, $action );
	}

	/**
	 * Retrieves or displays the nonce hidden form field.
	 * @param  String  $action  Action name. Optional but recommended. Default value: -1.
	 * @param  String  $name    Nonce name. Default: '_wpnonce'.
	 * @param  Boolean $referer Whether also the referer hidden form field should be created with the wp_referer_field() function. Default: true.
	 * @param  Boolean $echo    Whether to display or return the nonce hidden form field, and also the referer hidden form field if the $referer argument is set to true. Default: true.
	 * @return String           The nonce hidden form field, optionally followed by the referer hidden form field if the $referer argument is set to true.
	 */
	public static function wp_nonce_field( $action = -1, $name = '_wpnonce', $referer = true, $echo = true ) {
		return wp_nonce_field( $action, $name, $referer, $echo );
	}

	/**
	 * Retrieve URL with nonce added to URL query.
	 * @param  String $actionurl URL to add nonce action.
	 * @param  String $action    Nonce action name Default: -1.
	 * @param  String $name      Nonce name. Default: '_wpnonce'.
	 * @return String            URL with nonce action added.
	 */
	public static function wp_nonce_url( $actionurl, $action = -1, $name = '_wpnonce' ) {
		return wp_nonce_url( $actionurl, $action, $name );
	}

	/**
	 * Tests either if the current request carries a valid nonce
	 * @param  String $action    Action name. Optional but recommended. Default value: -1.
	 * @param  String $query_arg Nonce name. Default: '_wpnonce'.
	 * @return Boolean            Either true or false.
	 */
	public static function check_admin_referer( $action = -1, $query_arg = '_wpnonce' ) {
		return check_admin_referer( $action, $query_arg );
	}

	/**
	 * Verifies the AJAX request to prevent processing requests external of the blog.
	 * @param  String  $action    Action nonce. Default: -1.
	 * @param  String  $query_arg Where to look for nonce in $_REQUEST. Default: false.
	 * @param  Boolean $die       whether to die if the nonce is invalid. Default: true.
	 * @return Boolean            If parameter $die is set to false this function will return a boolean of true if check passes or false if check fails.
	 */
	public static function check_ajax_referer( $action = -1, $query_arg = false, $die = true ) {
		return check_ajax_referer( $action, $query_arg, $die );
	}

	/**
	 * Retrieves or displays the referer hidden form field.
	 * @param  boolean $echo Whether to display or return the referer hidden form field. Default: true.
	 * @return String        Referer field.
	 */
	public static function wp_referer_field( $echo = true ) {
		return wp_referer_field( $echo );
	}
}
