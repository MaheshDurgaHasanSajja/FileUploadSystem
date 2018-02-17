<?php

/**
 * Dashboard Controller
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Dashboard.php
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
 * Dashboard.php
 *
 * @category Dashboard.php
 * @package  Controllers
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */
class Dashboard extends CI_Controller {

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
        $this->load->model(array('auth_model', 'fileupload_model'));
        $this->load->library(array('session', 'form_validation', 'authorization'));
        $this->load->helper(array('datatable'));
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
    }

    /**
    * Function to load a dashboard page
    * 
    * @return void
    */
    public function index() {
        if (!($this->authorization->check_user_session())) 
            redirect('user/login');
        $this->data['title'] = "Dashboard";
        $where_cond = array(
            "id" => $this->session->userdata['user_session']['id'],
            "row_status" => 1,
            "user_type" => "S"
        );
        $user_info = $this->auth_model->get_user_info($where_cond);
        $year_array = json_decode($user_info['year']);
        $semister_array = json_decode($user_info['semister_id']);
        $files_data = $this->fileupload_model->get_user_detail_info($year_array, $semister_array, $user_info['group_id']);
        $this->data['user_file_info'] = $files_data;
        $viewContent = $this->load->view('users/dashboard', $this->data, true);
        renderWithLayout(array('content' => $viewContent), 'user');
    }

    /**
    * Function to display the pdf file
    * 
    * @return void
    */
    public function view() {
        $file_name = $this->uri->segment(4);
        if ($file_name != "" && file_get_contents(base_url()."assets/uploadedfiles/".$file_name)) {
            $this->data['file_name'] = $file_name;
            $this->load->view("uploads/view", $this->data);
        } else {
        redirect("admin/auth");
        }
    }
}
