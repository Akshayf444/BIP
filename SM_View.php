<?php

session_start();
if (!isset($_SESSION['smemp'])) {
    header("Location: index.php");
    exit();
}
require_once("./includes/initialize.php");
require_once './header.php';
?>



<?php
require_once './footer.php'; 
?>
