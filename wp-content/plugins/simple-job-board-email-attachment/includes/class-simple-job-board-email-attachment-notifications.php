<?php if (!defined('ABSPATH')) { exit; } // Exit if accessed directly
/**
 * Simple_Job_Board_Email_Attachment_Notification Class
 * 
 * This is used to send applicant's resume and details in HR and Admin emails.
 *
 * @link        https://wordpress.org/plugins/simple-job-board
 * @since       2.2.2
 * 
 * @package     Simple_Job_Board_Email_Attachment
 * @subpackage  Simple_Job_Board_Email_Attachment/includes
 * @author      PressTigers <support@presstigers.com>
 */
class Simple_Job_Board_Email_Attachment_Notification {

    /**
     * Send applicant's resume & details to HR/admin
     *
     * @since  2.2.2  
     */
    public function __construct() {

        // Filter - Get & Append Applicant's Submitted Information for HR/Admin Email Template.
        add_filter('sjb_applicant_details_notification', array($this, 'sjbea_admin_hr_append_parameters'), 12, 3);

        // Filter - Get Attachment URL for Admin Email Template.
        add_filter('sjb_admin_notification_attachment', array($this, 'sjbea_admin_get_attachment_url'), 12, 2);

        // Filter - Get Attachment URL for HR Email Template.
        add_filter('sjb_hr_notification_attachment', array($this, 'sjbea_hr_get_attachment_url'), 12, 2);

        // Filter - Get Attachment URL for Author Email Template.
        add_filter('sjb_author_notification_attachment', array($this, 'sjbea_author_get_attachment_url'), 12, 2);

        // Filter - Modify Email Address of HR Notification Receiver 
        add_filter('sjb_hr_notification_to', array($this, 'hr_emails_to'), 12, 2);

        // Action - Notify Job Author
        add_action('sjb_admin_notices_after', array($this, 'author_notification'), 12, 1);
    }

    /**
     * Get attachemnt url for Admin email template.
     *
     * @since   2.2.2
     * 
     * @param   string  $resume_path    Resume Path
     * @param   int     $post_id        Post ID  
     * @return  string  $resume_path    Attachment Path
     */
    public function sjbea_admin_get_attachment_url($resume_path = '', $post_id) {
        $admin_email_attachment = get_option('job_board_admin_email_attachment') ? get_option('job_board_admin_email_attachment') : 'yes';
        $resume_path = get_post_meta($post_id, 'resume_path', TRUE);

        // True - When applicant attaches multiple files
        if (($files = get_post_meta($post_id, 'attachments_meta', TRUE) ) && 'yes' === $admin_email_attachment) {

            $files_path = array();

            // Retrieve all files path
            foreach ($files['file_name'] as $file) {
                if ('' != $file) {
                    $files_path[] = $files['base_dir'] . '/' . $file;
                }
            }

            // Append resume path
            if (!empty($resume_path)) {
                $files_path[] = $resume_path;
            }
            return $files_path;
        }

        // True - When only resume is available
        if (!empty($resume_path) && $admin_email_attachment == 'yes') {
            return $resume_path;
        } else {
            return '';
        }
    }

    /**
     * Get attachemnt url for HR email template.
     *
     * @since   2.2.2
     * 
     * @param   string  $resume_path    Resume Path
     * @param   int     $post_id        Post ID  
     * @return  string  $resume_path    Attachment Path
     */
    public function sjbea_hr_get_attachment_url($resume_path = '', $post_id) {

        $hr_email_attachment = get_option('job_board_hr_email_attachment') ? get_option('job_board_hr_email_attachment') : 'yes';
        $resume_path = get_post_meta($post_id, 'resume_path', true);

        // True - When applicant attaches multiple files
        if (( $files = get_post_meta($post_id, 'attachments_meta', TRUE) ) && 'yes' === $hr_email_attachment) {

            $files_path = array();

            // Retrieve all files path
            foreach ($files['file_name'] as $file) {
                if ('' != $file) {
                    $files_path[] = $files['base_dir'] . '/' . $file;
                }
            }

            // Append resume path
            if (!empty($resume_path)) {
                $files_path[] = $resume_path;
            }
            return $files_path;
        }

        // True - When applicant attaches only resume
        if (!empty($resume_path) && $hr_email_attachment == 'yes') {
            return $resume_path;
        } else {
            return '';
        }
    }

