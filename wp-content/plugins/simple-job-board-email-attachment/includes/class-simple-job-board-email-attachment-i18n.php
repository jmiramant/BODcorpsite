<?php
/**
 * Simple_Job_Board_Email_Attachment_i18n Class
 * 
 * Define the internationalization functionality. Loads and defines 
 * the internationalization files for this plugin. So that it is ready
 * for translation.
 *
 * @link       https://wordpress.org/plugins/simple-job-board
 * @since      1.0.0
 * 
 * @package    Simple_Job_Board_Email_Attachment
 * @subpackage Simple_Job_Board_Email_Attachment/includes
 * @author     PressTigers <support@presstigers.com>
 */
class Simple_Job_Board_Email_Attachment_i18n 
{

    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain() {

        load_plugin_textdomain(
                'simple-job-board-email-attachment', false, dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }    
}