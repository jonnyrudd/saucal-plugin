<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.jonnyrudd.co.uk
 * @since      1.0.0
 *
 * @package    Saucal_Plugin
 * @subpackage Saucal_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Saucal_Plugin
 * @subpackage Saucal_Plugin/admin
 * @author     Jonny Rudd <jonny@jonnyrudd.co.uk>
 */
class Saucal_Plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Saucal_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Saucal_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/saucal-plugin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Saucal_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Saucal_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/saucal-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Show a message to alert the user WooCommerce is needed for this plugin. (and offer a quick link to download it).
	 */
	public function woocommerce_not_active() {

		echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'This plugin requires WooCommerce to be installed and active. You can download %s here.', 'woocommerce-gateway-stripe' ), '<a href="https://woocommerce.com/" target="_blank">WooCommerce</a>' ) . '</strong></p></div>';
	}

	/**
	 * Check for an active install of WooCommerce.
	 */
	public function check_woocommerce_installed() {
		if ( ! class_exists( 'WooCommerce' ) ) {
			add_action( 'admin_notices', 'saucal_woocommerce_not_active' );
		}
	}

	/**
	 * Handle rewrite rules when a user switches themes.
	 */
	public function woocommerce_flush_rewrite_rules() {
		flush_rewrite_rules();
	}


}
