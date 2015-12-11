<?php
session_start();
require_once("./includes/initialize.php");

if (isset($_GET['type']) && $_GET['type'] == 'bdm') {
    if (isset($_SESSION['bdmemp'])) {
        $BM_Emp_id = $_SESSION['bdmemp'];
        $condition = array('WHERE bmp.BM_Emp_Id = ' . $BM_Emp_id, 'GROUP BY ta.TM_Emp_Id');
        $check = Activity::TMActivity($condition);
    }
}
require_once './header.php';

if (!empty($check)) {
    ?>
    <div class="col-lg-12">
        <a href="View_Activity.php" class="badge">GO Back</a>
    </div>
    <table class="table table-bordered table-stripped">
        <tr>
            <th><?php
    if (isset($_GET['type']) && $_GET['type'] == 'bdm') {
        echo "TM Name";
    } else {
        echo "TM Name";
    }
    ?></th>
            <th>BIP Launch</th>
            <th>BIP Device Check Camp</th>
            <th>BIP Paramedic Meet</th>
            <th>BIP Chemist Meet</th>
            <th>Visibility At Clinics</th>
            <th>Revolizer Rx</th>
            <th>ZVT Rx</th>
            <th>Rotahaler Rx</th>
        </tr>
        <?php foreach ($check as $check2) { ?>
            <tr>
                <td><?php
            if (isset($_GET['type']) && $_GET['type'] == 'bdm') {
                echo $check2->TM_Name;
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
    <?php
}

require_once './footer.php';
?>