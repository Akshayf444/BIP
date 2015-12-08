<?php
session_start();
if (!isset($_SESSION['tmemp'])) {
    header('Location:index.php');
}
require_once("./includes/initialize.php");
$TM_Emp_id = $_SESSION['tmemp'];
if (isset($_POST['submit'])) {
    $addLaunch = new Launch('TM_Launch');
    $field_array = array(
        'TM_Emp_Id' => $TM_Emp_id,
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
    <a href="TMDashboard.php" class="badge">GO Back</a>
</div>

<div class="col-lg-12">
    <h4>ADD BIP DIFFERENTIAL LAUNCH DETAIL</h4>
    <form action="#" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="docname" placeholder="Dr Name">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="act_detail" placeholder="Launch Details"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn-success" name="submit">
        </div>
    </form>
</div>
<?php require_once './footer.php'; ?>