<?php
/**
 * Dashboard view
 *
 * PHP version 7.0.22
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    dashboard.php
 * @package     Views
 * @author      Mahesh Sajja <maheshhasan07@gmail.com>
 * @license     http://www.opensource.org/licenses/mit-license.php MIT License
 * @link        http://localhost/online-exam/admin
 * @dateCreated 02/13/2018  MM/DD/YYYY
 * @dateUpdated 02/13/2018  MM/DD/YYYY 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * dashboard.php
 *
 * @category dashboard.php
 * @package  Views
 * @author   Mahesh Sajja <maheshhasan07@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://localhost/online-exam/admin
 */
?>
<div class="container-class col-lg-12 mt50">
    <div class="col-lg-12 no-padding">
        <h1>List of files</h1>
    </div>
    <div class="col-lg-12 table-responsive mt10">
        <table class="table table-bordered" id="list_of_user_files">
            <thead>
                <th>ID</th>
                <th>File Name</th>
                <th>Group Name</th>
                <th>Semister Name</th>
                <th>Subject Name</th>
                <th>Year</th>
            </thead>
            <tbody>
                <?php
                    foreach ($user_file_info as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td>
                                    <a target="_blank" href="<?php echo base_url(); ?>user/dashboard/view/<?php echo $value['file_name']; ?>"><?php echo $value['file_name']; ?></a>
                                </td>
                                <td><?php echo $value['group_name']; ?></td>
                                <td><?php echo $value['semister_name']; ?></td>
                                <td><?php echo $value['subject_name']; ?></td>
                                <td><?php echo $value['year']; ?></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>