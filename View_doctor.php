<?php
session_start();

require_once("./includes/initialize.php");
require_once './header.php';
if (isset($_SESSION['bdmemp'])) {
    $id = $_SESSION['bdmemp'];
    $view = doctor::BM_Doctor($id);
    ?>
    <div class = "col-lg-12">
        <a href = "View.php" class = "badge">GO Back</a>
        <a href = "Tm_doctor_view.php" class = "badge">TM Report</a>
    </div>

    <div class = "row">
        <div class = "col-lg-12 ">
            <h4 style="text-align: center">VIEW BIP DR (COMPETITORS)</h4>
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
    </div>
    <?php
} else {
    $id = $_SESSION['tmemp'];
    $view = doctor::TM_Doctor($id);
    ?>
    <div class = "col-lg-12">
        <a href = "View.php" class = "badge">GO Back</a>
    </div>

    <div class = "row">
        <div class = "col-lg-12 ">
            <h4 style="text-align: center">VIEW BIP DR (COMPETITORS)</h4>
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
    </div>

<?php } require_once './footer.php'; ?>

