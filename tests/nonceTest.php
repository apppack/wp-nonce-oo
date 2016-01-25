<?php
/**
 * Class for testings
 *
 * @author Asvin <asvin.balloo@gmail.com>
 * @package Nonce
 */

// Load wp functions.
define( 'WP_USE_THEMES', false );
require( WP_INSTALL . '/wp-blog-header.php' );

/**
 * Class for testings
 *
 * @author Asvin <asvin.balloo@gmail.com>
 * @package Nonce
 */
class NonceTest extends PHPUnit_Framework_TestCase {
	/**
	 * Test for wp_create_nonce
	 * @return void
	 */
	public function testWpCreateNonce() {
		$nonce = \Nonce\Wrapper::wp_create_nonce();
		$this->assertNotNull( $nonce );
	}

	/**
	 * Test for wp_verify_nonce
	 * @return void
	 */
	public function testWpVerifyNonce() {
		$nonce = \Nonce\Wrapper::wp_create_nonce( );
		$this->assertEquals( 1, \Nonce\Wrapper::wp_verify_nonce( $nonce ) );
		$this->assertNotEquals( 1, \Nonce\Wrapper::wp_verify_nonce( $nonce ) . 'extra' );
	}

	/**
	 * Test for wp_nonce_field
	 * @return void
	 */
	public function testWpNonceField() {
		$field = \Nonce\Wrapper::wp_nonce_field( -1, '_wpnonce', true, false );
		$this->assertNotNull( $field );
	}

	/**
	 * Test for wp_nonce_url
	 * @return void
	 */
	public function testWpNonceUrl() {
		$url = \Nonce\Wrapper::wp_nonce_url( 'http://www.google.com' );
		$urlDetails = parse_url( $url );
		$query = $urlDetails['query'];

		$this->assertStringStartsWith( '_wpnonce=', $query );
	}

	/**
	 * Test for check_admin_referer
	 * @return void
	 */
	public function testCheckAdminReferer() {
		$nonce = \Nonce\Wrapper::wp_create_nonce( );
		$_REQUEST['_wpnonce'] = $nonce;
		$this->assertEquals( 1, \Nonce\Wrapper::check_admin_referer( ) );
	}

	/**
	 * Test for check_ajax_referer
	 * @return void
	 */
	public function testCheckAjaxReferer() {
		$nonce = \Nonce\Wrapper::wp_create_nonce( );
		$_REQUEST['_wpnonce'] = $nonce;
		$this->assertEquals( 1, \Nonce\Wrapper::check_ajax_referer( ) );
	}

	/**
	 * Test for wp_referer_field
	 * @return void
	 */
	public function testWpRefererField() {
		$field = \Nonce\Wrapper::wp_referer_field( false );
		$this->assertEquals( '<input type="hidden" name="_wp_http_referer" value="" />', $field );
	}
}
