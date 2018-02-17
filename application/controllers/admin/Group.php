<?php

/**
 * Group Controller
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Group.php
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
 * Group.php
 *
 * @category Group.php
 * @package  Controllers
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */

class Group extends CI_Controller {
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
        $this->load->model(array('group_model'));
        $this->load->library(array('session', 'form_validation', 'Authorization'));
        $this->load->helper(array('datatable'));
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
        if (!($this->authorization->check_admin_session()))
            redirect("admin/auth");
    }

    /**
    * Function to load group index page
    *
    * @return void
    */
    public function index() {
        $this->data['title'] = "Groups";
        $viewContent = $this->load->view('group/index', $this->data, true);
        renderWithLayout(array('content' => $viewContent), 'admin');
    }

    /**
    * Function to load group data table page
    *
    * @return void
    */
    public function list_of_groups() {
        $request = $_GET;
        $result = $this->group_model->load_list_of_groups($request, array());
        $result = getUtfData($result);
        echo json_encode($result);
        exit;
    }

    /**
    * Function to set up a group
    *
    * @return void
    */
    public function setup() {
        $group_id = $this->uri->segment(4);
        if (!($this->authorization->check_admin_session()))
            redirect("admin/auth");
        $this->data['title'] = "Setup Group";
        $this->data['page_type'] = "Add";
        if ($group_id != "")
            $this->data['page_type'] = "Edit";
        if ($group_id != "") {
            $where_cond = array(
                "row_status" => 1,
                "id" => $group_id
            );
            $group_data = $this->group_model->get_group_info($where_cond);
            $this->data['group_info'] = $group_data;
        }
        $post_data = $_POST;
        if (count($post_data) > 0) {
            if ($this->form_validation->run("setup_group") == false) {
                $viewContent = $this->load->view('group/setup', $this->data, true);
                renderWithLayout(array('content' => $viewContent), 'admin');
            } else {
                $insert_data = array(
                    "group_name" => $post_data['group_name'],
                    "created_time" => date("Y-m-d H:i:s")
                );
                $this->group_model->insert_group_info($insert_data, $group_id);
                
                $successmessage = "Group added successfully.";
                if ($group_id != "" && $group_id != 0) 
                    $successmessage = "Group updated successfully.";
                $this->session->set_flashdata("successmessage", $successmessage);
                redirect('admin/group');
            }
        } else {
            $viewContent = $this->load->view('group/setup', $this->data, true);
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
    public function delete_group() {
        $post_data = $_POST;
        $where_cond = array(
            "id" => $post_data['id'],
        );
        $update_data = array(
            "row_status" => 0
        );
        $status = $this->group_model->update_group_data($where_cond, $update_data);
        if ($status) {
            echo json_encode(array(
                "status" => "success",
                "message" => "Group delted successfully."
            ));
            exit;
        }
        echo json_encode(array(
                "status" => "success",
                "message" => "Group deltion failed."
            ));
            exit;
    }

    /**
    * Function to check wehter group name is exists or not
    *
    * @param string $str
    *
    * @return boolean true or false
    */
    public function check_group_name_exists_or_not($str) {
        $this->form_validation->set_message('check_group_name_exists_or_not', 'Group Name already exists.');
        $post_data = $_POST;
        $where_cond = array(
            "row_status" => 1,
            "group_name" => $post_data['group_name']
        );
        if ($post_data['page_type'] == "Edit")
            $where_cond['id != '] = $post_data['group_id'];
        $class_data = $this->group_model->get_group_info($where_cond);
        if (count($class_data) > 0)
            return false;
        return true;
    }
}