<?php
session_start();
require_once("./includes/initialize.php");
require_once './header.php';
if(isset($_GET['doctor_name']))
{
    for ($i = 0; $i < count($_GET['doctor_name']); $i++) {
       $doctor_name=$_GET['doctor_name'][$i];
       $brand=$_GET['brand'][$i];
       $support=$_GET['support'][$i];
       $add_doctor=new Tm_
    }
}
?>
<div class="row">
    <div class="col-lg-12 ">
        <form action="TM_Add_Doctor.php" method="GET">
        <table class="table table-bordered table-stripped">
            <tr>
                <th>Sr.NO</th>
                <th>Doctor Name</th>
                <th>Competiton For Brand / Device Prescribe</th>
                <th>Competiton For Support(Rs)</th>
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