<?php
/**
 * Plugin Name: Mihdan: Yandex Dialogs
 * Description: Elementor Yandex Maps Widget - Easily add multiple address pins onto the same map with support for different map types (Road Map/Satellite/Hybrid/Terrain) and custom map style. Freely edit info window content of your pins with the standard Elementor text editor. And many more custom map options.
 * Plugin URI:  https://github.com/mihdan/mihdan-yandex-dialogs
 * Version:     1.0.0
 * Author:      Mikhail Kobzarev
 * Author URI:  https://www.kobzarev.com/
 * Text Domain: mihdan-yandex-dialogs
 * GitHub Plugin URI: https://github.com/mihdan/mihdan-yandex-dialogs
 *
 * @package mihdan-elementor-yandex-maps
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MIHDAN_YANDEX_DIALOGS_FILE', __FILE__ );
define( 'MIHDAN_YANDEX_DIALOGS_DIR', __DIR__ );
define( 'MIHDAN_YANDEX_DIALOGS_VERSION', '1.0.0' );

/**
 * Class Mihdan_Elementor_Yandex_Maps
 *
 * Main Plugin class
 *
 * @since 1.3
 */
final class Mihdan_Yandex_Dialogs {

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.3
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.6';

	/**
	 * Instance
	 *
	 * @since 1.3
	 * @access private
	 * @static
	 *
	 * @var Mihdan_Yandex_Dialogs The single instance of the class.
	 */
	private static $_instance = null;
	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.3
	 * @access public
	 *
	 * @return Mihdan_Yandex_Dialogs An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Load Plugin Textdomain.
	 */
	public function i18n() {
		load_plugin_textdomain( 'mihdan-yandex-dialogs' );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.3
	 * @access public
	 */
	public function __construct() {
		$this->init_hooks();
	}

	/**
	 * Hooks initialization.
	 */
	public function init_hooks() {

		add_action( 'plugins_loaded', [ $this, 'i18n' ] );

		// Check for required PHP version.
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		require_once MIHDAN_YANDEX_DIALOGS_DIR . '/includes/class-main.php';
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.3
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		$message = sprintf(
		/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'mihdan-yandex-dialogs' ),
			'<strong>' . esc_html__( 'Mihdan: Yandex Dialogs', 'mihdan-yandex-dialogs' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'mihdan-yandex-dialogs' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses( $message, array( 'strong' => array() ) ) );

	}
}
// Instantiate Plugin Class.
Mihdan_Yandex_Dialogs::instance();
