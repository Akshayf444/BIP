<?php
session_start();
require_once("./includes/initialize.php");
if (isset($_SESSION['bdmemp'])) {
    $BM_Emp_id = $_SESSION['bdmemp'];
    $Activities = Launch::BMActivity($BM_Emp_id);
    $TMlist = man_power::TMDropdowm(array('WHERE BM_Emp_Id = ' . $BM_Emp_id));

    if (isset($_POST['tmreport'])) {
        $TM_Emp_id = $_POST['tmreport'];
        $TMlist = man_power::TMDropdowm(array('WHERE BM_Emp_Id = ' . $BM_Emp_id), $TM_Emp_id);
        $Activities = Launch::TMActivity($TM_Emp_id);
    }
} elseif (isset($_SESSION['tmemp'])) {
    $TM_Emp_id = $_SESSION['tmemp'];

    $Activities = Launch::TMActivity($TM_Emp_id);
}
require_once './header.php';
?>

<div class="col-xs-3">
    <a href = "View.php" class = "badge">GO Back</a>
</div>
<div class="col-xs-9">
    <?php
    if (!empty($TMlist) && isset($TMlist)) {
        echo '<form action="#" method="post"><select onchange="this.form.submit()"  name="tmreport">' . $TMlist . '</select></form>';
    }
    ?>
</div><br/>

<div class="col-lg-12">
    <h4>VIEW BIP DIFFERENTIAL LAUNCH DETAIL</h4>
    <table class="table table-bordered">
        <tr>
            <th>Sr. No.</th>
            <th>Dr. Name</th>
            <th>Launch Activity Details</th>
        </tr>
        <?php
        if (!empty($Activities)) {
            $count = 1;
            foreach ($Activities as $Activity) {
                echo '<tr>'
                . '<td>' . $count++. '</td>'
                . '<td>' . $Activity->docname . '</td>'
                . '<td><button type="button" class="btn btn-link btn-primary" data-container="body" data-toggle="popover" data-content="' . $Activity->act_detail . '">View</button></td>
                            </tr>';
            }
        }
        ?>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
        $('body').on('click', function (e) {
            $('[data-toggle="popover"]').each(function () {
                //the 'is' for buttons that trigger popups
                //the 'has' for icons within a button that triggers a popup
                if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                    $(this).popover('hide');
                }
            });
        });
    });
</script>
<?php
require_once './footer.php';
