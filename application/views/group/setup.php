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
    <h1><?php echo $page_type; ?> Group</h1><br>
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <?php
        $submit_url = "admin/group/setup";
        if ($page_type == "Edit")
            $submit_url = "admin/group/setup/".$group_info['id'];
            echo form_open(base_url($submit_url), array('name' => 'setup_group', 'id' => 'setup_group' ));
            echo form_hidden("page_type", $page_type);
            echo form_hidden("group_id", (isset($group_info['id'])?$group_info['id']:0));
        ?>
        <div class="col-lg-12 form-group">
            <label class="col-lg-4 control-label">Group name</label>
            <div class="col-lg-8">
                <?php
                    if (!isset($group_info)) {
                        $namevalue = set_value('group_name');
                    } else {
                        $value = set_value('group_name');
                        if (empty($value)) {
                            $namevalue = $group_info['group_name'];
                        } else {
                            $namevalue = $value;
                        }
                    }
                    $group_name = array("name" => "group_name",
                        "id" => "group_name",
                        "class" => "required form-control",
                        "placeholder" => "Group name",
                        "value" => $namevalue
                    );
                    echo form_input($group_name);
                    echo form_error('group_name');
                ?>
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 pull-right no-padding">
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary block full-width m-b"><?php echo ($page_type == "Add")?$page_type:"Save"; ?></button>
                </div>
                <div class="col-lg-4">
                    <a href="<?php echo base_url() ?>admin/group" class="btn btn-default block full-width m-b">Cancel</a>
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