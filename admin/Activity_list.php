<?php
session_start();
if (!isset($_SESSION['adminname'])) {
    header("Location: index.php");
    exit();
}
require_once("../includes/initialize.php");
require_once 'header.php';
if (isset($_GET['report'])) {
    $report = $_GET['report'];
    if ($report == 'TM Report') {
        $condition = array("GROUP BY bmp.TM_Emp_Id");
        $check = Activity::TMActivity($condition);
    } elseif ($report == 'TM Report') {
        $condition = array("GROUP BY bmp.BM_Emp_Id");
        $check = Activity::BMActivity($condition);
    } else {
        $condition = array("GROUP BY bmp.SM_Emp_Id");
        $check = Activity::SMActivity($condition);
    }
}
?>
<div class="col-lg-12">
    <a href="adminDashBoard.php" class="badge">GO Back</a>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-12">
            <form action="Activity_list.php" method="GET">
                <div class="col-xs-6">
                    <select class="form-control" name="report">
                        <option value="TM Report" <?php
                        if (isset($report) && $report == 'TM Report') {
                            echo"selected";
                        }
                        ?>>TM Report</option>
                        <option value="BM Report" <?php
                        if (isset($report) && $report == 'BM Report') {
                            echo"selected";
                        }
                        ?>>BM Report</option>
                        <option value="SM Report" <?php
                        if (isset($report) && $report == 'SM Report') {
                            echo"selected";
                        }
                        ?>>SM Report</option>
                    </select></div>
                <div class="col-xs-6">
                    <input type="submit" class="btn btn-success btn-block" value="Search"/>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php if (!empty($check)) { ?>
            <table class="table table-bordered table-stripped">
                <tr>
                    <th><?php
                        if (isset($report) && $report == 'BM Report') {
                            echo "BM Name";
                        } else {
                            echo "TM Name";
                        }
                        ?></th>
                    <th>BIP Device Check Camp</th>
                    <th>BIP Paramedic Meet</th>
                    <th>BIP Chemist Meet</th>
                    <th>Visibility At Clinics(Poster/Tearoff)</th>
                </tr>
                <?php foreach ($check as $check2) { ?>
                    <tr>
                        <td><?php
                            if (isset($report) && $report == 'BM Report') {
                                echo $check2->BM_Name;
                            } else {
                                echo $check2->TM_Name;
                            }
                            ?></td>
                        <td><?php echo $check2->device_check; ?></td>
                        <td><?php echo $check2->paramedic; ?></td>
                        <td><?php echo $check2->chemist_meet; ?></td>
                        <td><?php echo $check2->visibility; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </div>
</div>


<?php
require_once 'footer.php';
?>
