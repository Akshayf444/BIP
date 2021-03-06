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
    <a href="View.php" class="badge">GO Back</a>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-12">
            <form action="SM_View.php" method="GET">
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
                            } else {
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
</div>


<?php
require_once './footer.php';
?>
