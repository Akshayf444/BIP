<?php
session_start();

require_once("../includes/initialize.php");
require_once './header.php';
$SBH_Emp_Id = $_SESSION['SBH_Emp_Id'];
?>
<br>
<div class="col-xs-3">
    <a href = "View.php" class = "badge">GO Back</a>
</div>

<div class="col-xs-3">
    <a href="View_Doctor.php?tmreport=true" class="badge">TM REPORT</a>
</div>
<div class="col-xs-3">
    <a href="View_Doctor.php?bmreport=true" class="badge">BM REPORT</a>
</div>
</br>
<div class = "col-lg-12 ">
    <!--            <h4 style="text-align: center">VIEW BIP DR (COMPETITORS)</h4>-->
    <form action = "View.php" method = "GET">
        <table class = "table table-bordered table-stripped">
            <tr>
                <th>Zone</th>
                <th>Region</th>
                <th>Empid</th>
                <th>Name</th>
                <th>Doctor Name</th>
                <th>Competitor Brand /Device Prescribed</th>
                <th>Competitor Support (Rs)</th>
            </tr>
            <?php
            $SMList = man_power::SMList(array('WHERE SBH_Emp_Id = ' . $SBH_Emp_Id));
            if (!empty($SMList)) {
                foreach ($SMList as $value) {
                    if ($value->SM_Emp_Id != '') {
                        if (isset($_GET['tmreport'])) {
                            $TMlist = man_power::TMList(array('WHERE SM_Emp_Id = ' . $value->SM_Emp_Id));

                            if (!empty($TMlist)) {
                                foreach ($TMlist as $value2) {
                                    if ($value2->TM_Emp_Id != '') {
                                        $view = doctor::TM_Doctor($value2->TM_Emp_Id);
                                        if (!empty($view)) {
                                            foreach ($view as $v) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $value2->Zone; ?></td>
                                                    <td><?php echo $value2->Region; ?></td>
                                                    <td><?php echo $value2->TM_Emp_Id; ?></td>
                                                    <td><?php echo $value2->TM_Name; ?></td>
                                                    <td><?php echo $v->doctor_name; ?></td>
                                                    <td><?php echo $v->brand; ?></td>
                                                    <td><?php echo $v->support; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                }
                            }
                        } elseif (isset($_GET['bmreport'])) {
                            $BMlist = man_power::BMList(array('WHERE SM_Emp_Id = ' . $value->SM_Emp_Id));
                            if (!empty($BMlist)) {
                                foreach ($BMlist as $value2) {
                                    if ($value2->BM_Emp_Id != '') {
                                        $view = doctor::BM_Doctor($value2->BM_Emp_Id);
                                        if (!empty($view)) {
                                            foreach ($view as $v) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $value2->Zone; ?></td>
                                                    <td><?php echo $value2->Region; ?></td>
                                                    <td><?php echo $value2->BM_Emp_Id; ?></td>
                                                    <td><?php echo $value2->BM_Name; ?></td>
                                                    <td><?php echo $v->doctor_name; ?></td>
                                                    <td><?php echo $v->brand; ?></td>
                                                    <td><?php echo $v->support; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            ?>
        </table>
    </form>
</div>
<?php require_once './footer.php'; ?>