    /**
     * Get attachemnt url for HR email template.
     *
     * @since   2.2.2
     * 
     * @param   string  $resume_path    Resume Path
     * @param   int     $post_id        Post ID  
     * @return  string  $resume_path    Attachment Path
     */
    public function sjbea_author_get_attachment_url($resume_path = '', $post_id) {

        $author_email_attachment = get_option('job_board_author_email_attachment') ? get_option('job_board_author_email_attachment') : 'yes';
        $resume_path = get_post_meta($post_id, 'resume_path', TRUE);

        // True - When applicant attaches multiple files
        if (( $files = get_post_meta($post_id, 'attachments_meta', TRUE) ) && 'yes' === $author_email_attachment) {

            $files_path = array();

            // Retrieve all files path
            foreach ($files['file_name'] as $file) {
                if ('' != $file) {
                    $files_path[] = $files['base_dir'] . '/' . $file;
                }
            }

            // Append resume path
            if (!empty($resume_path)) {
                $files_path[] = $resume_path;
            }

            return $files_path;
        }

        // True - When applicant attaches only resume
        if (!empty($resume_path) && $author_email_attachment == 'yes') {
            return $resume_path;
        } else {
            return '';
        }
    }

    /**
     * Append Applicant's details with Email Template.
     *
     * @since    2.2.2
     * 
     * @param    string     $message                Email Tempalte
     * @param    int        $post_id                Post ID
     * @param    string     $notification_receiver  Notification Receiver
     * @return   string     $message                Email Tempalte with Applicant Details
     */
    public function sjbea_admin_hr_append_parameters($message = NULL, $post_id, $notification_receiver) {

        if ($notification_receiver == 'Admin') {
            $job_board_admin_email_parameters = get_option('job_board_admin_email_parameters') ? get_option('job_board_admin_email_parameters') : 'yes';
            $message .= $this->sjbea_get_parameters($job_board_admin_email_parameters, $post_id);
        } elseif ($notification_receiver == 'HR') {
            $job_board_hr_email_parameters = get_option('job_board_hr_email_parameters') ? get_option('job_board_hr_email_parameters') : 'yes';
            $message .= $this->sjbea_get_parameters($job_board_hr_email_parameters, $post_id);
        } elseif ($notification_receiver == 'Author') {
            $job_board_author_email_parameters = get_option('job_board_author_email_parameters') ? get_option('job_board_author_email_parameters') : 'yes';
            $message .= $this->sjbea_get_parameters($job_board_author_email_parameters, $post_id);
        }

        return $message;
    }

