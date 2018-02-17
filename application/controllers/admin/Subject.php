<?php

/**
 * Subject Controller
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Subject.php
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
 * Subject.php
 *
 * @category Subject.php
 * @package  Controllers
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */

class Subject extends CI_Controller {
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
        $this->load->model(array('subject_model'));
        $this->load->library(array('session', 'form_validation', 'Authorization'));
        $this->load->helper(array('datatable'));
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
        if (!($this->authorization->check_admin_session()))
            redirect("admin/auth");
    }

    /**
    * Function to load subject index page
    *
    * @return void
    */
    public function index() {
        $this->data['title'] = "Subjects";
        $viewContent = $this->load->view('subject/index', $this->data, true);
        renderWithLayout(array('content' => $viewContent), 'admin');
    }

    /**
    * Function to load subject data table page
    *
    * @return void
    */
    public function list_of_subjects() {
        $request = $_GET;
        $result = $this->subject_model->load_list_of_subjects($request, array());
        $result = getUtfData($result);
        echo json_encode($result);
        exit;
    }

    /**
    * Function to set up a subject
    *
    * @return void
    */
    public function setup() {
        $subject_id = $this->uri->segment(4);
        if (!($this->authorization->check_admin_session()))
            redirect("admin/auth");
        $this->data['title'] = "Setup Subject";
        $this->data['page_type'] = "Add";
        if ($subject_id != "")
            $this->data['page_type'] = "Edit";
        if ($subject_id != "") {
            $where_cond = array(
                "row_status" => 1,
                "id" => $subject_id
            );
            $subject_data = $this->subject_model->get_subject_info($where_cond);
            $this->data['subject_info'] = $subject_data;
        }
        $post_data = $_POST;
        if (count($post_data) > 0) {
            if ($this->form_validation->run("setup_subject") == false) {
                $viewContent = $this->load->view('subject/setup', $this->data, true);
                renderWithLayout(array('content' => $viewContent), 'admin');
            } else {
                $insert_data = array(
                    "subject_name" => $post_data['subject_name'],
                    "created_time" => date("Y-m-d H:i:s")
                );
                $this->subject_model->insert_subject_info($insert_data, $subject_id);
                
                $successmessage = "Subject added successfully.";
                if ($subject_id != "" && $subject_id != 0) 
                    $successmessage = "Subject updated successfully.";
                $this->session->set_flashdata("successmessage", $successmessage);
                redirect('admin/subject');
            }
        } else {
            $viewContent = $this->load->view('subject/setup', $this->data, true);
            renderWithLayout(array('content' => $viewContent), 'admin');
        }
    }

    /**
    * Function to delete a class
    *
    * @param int $class_id
    *
    * @return json $json_string
    */
    public function delete_subject() {
        $post_data = $_POST;
        $where_cond = array(
            "id" => $post_data['id'],
        );
        $update_data = array(
            "row_status" => 0
        );
        $status = $this->subject_model->update_subject_data($where_cond, $update_data);
        if ($status) {
            echo json_encode(array(
                "status" => "success",
                "message" => "Subject delted successfully."
            ));
            exit;
        }
        echo json_encode(array(
                "status" => "success",
                "message" => "Subject deltion failed."
            ));
            exit;
    }

    /**
    * Function to check wehter subject name is exists or not
    *
    * @param string $str
    *
    * @return boolean true or false
    */
    public function check_subject_name_exists_or_not($str) {
        $this->form_validation->set_message('check_subject_name_exists_or_not', 'Subject Name already exists.');
        $post_data = $_POST;
        $where_cond = array(
            "row_status" => 1,
            "subject_name" => $post_data['subject_name']
        );
        if ($post_data['page_type'] == "Edit")
            $where_cond['id != '] = $post_data['subject_id'];
        $class_data = $this->subject_model->get_subject_info($where_cond);
        if (count($class_data) > 0)
            return false;
        return true;
    }
}