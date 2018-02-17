<?php

/**
 * Register Controller
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Register.php
 * @package     Controllers
 * @author      Mahesh Sajja <maheshhasan07@gmail.com>
 * @license     http://www.opensource.org/licenses/mit-license.php MIT License
 * @link        http://localhost/online-exam/admin
 * @dateCreated 02/13/2018  MM/DD/YYYY
 * @dateUpdated 02/13/2018  MM/DD/YYYY 
 * @functions   01
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Register.php
 *
 * @category Register.php
 * @package  Controllers
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */
class Register extends CI_Controller {

    public $data = "";

    /**
     * Construct
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *    or MissingViewException in debug mode.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model(array('auth_model', 'semister_model', 'group_model', 'subject_model'));
        $this->load->library(array('session', 'form_validation', 'authorization'));
        $this->load->helper(array('datatable'));
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
    }

    /**
    * Function to register a user
    * 
    * @return void
    */
    public function index() {
        $this->data['title'] = "Register";
        $where_cond = array("row_status" => 1);
        $this->data['semister_info'] = $this->semister_model->all_semister_info($where_cond);
        $this->data['group_info'] = $this->group_model->all_group_info($where_cond);
        $post_data = $_POST;
        if (count($post_data) > 0) {
            if ($this->form_validation->run('lecturer_register_form') == false) {
                $this->load->view('lecturer/register', $this->data);
            } else {
                $insert_data = array(
                    "name" => $post_data['name'],
                    "email" => $post_data['email'],
                    "phone_number" => $post_data['phone_number'],
                    "password" => getPasswordHash($post_data['password']),
                    "gender" => $post_data['gender'],
                    "address" => $post_data['address'],
                    "user_type" => "L",
                    "created_time" => date('Y-m-d H:i:s')
                );
                $status = $this->auth_model->create_user($insert_data);
                if ($status) {
                    $this->session->set_flashdata("successmessage", "Registered successfully. You can login now.");
                } else {
                    $this->session->set_flashdata("errormessage", "Registered Failed. Try again.");
                }
                redirect("lecturer/login");
            }
        } else {
            $this->load->view('lecturer/register', $this->data);
        }
    }

    /**
    * Function to check email exists or not
    * 
    * @return boolean true or false
    */
    public function check_register_email_exists_or_not($str) {
        $this->form_validation->set_message('check_register_email_exists_or_not', 'Email already exists.');

        $where_array = array('email' => $_POST['email'], 'user_type' => 'L', "row_status" => 1);
        $user_data = $this->auth_model->get_user_info($where_array);
        if (count($user_data) > 0)
            return false;
        return true;
    }
}
