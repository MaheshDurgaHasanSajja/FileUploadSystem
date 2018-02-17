<?php
/**
 * setup view
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    setup.php
 * @package     Views
 * @author      Mahesh Sajja <maheshhasan07@gmail.com>
 * @license     http://www.opensource.org/licenses/mit-license.php MIT License
 * @link        http://localhost/online-exam/admin
 * @dateCreated 02/13/2018  MM/DD/YYYY
 * @dateUpdated 02/13/2018  MM/DD/YYYY 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * setup.php
 *
 * @category setup.php
 * @package  Views
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */
?>
<div class="container-class col-lg-12">
    <h1><?php echo "File Upload"; ?></h1><br>
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <?php
        $submit_url = "admin/fileupload/setup";
            echo form_open_multipart(
                base_url($submit_url), array('name' => 'setup_fileupload', 'id' => 'setup_fileupload', 'class' => "validate-form")
            );
        ?>
        <div class="col-lg-12 form-group">
            <label class="control-label">Year</label>
            <?php
                $options = array("" => "Select year");
                for ($i = date("Y"); $i > 2000; $i--) {
                    $options[$i] = $i;
                }
                $js = 'id="year" class="form-control required"';
                echo form_dropdown('year', $options, set_value('year'),$js);
                echo form_error('year');
            ?>
        </div>
        <div class="col-lg-12 form-group">
            <label class="control-label">Group</label>
            <?php
                $options = array("" => "Select group");
                foreach ($group_info as $key => $value) {
                    $options[$value['id']] = $value['group_name'];
                }
                $js = 'id="group_id" class="form-control required"';
                echo form_dropdown('group_id', $options, set_value('group_id'),$js);
                echo form_error('group_id');
            ?>
        </div>
        <div class="col-lg-12 form-group">
            <label class="control-label">Semister</label>
            <?php
                $options = array("" => "Select semister");
                foreach ($semister_info as $key => $value) {
                    $options[$value['id']] = $value['semister_name'];
                }
                $js = 'id="semister_id" class="form-control required"';
                echo form_dropdown('semister_id', $options, set_value('semister_id'),$js);
                echo form_error('semister_id');
            ?>
        </div>
        <div class="col-lg-12 form-group">
            <label class="control-label">Subject</label>
            <?php
                $options = array("" => "Select subject");
                foreach ($subject_info as $key => $value) {
                    $options[$value['id']] = $value['subject_name'];
                }
                $js = 'id="semister_id" class="form-control required"';
                echo form_dropdown('subject_id', $options, set_value('subject_id'),$js);
                echo form_error('subject_id');
            ?>
        </div>
        <div class="col-lg-12 form-group">
            <label class="control-label">
                Upload
            </label>
            <input type="file" class="form-control required" name="file_name" id="file_name">
        </div>
        <div class="col-lg-12 text-center mt10">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 pull-right no-padding">
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary block full-width m-b"><?php echo "Upload" ?></button>
                </div>
                <div class="col-lg-4">
                    <a href="<?php echo base_url() ?>admin/fileupload" class="btn btn-default block full-width m-b">Cancel</a>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <?php
            echo form_close();
        ?>
    </div>
    <div class="col-lg-3"></div>
</div>