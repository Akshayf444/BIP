<?php

session_start();
if (!isset($_SESSION['smemp'])) {
    header("Location: index.php");
    exit();
}
require_once("./includes/initialize.php");
require_once './header.php';
?>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-stripped">
            <tr></tr>
        </table>
    </div>
</div>


<?php
require_once './footer.php'; 
?>
