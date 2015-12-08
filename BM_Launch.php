<?php
session_start();
if (!isset($_SESSION['bdmemp'])) {
    header('Location:index.php');
}
require_once("./includes/initialize.php");
$BM_Emp_id = $_SESSION['bdmemp'];
if (isset($_POST['submit'])) {
    $addLaunch = new Launch('BM_Launch');
    $field_array = array(
        'BM_Emp_Id' => $BM_Emp_id,
        'docname' => $_POST['docname'],
        'act_detail' => $_POST['act_detail'],
        'created' => date('Y-m-d H:i:s'),
    );
    if ($addLaunch->create($field_array)) {
        redirect_to('BM_Launch.php');
    }
}

require_once './header.php';
?>
<div class="col-lg-12">
    <a href="BM_Add.php" class="badge">GO Back</a>
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
