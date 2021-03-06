<?php
session_start();
if (!isset($_SESSION['bdmemp'])) {
    header("Location: index.php");
    exit();
}
require_once("./includes/initialize.php");
require_once './header.php';
if (isset($_GET['doctor_name'])) {
    for ($i = 0; $i < count($_GET['doctor_name']); $i++) {
        $doctor_name = $_GET['doctor_name'][$i];
        $brand = $_GET['brand'][$i];
        $support = $_GET['support'][$i];
        $field_array = array(
            'doctor_name' => $doctor_name,
            'smsWayID' => $_SESSION['bdm'],
            'BM_Emp_Id' => $_SESSION['bdmemp'],
            'brand' => $brand,
            'support' => $support,
            'created' => date('Y-m-d H:i:s'),
        );
        $add_doctor = new doctor('bm_doctor');
        if ($doctor_name != '' && $brand != '') {
            $add_doctor->create($field_array);
        }
    }
    echo '<script>alert("Data Added Successfully.");</script>';
    echo '<script>window.location = "BM_Add_Doctor.php"; </script>';
}
?>
<div class="col-lg-12">
    <a href="BM_Add.php" class="badge">GO Back</a>
</div>

<div class="row">
    <div class="col-lg-12 ">
        <h4>ADD BIP DR (COMPETITORS)</h4>
        <form action="BM_Add_Doctor.php" method="GET">
            <table class="table table-bordered table-stripped">
                <tr>
                    <th>Sr. No.</th>
                    <th>Doctor Name</th>
                    <th>Competitor Brand /Device Prescribed</th>
                    <th>Competitor Support (Rs)</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><input type="text" name="doctor_name[]" class="form-control"></td>
                    <td><input type="text" name="brand[]" class="form-control"></td>
                    <td><input type="text" name="support[]" class="form-control"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><input type="text" name="doctor_name[]" class="form-control"></td>
                    <td><input type="text" name="brand[]" class="form-control"></td>
                    <td><input type="text" name="support[]" class="form-control"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><input type="text" name="doctor_name[]" class="form-control"></td>
                    <td><input type="text" name="brand[]" class="form-control"></td>
                    <td><input type="text" name="support[]" class="form-control"></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><input type="text" name="doctor_name[]" class="form-control"></td>
                    <td><input type="text" name="brand[]" class="form-control"></td>
                    <td><input type="text" name="support[]" class="form-control"></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><input type="text" name="doctor_name[]" class="form-control"></td>
                    <td><input type="text" name="brand[]" class="form-control"></td>
                    <td><input type="text" name="support[]" class="form-control"></td>
                </tr>
            </table>
            <div class="row">
                <div align="center" class="col-lg-12">
                    <input type="submit" class="btn btn-success" value="Submit"/>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once './footer.php'; ?>