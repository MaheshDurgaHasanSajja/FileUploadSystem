<?php

/**
 * Semister Controller
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Semister.php
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
 * Semister.php
 *
 * @category Semister.php
 * @package  Controllers
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */

class Semister extends CI_Controller {
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
        $this->load->model(array('semister_model'));
        $this->load->library(array('session', 'form_validation', 'Authorization'));
        $this->load->helper(array('datatable'));
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
        if (!($this->authorization->check_admin_session()))
            redirect("admin/auth");
    }

    /**
    * Function to load semister index page
    *
    * @return void
    */
    public function index() {
        $this->data['title'] = "Semisters";
        $viewContent = $this->load->view('semister/index', $this->data, true);
        renderWithLayout(array('content' => $viewContent), 'admin');
    }

    /**
    * Function to load semister data table page
    *
    * @return void
    */
    public function list_of_semisters() {
        $request = $_GET;
        $result = $this->semister_model->load_list_of_semisters($request, array());
        $result = getUtfData($result);
        echo json_encode($result);
        exit;
    }

    /**
    * Function to set up a semister
    *
    * @return void
    */
    public function setup() {
        $semister_id = $this->uri->segment(4);
        if (!($this->authorization->check_admin_session()))
            redirect("admin/auth");
        $this->data['title'] = "Setup Semister";
        $this->data['page_type'] = "Add";
        if ($semister_id != "")
            $this->data['page_type'] = "Edit";
        if ($semister_id != "") {
            $where_cond = array(
                "row_status" => 1,
                "id" => $semister_id
            );
            $semister_data = $this->semister_model->get_semister_info($where_cond);
            $this->data['semister_info'] = $semister_data;
        }
        $post_data = $_POST;
        if (count($post_data) > 0) {
            if ($this->form_validation->run("setup_semister") == false) {
                $viewContent = $this->load->view('semister/setup', $this->data, true);
                renderWithLayout(array('content' => $viewContent), 'admin');
            } else {
                $insert_data = array(
                    "semister_name" => $post_data['semister_name'],
                    "created_time" => date("Y-m-d H:i:s")
                );
                $this->semister_model->insert_semister_info($insert_data, $semister_id);
                
                $successmessage = "Semister added successfully.";
                if ($semister_id != "" && $semister_id != 0) 
                    $successmessage = "Semister updated successfully.";
                $this->session->set_flashdata("successmessage", $successmessage);
                redirect('admin/semister');
            }
        } else {
            $viewContent = $this->load->view('semister/setup', $this->data, true);
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
    public function delete_semister() {
        $post_data = $_POST;
        $where_cond = array(
            "id" => $post_data['id'],
        );
        $update_data = array(
            "row_status" => 0
        );
        $status = $this->semister_model->update_semister_data($where_cond, $update_data);
        if ($status) {
            echo json_encode(array(
                "status" => "success",
                "message" => "Semister delted successfully."
            ));
            exit;
        }
        echo json_encode(array(
                "status" => "success",
                "message" => "Semister deltion failed."
            ));
            exit;
    }

    /**
    * Function to check wehter semister name is exists or not
    *
    * @param string $str
    *
    * @return boolean true or false
    */
    public function check_semister_name_exists_or_not($str) {
        $this->form_validation->set_message('check_semister_name_exists_or_not', 'Semister Name already exists.');
        $post_data = $_POST;
        $where_cond = array(
            "row_status" => 1,
            "semister_name" => $post_data['semister_name']
        );
        if ($post_data['page_type'] == "Edit")
            $where_cond['id != '] = $post_data['semister_id'];
        $class_data = $this->semister_model->get_semister_info($where_cond);
        if (count($class_data) > 0)
            return false;
        return true;
    }
}