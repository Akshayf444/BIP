<?php
session_start();
require_once("./includes/initialize.php");
if (isset($_POST['submit'])) {
    $addLaunch = new Launch('TM_Launch');
    $field_array = array(
        'TM_Emp_Id' => $_SESSION['tmemp'],
        'docname' => $_POST['docname'],
        'act_detail' => $_POST['act_detail'],
        'created' => date('Y-m-d H:i:s'),
    );
    if ($addLaunch->create($field_array)) {
        redirect_to('TM_Launch.php');
    }
}

require_once './header.php';
?>
<div class="col-lg-12">
    <form action="#" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="docname">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="act_detail">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control" name="submit">
        </div>
    </form>
</div>
<?php require_once './footer.php'; ?>