<?php
/**
 * Admin layout view
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Admin.php
 * @package     Views
 * @author      Mahesh Sajja <maheshhasan07@gmail.com>
 * @license     http://www.opensource.org/licenses/mit-license.php MIT License
 * @link        http://localhost/online-exam/admin
 * @dateCreated 02/13/2018  MM/DD/YYYY
 * @dateUpdated 02/13/2018  MM/DD/YYYY 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin.php
 *
 * @category Admin.php
 * @package  Views
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */
?>
<!DOCTYPE html>
<html>

    <head>

        <script type="text/javascript">var SITEURL = "<?php echo base_url(); ?>";</script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>File Upload | Dashboard</title>

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Toastr style -->
        <link href="<?php echo base_url(); ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/basic.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweetalert/lib/sweet-alert.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dataTables/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dataTables/dataTables.tableTools.css" />

    </head>
    <body>
    	<div class="topnav">
		  <a class="active yes-no-alert pull-right" data-href="<?php echo base_url(); ?>admin/auth/logout" data-confirm-text='Are you sure to logout?'>Logout</a>
		</div>
        <div class="sidenav">
          <a href="javascript:void(0);" style="color:#fff;"><?php echo (isset($this->session->userdata['admin_session']['name']) && $this->session->userdata['admin_session']['name'] != "")?$this->session->userdata['admin_session']['name']:"Admin"; ?></a>
		  <a class="<?php echo ($this->uri->segment(2) != "" && $this->uri->segment(2) == "fileupload")?'active':''; ?> left-menu" href="<?php echo base_url(); ?>admin/fileupload">Dahboard</a>
		  <a class="<?php echo ($this->uri->segment(2) != "" && $this->uri->segment(2) == "semister")?'active':''; ?>" href="<?php echo base_url() ?>admin\semister">Semisters</a>
		  <a class="<?php echo ($this->uri->segment(2) != "" && $this->uri->segment(2) == "group")?'active':''; ?>" href="<?php echo base_url() ?>admin\group">Groups</a>
		  <a class="<?php echo ($this->uri->segment(2) != "" && $this->uri->segment(2) == "subject")?'active':''; ?>" href="<?php echo base_url() ?>admin\subject">Subjects</a>
		</div>

		<div class="main mt20">
		  <?php echo $content; ?>
		</div>
        <!-- Mainly scripts -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

        <!-- Toastr -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/toastr/toastr.min.js"></script>

        <script src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/dataTables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>assets/dataTables/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/relCopy.jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
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