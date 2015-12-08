<?php
session_start();
require_once("./includes/initialize.php");
require_once './header.php';
?>
<div class="row">
    <div class="col-xs-3"></div>
    <div class="col-lg-6 panel panel-default">
        <div class="panel panel-body">
            <div align="center" class="row">
                <div class="form-group">
                    <a href="TM_Add_Doctor.php" class="btn btn-success btn-block">ADD BIP SELECTION OF DR(COMPETITORS)</a>
                </div>
            </div>
            <div align="center" class="row">
                <div class="form-group">
                    <a href="TM_Launch.php" class="btn btn-success btn-block">ADD BIP DIFFERENTIAL LAUNCH</a>
                </div>
            </div>
            <div align="center" class="row">
                <div class="form-group">
                    <a href="TM_Activity.php" class="btn btn-success btn-block">ADD ACTIVITY DETAILS</a>
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

<?php require_once './footer.php'; ?>