<?php
session_start();
if (!isset($_SESSION['smemp'])) {
    header("Location: index.php");
    exit();
}
require_once("./includes/initialize.php");
require_once './header.php';
if (isset($_GET['report'])) {
    $report = $_GET['report'];
    if ($report == 'TM Report') {
       
        $check = Activity::TMActivity_Report($_SESSION['smemp']);
    } else {
        $check = Activity::BMActivity_Report($_SESSION['smemp']);
    }
}
?>
<div class="col-lg-12">
    <a href="SMDashboard.php" class="badge">GO Back</a>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-12">
            <form action="SM_View.php" method="GET">
                <select class="form-control" name="report">
                    <option value="TM Report" <?php
                    if (isset($report) && $report== 'TM Report') {
                        echo"selected";
                    }
                    ?>>TM Report</option>
                    <option value="BM Report" <?php
                    if (isset($report) && $report== 'BM Report') {
                        echo"selected";
                    }
                    ?>>BM Report</option>
                </select>
                <input type="submit" class="btn btn-success btn-block" value="Search"/>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php if (!empty($check)) { ?>
            <table class="table table-bordered table-stripped">
                <tr>
                    <th>BIP Device Check Camp</th>
                    <th>BIP Paramedic Meet</th>
                    <th>BIP Chemist Meet</th>
                    <th>Visibility At Clinics(Poster/Tearoff)</th>
                </tr>

                <tr>
                    <td><?php echo $check->device_check; ?></td>
                    <td><?php echo $check->paramedic; ?></td>
                    <td><?php echo $check->chemist_meet; ?></td>
                    <td><?php echo $check->visibility; ?></td>
                </tr>

            </table>
        <?php } ?>
    </div>
</div>


<?php
require_once './footer.php';
?>
