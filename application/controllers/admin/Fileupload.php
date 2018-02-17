<?php

/**
 * Fileupload Controller
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Fileupload.php
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
 * Fileupload.php
 *
 * @category Fileupload.php
 * @package  Controllers
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */

class Fileupload extends CI_Controller {
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
        $this->load->model(array('fileupload_model', 'semister_model', 'group_model', 'subject_model'));
        $this->load->library(array('session', 'form_validation', 'Authorization', 'upload'));
        $this->load->helper(array('datatable'));
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
        if (!($this->authorization->check_admin_session()))
            redirect("admin/auth");
    }

    /**
    * Function to load fileupload index page
    *
    * @return void
    */
    public function index() {
        $this->data['title'] = "Uploads";
        $viewContent = $this->load->view('uploads/index', $this->data, true);
        renderWithLayout(array('content' => $viewContent), 'admin');
    }

    /**
    * Function to load fileupload data table page
    *
    * @return void
    */
    public function list_of_fileuploads() {
        $request = $_GET;
        $result = $this->fileupload_model->load_list_of_fileuploads($request, array());
        $result = getUtfData($result);
        echo json_encode($result);
        exit;
    }

    /**
    * Function to set up a fileupload
    *
    * @return void
    */
    public function setup() {
        $fileupload_id = $this->uri->segment(4);
        if (!($this->authorization->check_admin_session()))
            redirect("admin/auth");
        $this->data['title'] = "File Upload";
        $where_cond = array("row_status" => 1);
        $this->data['semister_info'] = $this->semister_model->all_semister_info($where_cond);
        $this->data['group_info'] = $this->group_model->all_group_info($where_cond);
        $this->data['subject_info'] = $this->subject_model->all_subject_info($where_cond);
        $post_data = $_POST;
        if (count($post_data) > 0) {
            if ($this->form_validation->run("setup_fileupload") == false) {
                $viewContent = $this->load->view('uploads/setup', $this->data, true);
                renderWithLayout(array('content' => $viewContent), 'admin');
            } else {
                if (!empty($_FILES['file_name']['name'])) {
                    $file_name = time() . "." . pathinfo($_FILES['file_name']['name'], PATHINFO_EXTENSION);
                    $config['upload_path'] = './assets/uploadedfiles/';
                    $config['file_name'] = $file_name;
                    $config['allowed_types'] = 'pdf';
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('file_name')) {
                        $this->session->set_flashdata("errormessage", $this->upload->display_errors());
                        redirect('admin/fileupload/setup');
                    } else {
                        $file_data = $this->upload->data();
                        $org_file_name = $file_data['file_name'];
                    }
                }
                $insert_data = array(
                    "year" => $post_data['year'],
                    "group_id" => $post_data['group_id'],
                    "semister_id" => $post_data['semister_id'],
                    "subject_id" => $post_data['subject_id'],
                    "file_name" => $org_file_name,
                    "created_time" => date("Y-m-d H:i:s")
                );
                $this->fileupload_model->insert_fileupload_info($insert_data);
                $successmessage = "File uploaded successfully.";
                $this->session->set_flashdata("successmessage", $successmessage);
                redirect('admin/fileupload');
            }
        } else {
            $viewContent = $this->load->view('uploads/setup', $this->data, true);
            renderWithLayout(array('content' => $viewContent), 'admin');
        }
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

    /**
    * Function to delete a flle
    *
    * @return json $json_string
    */
    public function delete_file() {
        $post_data = $_POST;
        $where_cond = array(
            "id" => $post_data['id'],
        );
        $update_data = array(
            "row_status" => 0
        );
        $status = $this->fileupload_model->update_fileupload_data($where_cond, $update_data);
        if ($status) {
            echo json_encode(array(
                "status" => "success",
                "message" => "File delted successfully."
            ));
            exit;
        }
        echo json_encode(array(
                "status" => "success",
                "message" => "File deltion failed."
            ));
            exit;
    }
}