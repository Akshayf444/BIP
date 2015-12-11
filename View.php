<?php
session_start();

require_once("./includes/initialize.php");
require_once './header.php';
if (isset($_SESSION['bdmemp'])) {
    ?>
    <div class="row">
        <div class="col-xs-3"></div>
        <div class="col-lg-6 panel panel-default">
            <div class="panel panel-body">
                <div align="center" class="row">
                    <div class="form-group">
                        <a href="View_Doctor.php" class="btn btn-success btn-block ">VIEW BIP DR (COMPETITORS)</a>
                    </div>
                </div>
                <div align="center" class="row">
                    <div class="form-group">
                        <a href="View_Launch.php" class="btn btn-success btn-block">VIEW BIP DIFFERENTIAL LAUNCH</a>
                    </div>
                </div>
                <div align="center" class="row">
                    <div class="form-group">
                        <a href="View_Activity.php" class="btn btn-success btn-block">VIEW ACTIVITY DETAILS</a>
                    </div>
                </div>
                <div align="center" class="row">
                    <div class="form-group">
                        <a href="BMDashboard.php" class="btn btn-success btn-block">GO BACK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } elseif (isset($_SESSION['tmemp'])) {
    ?>
    <div class="row">
        <div class="col-xs-3"></div>
        <div class="col-lg-6 panel panel-default">
            <div class="panel panel-body">
                <div align="center" class="row">
                    <div class="form-group">
                        <a href="View_Doctor.php" class="btn btn-success btn-block ">VIEW BIP DR (COMPETITORS)</a>
                    </div>
                </div>
                <div align="center" class="row">
                    <div class="form-group">
                        <a href="View_Launch.php" class="btn btn-success btn-block">VIEW BIP DIFFERENTIAL LAUNCH</a>
                    </div>
                </div>
                <div align="center" class="row">
                    <div class="form-group">
                        <a href="View_Activity.php" class="btn btn-success btn-block">VIEW ACTIVITY DETAILS</a>
                    </div>
                </div>
                <div align="center" class="row">
                    <div class="form-group">
                        <a href="TMDashboard.php" class="btn btn-success btn-block">GO BACK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    ?>
<div class="row">
        <div class="col-xs-3"></div>
        <div class="col-lg-6 panel panel-default">
            <div class="panel panel-body">
                <div align="center" class="row">
                    <div class="form-group">
                        <a href="TM_BM_Doctor.php" class="btn btn-success btn-block ">VIEW BIP DR (COMPETITORS)</a>
                    </div>
                </div>
                <div align="center" class="row">
                    <div class="form-group">
                        <a href="#" class="btn btn-success btn-block">VIEW BIP DIFFERENTIAL LAUNCH</a>
                    </div>
                </div>
                <div align="center" class="row">
                    <div class="form-group">
                        <a href="SM_View.php" class="btn btn-success btn-block">VIEW ACTIVITY DETAILS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <?php
    }
    require_once './footer.php';
    ?>
