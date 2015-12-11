<?php
session_start();

require_once("./includes/initialize.php");
require_once './header.php';
if (isset($_SESSION['bdmemp'])) {
    $id = $_SESSION['bdmemp'];
    $view = doctor::BM_Doctor_list($id);
    ?>
    <div class = "col-lg-12">
        <a href = "View_doctor.php" class = "badge">GO Back</a>
    </div>

    <div class = "row">
        <div class = "col-lg-12 ">
<!--            <h4 style="text-align: center">VIEW BIP DR (COMPETITORS)</h4>-->
            <form action = "View.php" method = "GET">
                <table class = "table table-bordered table-stripped">
                    <tr>
                        <th>Tm Name</th>
                        <th>Doctor Count</th>
                    </tr>
                    <?php
                    if (!empty($view)) {
                        foreach ($view as $v) {
                            ?>
                            <tr>
                                <td><a href="TM_all_doctor.php?id=<?php echo $v->TM_Emp_Id?>"><?php echo $v->TM_Name; ?></a></td>
                                <td><?php echo $v->doctor_count; ?></td>
                            </tr>
                        <?php
                        }
                    }
                    ?>
                </table>
            </form>
        </div>
    </div>
   
<?php } require_once './footer.php'; ?>

