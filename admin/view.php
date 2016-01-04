<?php
session_start();

require_once './header.php';
?>
<div class = "row">
    <div class = "col-xs-3"></div>
    <div class = "col-lg-6 panel panel-default">
        <div class = "panel panel-body">
            <div align = "center" class = "row">
                <div class = "form-group">
                    <a href = "View_Doctor.php" class = "btn btn-success btn-block ">VIEW BIP DR (COMPETITORS)</a>
                </div>
            </div>
            <div align = "center" class = "row">
                <div class = "form-group">
                    <a href = "View_Launch.php" class = "btn btn-success btn-block">VIEW BIP DIFFERENTIAL LAUNCH</a>
                </div>
            </div>
            <div align="center" class="row">
                <div class="form-group">
                    <a href="#" class="btn btn-success btn-block">VIEW ACTIVITY DETAILS</a>
                </div>
            </div>
            <div align = "center" class = "row">
                <div class = "form-group">
                    <a href = "SBHDashboard.php" class = "btn btn-success btn-block">GO BACK</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once './footer.php';
?>
