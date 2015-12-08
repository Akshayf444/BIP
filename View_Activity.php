<?php
session_start();
require_once("./includes/initialize.php");
if (isset($_SESSION['bdmemp'])) {
    $BM_Emp_id = $_SESSION['bdmemp'];
    $condition = array('WHERE BM_Emp_Id = ' . $BM_Emp_id);
    $Activities = Activity::BMActivity($condition);
} elseif (isset($_SESSION['tmemp'])) {
    $TM_Emp_id = $_SESSION['tmemp'];
    $condition = array('WHERE TM_Emp_Id = ' . $TM_Emp_id);
    $Activities = Activity::TMActivity($condition);
}
require_once './header.php';
?>
<div class="col-lg-12">
    <a href="View.php" class="badge">GO Back</a>
</div>
<div class="col-lg-12">
    <h4>VIEW BIP ACTIVITY</h4>
    <table class="table table-bordered">
        <tr>
            <th>Sr No.</th>
            <th>Activity Name</th>
            <th>Count</th>
        </tr>
        <?php
        if (!empty($Activities)) {
            $Activities = array_shift($Activities);

            echo '<tr>'
            . '<td>1</td><td>BIP Launch</td><td>' . $Activities->launch . '</td></tr><tr>'
            . '<td>2</td><td>BIP Device Check Camp</td><td>' . $Activities->device_check . '</td></tr><tr>'
            . '<td>3</td><td>BIP Paramedic Meet</td><td>' . $Activities->paramedic . '</td></tr><tr>'
            . '<td>4</td><td>BIP Chemist Meet</td><td>' . $Activities->chemist_meet . '</td></tr><tr>'
            . '<td>5</td><td>Visibility At Clinics</td><td>' . $Activities->visibility . '</td></tr><tr>'
            . '<td>6</td><td>Revolizer Rx Generated</td><td>' . $Activities->revolizer . '</td></tr><tr>'
            . '<td>7</td><td>ZVT Rx Generated</td><td>' . $Activities->zvt . '</td></tr><tr>'
            . '<td>8</td><td>Rotahaler Rx Generated</td><td>' . $Activities->rotahaler . '</td>'
            . '</tr>';
        }
        ?>
    </table>
</div>


<?php
require_once './footer.php';
