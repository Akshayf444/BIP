<?php
session_start();

require_once("./includes/initialize.php");
require_once './header.php';
if (isset($_SESSION['smemp'])) {
    $SM_Emp_id = $_SESSION['smemp'];
    $TMlist = man_power::TMDropdowm(array('WHERE SM_Emp_Id = ' . $SM_Emp_id));
    $BMlist = man_power::BMDropdowm(array('WHERE SM_Emp_Id = ' . $SM_Emp_id));
    if (isset($_POST['tmreport'])) {
        $TM_Emp_id = $_POST['tmreport'];
        $TMlist = man_power::TMDropdowm(array('WHERE SM_Emp_Id = ' . $SM_Emp_id), $TM_Emp_id);
        $view = doctor::TM_Doctor($TM_Emp_id);
    } elseif (isset($_POST['bmreport'])) {
        $BM_Emp_id = $_POST['bmreport'];
        $BMlist = man_power::BMDropdowm(array('WHERE SM_Emp_Id = ' . $SM_Emp_id), $BM_Emp_id);
        $view = doctor::BM_Doctor($BM_Emp_id);
    }
}
?>
<div class="col-xs-3">
    <a href = "View.php" class = "badge">GO Back</a>
</div>
<div class="col-xs-4">
    <?php
    if (!empty($TMlist) && isset($TMlist)) {
        echo '<form action="#" method="post"><select onchange="this.form.submit()"  name="tmreport">' . $TMlist . '</select></form>';
    }
    ?>
</div
<div class="col-xs-4">
    <?php
    if (!empty($BMlist) && isset($BMlist)) {
        echo '<form action="#" method="post"><select onchange="this.form.submit()"  name="bmreport">' . $BMlist . '</select></form>';
    }
    ?>
</div>
<br/>

<div class = "col-lg-12 ">
    <!--            <h4 style="text-align: center">VIEW BIP DR (COMPETITORS)</h4>-->
    <form action = "View.php" method = "GET">
        <table class = "table table-bordered table-stripped">
            <tr>
                <th>Doctor Name</th>
                <th>Competitor Brand /Device Prescribed</th>
                <th>Competitor Support (Rs)</th>
            </tr>
            <?php
            if (!empty($view)) {
                foreach ($view as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v->doctor_name; ?></td>
                        <td><?php echo $v->brand; ?></td>
                        <td><?php echo $v->support; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </form>
</div>


<?php require_once './footer.php'; ?>

