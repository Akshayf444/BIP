<?php
session_start();
if (!isset($_SESSION['tmemp'])) {
    header('Location:index.php');
}
require_once("./includes/initialize.php");
$TM_Emp_id = $_SESSION['tmemp'];
if (isset($_POST['submit'])) {
    $addActivity = new Activity('TM_Activity');
    $field_array = array(
        'launch' => $_POST['launch'],
        'device_check' => $_POST['device_check'],
        'paramedic' => $_POST['paramedic'],
        'chemist_meet' => $_POST['chemist_meet'],
        'visibility' => $_POST['visibility'],
        'revolizer' => $_POST['revolizer'],
        'zvt' => $_POST['zvt'],
        'rotahaler' => $_POST['rotahaler'],
        'TM_Emp_id' => $TM_Emp_id,
        'created' => date('Y-m-d H:i:s'),
        'smswayid' => $_SESSION['smsWayID'],
    );
    $addActivity->create($field_array);
    redirect_to('BM_Activity.php');
}
require_once './header.php';
?>
<div class="col-lg-12">
    <a href="View.php" class="badge">GO Back</a>
</div>
<div class="col-lg-12">
    <h4>ADD BIP ACTIVITY</h4>
    <form action="#" method="post">
        <div class="form-group">
            <label>BIP Launch</label>
            <input type="number" min="0" class="form-control" name="launch" >
        </div>
        <div class="form-group">
            <label>BIP Device Check Camp</label>
            <input type="number" min="0" class="form-control" name="device_check" >
        </div>
        <div class="form-group">
            <label> BIP Paramedic Meet</label>
            <input type="number" min="0" class="form-control" name="paramedic" >
        </div>
        <div class="form-group">
            <label> BIP Chemist Meet</label>
            <input type="number" min="0" class="form-control" name="chemist_meet" >
        </div>
        <div class="form-group">
            <label>Visibility At Clinics</label>
            <input type="number" min="0" class="form-control" name="visibility" >
        </div>

        <div class="form-group">
            <label>Device Rx Generated</label>
            <input type="number" class="form-control" name="revolizer" placeholder="Revolizer">
            <input type="number" class="form-control" name="zvt" placeholder="ZVT">
            <input type="number" class="form-control" name="rotahaler" placeholder="Rotahaler">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn-success" name="submit">
        </div>
    </form>
</div>
<?php require_once './footer.php'; ?>