<?php

/**
 * FormValidation.php
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    FormValidation.php
 * @package     Config
 * @author      Mahesh Sajja <maheshhasan07@gmail.com>
 * @link        http://localhost/medicare/index.php/users
 * @dateCreated 02/14/2018  MM/DD/YYYY
 * @dateUpdated 02/14/2018  MM/DD/YYYY 
 * @functions   0
 */
$config = array(

	'login_form' => array(
			array(
	            'field' => 'email',
	            'label' => 'Email',
	            'rules' => 'trim|required|valid_email|callback_check_email_exists_or_not'
	        ),
	        array(
	            'field' => 'password',
	            'label' => 'Password',
	            'rules' => 'trim|required'
	        ),
	),
	'register_form' => array(
			array(
	            'field' => 'email',
	            'label' => 'Email',
	            'rules' => 'trim|required|valid_email|callback_check_register_email_exists_or_not'
	        ),
	        array(
	            'field' => 'password',
	            'label' => 'Password',
	            'rules' => 'trim|required'
	        ),
	        array(
	            'field' => 'semister_id[]',
	            'label' => 'Semister',
	            'rules' => 'trim|required'
	        ),
	        array(
	            'field' => 'group_id',
	            'label' => 'Group',
	            'rules' => 'trim|required'
	        ),
	        array(
	            'field' => 'year[]',
	            'label' => 'Year',
	            'rules' => 'trim|required'
	        ),
	        array(
	            'field' => 'gender',
	            'label' => 'Gender',
	            'rules' => 'trim|required'
	        ),
	        array(
	            'field' => 'address',
	            'label' => 'Address',
	            'rules' => 'trim|required'
	        ),
	        array(
	            'field' => 'name',
	            'label' => 'Name',
	            'rules' => 'trim|required'
	        ),
	),
	'setup_semister' => array(
			array(
	            'field' => 'semister_name',
	            'label' => 'Semister Name',
	            'rules' => 'trim|required|callback_check_semister_name_exists_or_not'
	        )
	),
	'setup_group' => array(
			array(
	            'field' => 'group_name',
	            'label' => 'Group Name',
	            'rules' => 'trim|required|callback_check_group_name_exists_or_not'
	        )
	),
	'setup_subject' => array(
			array(
	            'field' => 'subject_name',
	            'label' => 'Subject Name',
	            'rules' => 'trim|required|callback_check_subject_name_exists_or_not'
	        )
	),
	'setup_fileupload' => array(
	        array(
	            'field' => 'year',
	            'label' => 'Year',
	            'rules' => 'trim|required'
	        ),
	        array(
	            'field' => 'group_id',
	            'label' => 'Group',
	            'rules' => 'trim|required'
	        ),
	        array(
	            'field' => 'semister_id',
	            'label' => 'Semister',
	            'rules' => 'trim|required'
	        ),
	        array(
	            'field' => 'subject_id',
	            'label' => 'Subject',
	            'rules' => 'trim|required'
	        )
	),
	'lecturer_register_form' => array(
			array(
	            'field' => 'email',
	            'label' => 'Email',
	            'rules' => 'trim|required|valid_email|callback_check_register_email_exists_or_not'
	        ),
	        array(
	            'field' => 'password',
	            'label' => 'Password',
	            'rules' => 'trim|required'
	        ),
	        array(
	            'field' => 'gender',
	            'label' => 'Gender',
	            'rules' => 'trim|required'
	        ),
	        array(
	            'field' => 'address',
	            'label' => 'Address',
	            'rules' => 'trim|required'
	        ),
	        array(
	            'field' => 'name',
	            'label' => 'Name',
	            'rules' => 'trim|required'
	        ),
	),
);