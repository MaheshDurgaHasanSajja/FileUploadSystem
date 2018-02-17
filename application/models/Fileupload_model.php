<?php

/**
 * Fileupload Model
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Fileupload_model.php
 * @package     Models
 * @author      Mahesh Sajja <maheshhasan07@gmail.com>
 * @license     http://www.opensource.org/licenses/mit-license.php MIT License
 * @link        http://localhost/online-exam/admin
 * @dateCreated 02/13/2018  MM/DD/YYYY
 * @dateUpdated 02/13/2018  MM/DD/YYYY 
 * @functions   01
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Fileupload_model.php
 *
 * @category Fileupload_model.php
 * @package  Controllers
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */
class Fileupload_model extends CI_Model {

    /**
     * Construct
     * @return void
     * @throws NotFoundException When the view file could not be found
     *    or MissingViewException in debug mode.
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
    * Function to get fileupload information
    * 
    * @param array $where_cond
    *
    * @return void
    */
    public function get_fileupload_info($where_cond) {
        try {
            $query = $this->db->where($where_cond)
                            ->select("*")
                            ->from("user_uploads")
                            ->get();
            return $query->row_array();
        } catch(Exception $e) {
            log_message("Error: ".$this->db->__erro_message());
            return false;
        }
    }

    /**
    * Function to insert fileupload info data
    * 
    * @param array $insert_data
    *
    * @return boolean status
    */
    public function insert_fileupload_info($insert_data) {
        try {
            return $this->db->insert("user_uploads", $insert_data);
        } catch(Exception $e) {
            log_message("Error: ".$this->db->__erro_message());
            return false;
        }
    }

    /**
    * Function to update fileuploads data
    *
    * @param array $where_cond
    * @param array $update_data
    *
    * @return boolean true or false
    */
    public function update_fileupload_data($where_cond, $update_data) {
        try {
            return $this->db->where($where_cond)->update("user_uploads", $update_data);
        } catch(Exception $e) {
            log_message("Error: ".$this->db->__erro_message());
            return false;
        }
    }

    /**
     * Load all classes
     * 
     * @param array $request
     * @param array $user_data
     * 
     * @return array result
     */
    public function load_list_of_fileuploads($request, $user_data = array()) {
        $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
        $request['searchcolumns'] = array();

        $columns = array(
            array(
                'db' => 'file_id',
                'dt' => 'DT_RowId',
                'formatter' => function( $d, $row ) {
                    // Technically a DOM id cannot start with an integer, so we prefix
                    // a string. This can also be useful if you have multiple tables
                    // to ensure that the id is unique with a different prefix
                    return 'row_' . $d;
                }
            ),
            array('db' => 'file_id', 'dt' => 0,
                'formatter' => function($d, $row) {
                    return $d;
                }),
            array('db' => 'file_name', 'dt' => 1,
                'formatter' => function($d, $row) {
                    if (isset($this->session->userdata['lecturer_session']) && count($this->session->userdata['lecturer_session']) > 0 && $this->session->userdata['lecturer_session']['user_type'] == "L") {
                        return !empty($d) ? "<a href='".base_url()."lecturer/dashboard/view/".$row['file_name']."' target='_blank'>".$d."</a>" : "--";
                    } else {
                        return !empty($d) ? "<a href='".base_url()."admin/fileupload/view/".$row['file_name']."' target='_blank'>".$d."</a>" : "--";
                    }
                }),
            array('db' => 'group_name', 'dt' => 2,
                'formatter' => function($d, $row) {
                    return !empty($d) ? $d : "--";
                }),
            array('db' => 'semister_name', 'dt' => 3,
                'formatter' => function($d, $row) {
                    return !empty($d) ? $d : "--";
                }),
            array('db' => 'subject_name', 'dt' => 4,
                'formatter' => function($d, $row) {
                    return !empty($d) ? $d : "--";
                }),
            array('db' => 'year', 'dt' => 5,
                'formatter' => function($d, $row) {
                    return !empty($d) ? $d : "--";
                }),
            array('db' => 'file_id', 'dt' => 6,
                'formatter' => function($d, $row) {
                    $return_string = "<div class='text-center'>";
                    $return_string .= '<a  data-page-load="0" href="javascript:void(0);" data-href="' . base_url() . 'admin/fileupload/delete_file" class="delete-individual" data-message="Are you sure?" data-desc="This will permanently delete the file." data-table-id="list_of_user_uploads" data-record-id=' . $row["file_id"] . '><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    $return_string .= "</div>";
                    return $return_string;
                }),
        );

        $join = "";
        $join .= " JOIN subjects SUBJECTS ON SUBJECTS.id = USER_UPLOADS.subject_id AND SUBJECTS.row_status = 1 ";
        $join .= " JOIN groups GROUPS ON GROUPS.id = USER_UPLOADS.group_id AND GROUPS.row_status = 1 ";
        $join .= " JOIN semisters SEMISTERS ON SEMISTERS.id = USER_UPLOADS.semister_id AND SEMISTERS.row_status = 1 ";
        $query_columns_array = array("USER_UPLOADS.id as file_id", "file_name", "semister_name", "subject_name", "group_name", "year");

        $custom_where = array(
            "USER_UPLOADS.row_status = 1"
        );

        $where = " WHERE ";
        $where .= (count($custom_where) > 0) ? implode(" AND ", array_unique($custom_where)) : '';
        $query_columns = implode(",", array_unique($query_columns_array));
        $sql_query = 'SELECT $query_columns from user_uploads as USER_UPLOADS ' . $join . $where;
        $result = datatable::simple($request, $sql_details, $sql_query, $query_columns, $columns);
        return $result;
    }


    /**
    * Function to get user detail info about files
    *
    * @param array $year_array
    * @param array $subject_array
    * @param array $semister_array
    *  @param int $group_id
    *
    * @return array $result_array
    */
    public function get_user_detail_info($year_array, $semister_array, $group_id) {
        try {
            $where_array = array(
                "UP.row_status" => 1,
                "group_id" => $group_id
            );
            return $this->db->where_in("year", $year_array)
                            ->where_in("semister_id", $semister_array)
                            ->where($where_array)
                            ->select("file_name, subject_name, group_name, year, semister_name")
                            ->from("user_uploads UP")
                            ->join("subjects s", "s.id = UP.subject_id AND s.row_status = 1")
                            ->join("groups g", "g.id = UP.group_id AND g.row_status = 1")
                            ->join("semisters ss", "ss.id = UP.semister_id AND ss.row_status = 1")
                            ->get()
                            ->result_array();
        } catch(Exception $e) {
            return false;
        }
    }
}
