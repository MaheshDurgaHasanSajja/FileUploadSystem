<?php
/**
 * Register view
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Register.php
 * @package     Views
 * @author      Mahesh Sajja <maheshhasan07@gmail.com>
 * @license     http://www.opensource.org/licenses/mit-license.php MIT License
 * @link        http://localhost/online-exam/admin
 * @dateCreated 02/13/2018  MM/DD/YYYY
 * @dateUpdated 02/13/2018  MM/DD/YYYY 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Register.php
 *
 * @category Register.php
 * @package  Views
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Signup</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2-bootstrap.css" />
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 well">
                <?php
                echo form_open(base_url("user/register"), array("id" => "register_form", "name" => "register_form"));
                ?>
                <fieldset>
                    <legend>Sign Up</legend>
                    <div class="form-group">
                        <?php
                        $name = array("name" => "name",
                            "id" => "name",
                            "class" => "required form-control",
                            "placeholder" => "Your Name",
                            "maxlength" => 20,
                            "value" => set_value('name', '')
                            );
                        echo form_input($name);
                        echo form_error('name');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $email = array("name" => "email",
                            "id" => "email",
                            "type" => "email",
                            "class" => "required form-control",
                            "maxlength" => 50,
                            "placeholder" => "Your Email Address",
                            "value" => set_value('email', '')
                            );
                        echo form_input($email);
                        echo form_error('email');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $phone_number = array("name" => "phone_number",
                            "id" => "phone_number",
                            "class" => "required form-control",
                            "maxlength" => 50,
                            "placeholder" => "Your phone number",
                            "value" => set_value('phone_number', '')
                            );
                        echo form_input($phone_number);
                        echo form_error('phone_number');
                        ?>
                    </div>
                    <div class="form-group">
                        <label> <input type="radio" class="required" name="gender" value="M"><i></i> Male </label>
                        <label> <input type="radio" class="required" name="gender" value="F"><i></i> Female </label>
                    </div>
                    <div class="form-group">
                        <?php
                        $address = array("name" => "address",
                            "id" => "address",
                            "class" => "required form-control",
                            "placeholder" => "Your address",
                            "value" => set_value('address', ''),
                            "rows" => 5
                            );
                        echo form_textarea($address);
                        echo form_error('address');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $options =array();
                        for ($i = date("Y"); $i > 2000; $i--) {
                            $options[$i] = $i;
                        }
                        $js = 'id="year" class="form-control required js-source-states-2" placeholder="Select year" multiple';
                        echo form_dropdown('year[]', $options, set_value('year'),$js);
                        echo form_error('year');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $options =array('' => "Select group");
                        foreach ($group_info as $key => $value) {
                            $options[$value['id']] = $value['group_name'];
                        }
                        $js = 'id="group_id" class="form-control required"';
                        echo form_dropdown('group_id', $options, set_value('group_id'),$js);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $options =array();
                        foreach ($semister_info as $key => $value) {
                            $options[$value['id']] = $value['semister_name'];
                        }
                        $js = 'id="semister_id" class="form-control required js-source-states-2" placeholder="Select semister" multiple';
                        echo form_dropdown('semister_id[]', $options, set_value('semister_id'),$js);
                        ?>
                    </div>
                        <?php /* <div class="form-group">
                            <?php
                                $options =array();
                                foreach ($subject_info as $key => $value) {
                                    $options[$value['id']] = $value['subject_name'];
                                }
                                $js = 'id="subject_id" class="form-control required js-source-states-2" placeholder="Select subject" multiple';
                                echo form_dropdown('subject_id[]', $options, set_value('subject_id'),$js);
                            ?>
                        </div> */ ?>
                        <div class="form-group">
                            <?php
                            $password = array("name" => "password",
                                "id" => "password",
                                "type" => "password",
                                "maxlength" => 20,
                                "minlength" => 5,
                                "class" => "required form-control",
                                "placeholder" => "Your password",
                                );
                            echo form_input($password);
                            echo form_error('password');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $password = array("name" => "passconf",
                                "id" => "passconf",
                                "type" => "password",
                                "maxlength" => 20,
                                "minlength" => 5,
                                "class" => "required form-control",
                                "placeholder" => "Confirm password",
                                );
                            echo form_input($password);
                            echo form_error('passconf');
                            ?>
                        </div>
                        <div class="form-group">
                            <div class="checkbox i-checks"><label> <input type="checkbox" name="agree" class="required" value="1"><i></i> Agree the terms and policy </label></div>
                        </div>
                        

                        <div class="form-group">
                            <input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
                        </div>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center" style="padding-bottom: 30px;">  
                    Already Registered? <a href="<?php echo base_url() ?>user/login">Login Here</a>
                </div>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
    </body>
    </html>