<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://presstigers.com/
 * @since             2.2.2
 * @package           Simple_Job_Board_Email_Attachment
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Job Board Email Attachment
 * Plugin URI:        https://wordpress.org/plugins/simple-job-board/
 * Description:       Get complete applicant resume & details in the email attachment and get rid of website login to retrieve the application.
 * Version:           1.2.1
 * Author:            PressTigers
 * Author URI:        http://presstigers.com/
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       simple-job-board-email-attachment
 * Domain Path:       /languages
 */
/**
 * Show admin notice & deactivate plugin if Simple Job Board plugin is not installed or activated.
 *  
 * @since    2.2.2
 */
if (!function_exists('sjbea_has_parent_plugin')) {

    /**
     * Check for parent plugin.
     */
    function sjbea_has_parent_plugin() {
        if (is_admin() && (!file_exists(WP_PLUGIN_DIR . '/simple-job-board/simple-job-board.php') && current_user_can('activate_plugins') )) {
            add_action('admin_notices', create_function(null, 'echo \'<div class="error"><p>\' . sprintf( __( \'Activation failed: Simple Job Board must be installed to use the <strong>Simple Job Board Email Attachment</strong> Plugin. %sInstall Simple Job Board now.\', \'simple-job-board-email-attachment\' ), \'<a href="\' . admin_url(\'plugin-install.php?tab=plugin-information&plugin=simple-job-board&TB_iframe=true&width=600&height=550\')  . \'" class="thickbox" title="Simple Job Board">\' ) . \'</a></p></div>\';'));

            deactivate_plugins(plugin_basename(__FILE__));
            if (isset($_GET['activate'])) {
                unset($_GET['activate']);
            }
        } elseif (is_plugin_inactive('simple-job-board/simple-job-board.php') && current_user_can('activate_plugins')) {
            add_action('admin_notices', create_function(null, 'echo \'<div class="error"><p>\' . __( \'Activation failed: Simple Job Board must be activated to use the <strong>Simple Job Board Email Attachment</strong> Plugin.\', \'simple-job-board-email-attachment\' ), \'</p></div>\';'));

            deactivate_plugins(plugin_basename(__FILE__));
            if (isset($_GET['activate'])) {
                unset($_GET['activate']);
            }
        }
    }

}

// Action -> Check for parent plugin.
add_action('admin_init', 'sjbea_has_parent_plugin');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-simple-job-board-email-attachment-activator.php
 */
function activate_simple_job_board_email_attachment() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-simple-job-board-email-attachment-activator.php';
    Simple_Job_Board_Email_Attachment_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-simple-job-board-email-attachment-deactivator.php
 */
function deactivate_simple_job_board_email_attachment() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-simple-job-board-email-attachment-deactivator.php';
    Simple_Job_Board_Email_Attachment_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_simple_job_board_email_attachment');
register_deactivation_hook(__FILE__, 'deactivate_simple_job_board_email_attachment');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-simple-job-board-email-attachment.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_simple_job_board_email_attachment() {

    $plugin = new Simple_Job_Board_Email_Attachment();
    $plugin->run();
}

run_simple_job_board_email_attachment();