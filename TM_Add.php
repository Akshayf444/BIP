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
                    <a href="TM_Add_Doctor.php" class="btn btn-success btn-block">ADD BIP DR (COMPETITORS)</a>
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
<!--<div class="row">
   <marquee style="    color: red;" behavior="scroll" direction="left">* Currently, only “Add BIP Dr” & “Add BIP Differential Launch” are active. “Add Activity Details” tab will be active from 2<sup>nd</sup> Jan 2016</marquee>
</div>
<div class="row">
   <marquee style="    color: red;" behavior="scroll" direction="left">* Earlier data filled in “Add Activity Details” has been reset to zero. It will be active from 2<sup>nd</sup> Jan 2016</marquee>
</div>-->

<?php require_once './footer.php'; ?>