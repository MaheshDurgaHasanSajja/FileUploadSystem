<?php
/**
 * Login view
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    login.php
 * @package     Views
 * @author      Mahesh Sajja <maheshhasan07@gmail.com>
 * @license     http://www.opensource.org/licenses/mit-license.php MIT License
 * @link        http://localhost/online-exam/admin
 * @dateCreated 02/13/2018  MM/DD/YYYY
 * @dateUpdated 02/13/2018  MM/DD/YYYY 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * login.php
 *
 * @category login.php
 * @package  Views
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Login</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" >
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Toastr style -->
  <link href="<?php echo base_url(); ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
</head>
<body>

  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <!-- add header -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0);">File Upload System</a>
      </div>
      <!-- menu items -->
      <div class="collapse navbar-collapse" id="navbar1">
        <ul class="nav navbar-nav navbar-right">
          <li class=""><a href="<?php echo base_url(); ?>admin/auth">Admin</a></li>
          <li class=""><a href="<?php echo base_url(); ?>user/login">Student</a></li>
          <li class="active"><a href="<?php echo base_url(); ?>lecturer/login">Lecturer</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container pt110">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 well">
        <?php
        echo form_open(base_url("lecturer/login"), array("id" => "login_form", "name" => "login_form"));
        ?>
        <fieldset>
          <legend>Login</legend>
          <div class="form-group">
            <label for="name">Email</label>
            <?php
            $email = array("name" => "email",
              "id" => "email",
              "class" => "required form-control",
              "placeholder" => "Your Email Address",
              "value" => set_value('email', '')
              );
            echo form_input($email);
            echo form_error('email');
            ?>
          </div>
          <div class="form-group">
            <label for="name">Password</label>
            <?php
            $password = array("name" => "password",
              "type" => "password",
              "id" => "password",
              "class" => "required form-control",
              "placeholder" => "Password"
              );
            echo form_input($password);
            echo form_error('password');
            ?>
          </div>
          <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
          <div class="row">
            <div class="text-center">  
            New User? <a href="<?php echo base_url(); ?>lecturer/register">Sign Up Here</a>
            </div>
          </div>
        </fieldset>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>

  <!-- Mainly scripts -->
  <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <!-- Toastr -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/toastr/toastr.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
  <?php if ($this->session->flashdata('errormessage')) { ?>
  <script type="text/javascript">
            // Toastr options
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "progressBar": true,
              "positionClass": "toast-top-center",
              "onclick": null,
              "showDuration": "400",
              "hideDuration": "1000",
              "timeOut": "7000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
            toastr.error("<?php echo $this->session->flashdata('errormessage'); ?>");
          </script>
          <?php } ?>
          <?php if ($this->session->flashdata('successmessage')) { ?>
          <script type="text/javascript">
                // Toastr options
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "progressBar": true,
                  "positionClass": "toast-top-center",
                  "onclick": null,
                  "showDuration": "400",
                  "hideDuration": "1000",
                  "timeOut": "7000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr.success("<?php echo $this->session->flashdata('successmessage'); ?>");
              </script>
              <?php } ?>
            </body>
            </html>