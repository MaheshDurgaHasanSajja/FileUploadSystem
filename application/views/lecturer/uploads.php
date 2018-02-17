<?php
/**
 * Uploads view
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Uploads.php
 * @package     Views
 * @author      Mahesh Sajja <maheshhasan07@gmail.com>
 * @license     http://www.opensource.org/licenses/mit-license.php MIT License
 * @link        http://localhost/online-exam/admin
 * @dateCreated 02/13/2018  MM/DD/YYYY
 * @dateUpdated 02/13/2018  MM/DD/YYYY 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Uploads.php
 *
 * @category Uploads.php
 * @package  Views
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */
?>
<div class="container-class col-lg-12 mt50">
    <div class="col-lg-12 no-padding">
        <h1>File Uploads</h1>
    </div>
    <div class="col-lg-12 table-responsive mt10">
        <table class="table table-bordered" id="list_of_lecturer_user_uploads" data-href="<?php echo base_url()."lecturer/dashboard/list_of_fileuploads"; ?>">
            <thead>
                <th>ID</th>
                <th>File Name</th>
                <th>Group Name</th>
                <th>Semister Name</th>
                <th>Subject Name</th>
                <th>Year</th>
                <th>Actions</th>
            </thead>
        </table>
    </div>
</div>