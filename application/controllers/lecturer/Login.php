<?php

/**
 * Login Controller
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Login.php
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
 * Login.php
 *
 * @category Login.php
 * @package  Controllers
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */
class Login extends CI_Controller {

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
    * Function to load the login page
    *
    * @return void
    */
    public function index() {
        if (isset($this->session->userdata['lecturer_session']) && count($this->session->userdata['lecturer_session']) > 0) {
            redirect('lecturer/dashboard');
        }
        $post_data = $_POST;
        if (count($post_data) > 0) {
            if($this->form_validation->run('login_form') == false){
                $this->load->view("lecturer/login.php");
            } else {
                $post_data['email'] = strtolower($post_data['email']);
                $where_cond = array(
                    "email" => $post_data['email'],
                    "row_status" => 1,
                    "user_type" => "L"
                );
                $user_data = $this->auth_model->get_user_info($where_cond);
                if (count($user_data) > 0) {
                    $this->session->set_userdata("lecturer_session", $user_data);
                    redirect('lecturer/dashboard');
                } else {
                    $this->session->set_flashdata("errormessage", "Invalid login details.");
                    redirect("lecturer/login");
                }
            }
        } else {
            $this->load->view("lecturer/login", $this->data);
        }
    }


    /**
    * Function to clear the session and logout the user
    * 
    * @return boolean
    */
    public function logout() {
        $this->session->unset_userdata('lecturer_session');
        redirect("lecturer/login");
    }

    /**
    * Function to check email exists or not
    * 
    * @return boolean true or false
    */
    public function check_email_exists_or_not($str) {
        $this->form_validation->set_message('check_email_exists_or_not', 'Invalid login details.');

        $where_array = array('email' => $_POST['email'], 'user_type' => 'L', "row_status" => 1);
        $user_data = $this->auth_model->get_user_info($where_array);
        if (count($user_data) == 0)
            return false;
        $hashed_password = $user_data['password'];
        $password_verify = verifyPassword($_POST['password'], $hashed_password);
        if ($password_verify) {
            return true;
        }
        return false;
    }
}
