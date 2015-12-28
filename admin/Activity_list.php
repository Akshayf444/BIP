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
    } elseif ($report == 'BM Report') {
        $condition = array("GROUP BY bmp.BM_Emp_Id");
        $check = Activity::BMActivity($condition);
    } else {
        $condition = array("GROUP BY t_union.SM_Emp_Id");
        $condition2 = array("GROUP BY bmp.SM_Emp_Id");
        $check = Activity::SMActivity($condition,$condition2);
    }
}
?>
<div class="col-lg-12" style="margin-bottom: 1em;">
    <a href="adminDashBoard.php" class="badge">GO Back</a>
</div>
<script src="http://instacom.in/jardiance/js/excellentexport.min.js" type="text/javascript"></script>
<script src="http://instacom.in/jardiance/js/jquery.dataTables.min.js" type="text/javascript"></script>

<form action="Activity_list.php" method="GET" >
    <div class="col-xs-3" >
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
        </select>
    </div>
    <div class="col-xs-3">
        <input type="submit" class="btn btn-success btn-block" value="Search"/>
    </div>
    <div class="col-xs-3">
        <a download="Report<?php echo date('dMY'); ?>.xls" class="btn btn-success" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheeting');">Export to Excel</a>
    </div>
</form>

<div class="col-lg-12" style="margin-top: 1em;">
    <?php if (!empty($check)) { ?>
        <table id="" class="table table-bordered table-stripped datatable">
            <tr>
                <th><?php
                    if (isset($report) && $report == 'BM Report') {
                        echo "BM Name";
                    } elseif (isset($report) && $report == 'SM Report') {
                        echo "SM Name";
                    } elseif (isset($report) && $report == 'TM Report') {
                        echo "TM Name";
                    }
                    ?></th>
                <th>BIP Launch</th>
                <th>BIP Device Check Camp</th>
                <th>BIP Paramedic Meet</th>
                <th>BIP Chemist Meet</th>
                <th>Visibility At Clinics(Poster/Tearoff)</th>
                <th>Revolizer Rx</th>
                <th>ZVT Rx</th>
                <th>Rotahaler Rx</th>
            </tr>
            <?php foreach ($check as $check2) { ?>
                <tr>
                    <td><?php
                        if (isset($report) && $report == 'BM Report') {
                            echo $check2->BM_Name;
                        } elseif (isset($report) && $report == 'SM Report') {
                            echo $check2->SM_Name;
                        } elseif (isset($report) && $report == 'TM Report') {
                            echo $check2->TM_Name;
                        }
                        ?></td>
                    <td><?php echo $check2->launch; ?></td>
                    <td><?php echo $check2->device_check; ?></td>
                    <td><?php echo $check2->paramedic; ?></td>
                    <td><?php echo $check2->chemist_meet; ?></td>
                    <td><?php echo $check2->visibility; ?></td>
                    <td><?php echo $check2->revolizer; ?></td>
                    <td><?php echo $check2->zvt; ?></td>
                    <td><?php echo $check2->rotahaler; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</div>
<?php
require_once 'footer.php';