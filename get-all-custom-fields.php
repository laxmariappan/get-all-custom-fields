<?php
/**
 * Plugin Name:       Get All Custom Fields
 * Plugin URI:        https://github.com/laxmariappan/get-all-custom-fields
 * Description:       A WordPress plugin to list all custom fields in a site.
 * Version:           1.0.0
 * Requires at least: 6.1
 * Requires PHP:      7.4
 * Author:            Lax Mariappan
 * Author URI:        https://laxmariappan.com/
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Update URI:        FALSE
 * Text Domain:       get-all-custom-fields
 * Domain Path:       /languages
 *
 * @package get-all-custom-fields
 */

 namespace Lax\GetAllCustomFields;

/**
 * Get the list of all custom fields.
 *
 * @return void
 * @since  1.0.0
 * @author Lax Mariappan <lax@webdevstudios.com>
 */

class GACF_EbtechModules {
    public static function init() {
        add_action( 'admin_menu', array( __CLASS__, 'adminMenu' ) );
    }

    public static function adminMenu() {
        add_menu_page(
            __( 'All Custom Fields', 'get-all-custom-fields' ),
            __( 'All Custom Fields', 'get-all-custom-fields' ),
            'manage_options',
            'get-all-custom-fields',
            array( __CLASS__, 'listFieldsPage' ),
            'dashicons-tagcloud',
            6
        );
    }

    public static function listFieldsPage() {
        if ( is_file( plugin_dir_path( __FILE__ ) . 'includes/fields.php' ) ) {
            include_once plugin_dir_path( __FILE__ ) . 'includes/fields.php';
        }
    }

}

GACF_EbtechModules::init();
