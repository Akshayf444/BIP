<?php
session_start();
require_once("./includes/initialize.php");
if (isset($_SESSION['bdmemp'])) {
    $BM_Emp_id = $_SESSION['bdmemp'];
    $Activities = Launch::BMActivity($BM_Emp_id);

    echo '<div class="col-lg-12">
            <a href="BM_Add.php" class="badge">GO Back</a>
        </div>';
} elseif (isset($_SESSION['tmemp'])) {
    $TM_Emp_id = $_SESSION['tmemp'];
    $Activities = Launch::TMActivity($TM_Emp_id);

    echo '<div class="col-lg-12">
            <a href="TM_Add.php" class="badge">GO Back</a>
        </div>';
}
require_once './header.php';
?>
<div class = "col-lg-12">
    <a href = "View.php" class = "badge">GO Back</a>
</div>
<div class="col-lg-12">
    <h4>VIEW BIP DIFFERENTIAL LAUNCH DETAIL</h4>
    <table class="table table-bordered">
        <tr>
            <th>Sr No.</th>
            <th>Dr. Name</th>
            <th>Launch Activity Details</th>
        </tr>
        <?php
        if (!empty($Activities)) {
            foreach ($Activities as $Activity) {
                echo '<tr>'
                . '<td>' . $Activity->launch_id . '</td>'
                . '<td>' . $Activity->docname . '</td>'
                . '<td>View</td></tr>';
            }
        }
        ?>
    </table>
</div>


<?php
require_once './footer.php';
