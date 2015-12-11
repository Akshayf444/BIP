<?php
session_start();
require_once("./includes/initialize.php");
if (isset($_SESSION['bdmemp'])) {
    $BM_Emp_id = $_SESSION['bdmemp'];
    $Activities = Launch::BMActivity($BM_Emp_id);

} elseif (isset($_SESSION['tmemp'])) {
    $TM_Emp_id = $_SESSION['tmemp'];
    $Activities = Launch::TMActivity($TM_Emp_id);

}
require_once './header.php';
?>
<div class = "col-lg-12">
    <a href = "View.php" class = "badge">GO Back</a>
</div>
<style>
    .dropdown-menu {
        position: relative;
    }
</style>
<div class="col-lg-12">
    <h4>VIEW BIP DIFFERENTIAL LAUNCH DETAIL</h4>
    <table class="table table-bordered">
        <tr>
            <th>Sr. No.</th>
            <th>Dr. Name</th>
            <th>Launch Activity Details</th>
        </tr>
        <?php
        if (!empty($Activities)) {
            foreach ($Activities as $Activity) {
                echo '<tr>'
                . '<td>' . $Activity->launch_id . '</td>'
                . '<td>' . $Activity->docname . '</td>'
                . '<td><button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                View
                            </button>
                            <ul class="dropdown-menu" role="menu" style="padding:7px">
                                ' . $Activity->act_detail . '
                            </ul>
                            </td>
                            </tr>';
            }
        }
        ?>
    </table>
</div>

<?php
require_once './footer.php';