    /**
     * Get Applicant Job Form Parameter
     *
     * @since   2.2.2
     * 
     * @param   $permission String yes/no
     * @return  $parameters String 
     */
    public function sjbea_get_parameters($permission = NULL, $post_id) {

        $parameters = '';
        if ($permission == 'yes') {

            unset($_POST['action']);
            unset($_POST['wp_nonce']);
            unset($_POST['job_id']);
            $parameters .='<table width="100%" cellpadding="0" cellspacing="0" style="text-align: left;">';
            $parameters .='<thead><tr><th colspan="2" style="border-bottom: 1px solid #ccc;padding: 10px;font-size:14px;">' . apply_filters('sjbea_applicant_details_label', __("Applicant Details", 'simple-job-board')) . '</th></tr></thead><tbody>';

            foreach ($_POST as $key => $val) {
                if ('jobapp_' === substr($key, 0, 7)) {
                    $field_title = str_replace('jobapp_', '', $key);
                    $field_title = str_replace('_', ' ', $field_title);

                    if (!is_array($val)) {
                        $parameters .='<tr><td style="border-bottom: 1px dotted #ccc;padding: 7px;">' . ucwords($field_title) . ' : </td><td style="border-bottom: 1px dotted #ccc;padding: 7px;">' . $val . '</td></tr>';
                    } else {
                        // For Array & Serialized Elements:
                        $values = is_serialized($val) ? unserialize($val) : $val;

                        $parameters .='<tr><td style="border-bottom: 1px dotted #ccc;padding: 7px;">' . ucwords($field_title) . ' : </td>'
                                . '<td style="border-bottom: 1px dotted #ccc;padding: 7px;">';

                        $count = sizeof($values);

                        foreach ($values as $val):
                            $parameters .= trim($val);

                            if ($count > 1) {
                                $parameters .= ',&nbsp;';
                            }
                            $count--;
                        endforeach;

                        $parameters .= '</td></tr>';
                    }
                }
            }

            $parameters .='</tbody></table>';
        }

        return $parameters;
    }

    /**
     * Modify Email Address of HR Notification Receiver
     * 
     * @since   2.3.2
     * 
     * @param   string  $hr_email   HR Email 
     * @return  string  $hr_email   Modified HR Email | Multiple HR Emails
     */
    public function hr_emails_to($hr_email, $post_id) {

        if (FALSE != get_option('settings_hr_emails') && '' != get_option('settings_hr_emails')) {

            // String to Array Conversion for Mail Validation
            $hr_emails = explode(" ", str_replace(',', '', get_option('settings_hr_emails')));

            // Email Validation
            foreach ($hr_emails as $email) {
                if (is_email($email)) {
                    $emails[] = $email;
                }
            }

            // Array to String Conversion for Mail's Senders $to Format
            $hr_email = implode(",", $emails);
        }

        return $hr_email;
    }

    /**
     * Send Email to Job Author
     * 
     * @since   2.4.3
     */
    public function author_notification($post_id) {

        if ('yes' === get_option('job_board_author_email')) {

            // Applied job title
            $job_title = get_the_title($post_id);
            $parent_id = wp_get_post_parent_id($post_id);

            $applicant_name = Simple_Job_Board_Notifications::applicant_details('name', $post_id);
            $applicant_email = Simple_Job_Board_Notifications::applicant_details('email', $post_id);

            // Author Email Address
            $author_ID = get_post_field('post_author', $parent_id);
            $to = get_the_author_meta('user_email', $author_ID);
            $author_name = get_the_author_meta('display_name', $author_ID);

            $subject = apply_filters('sjb_author_notification_sbj', sprintf(esc_html__('Applicant Resume Received %s ', 'simple-job-board'), $job_title), $job_title, $post_id);

            // Email Header: Reply-to & From Parameters
            $headers[] = 'From: ' . get_bloginfo('name') . ' <' . $to . '>';

            if (!empty($applicant_name) && !empty($applicant_email)) {
                $headers[] = 'Reply-To: ' . $applicant_name . ' <' . $applicant_email . '>';
            }

            $headers[] = 'Content-Type: text/html; charset=UTF-8';

            // Email Template for Author
            $message = Simple_Job_Board_Notifications::email_start_template($post_id, 'Author');
            $message .= Simple_Job_Board_Notifications::admin_email_template($post_id, 'Author');
            $message .= Simple_Job_Board_Notifications::email_end_template($post_id, 'Author');

            $message = str_replace('Author', $author_name, $message);

            $attachment = apply_filters('sjb_author_notification_attachment', '', $post_id);
            wp_mail($to, $subject, $message, $headers, $attachment);
        }
    }

}

new Simple_Job_Board_Email_Attachment_Notification();