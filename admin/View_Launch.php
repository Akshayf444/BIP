<?php
session_start();

require_once("../includes/initialize.php");
require_once './header.php';

$SBH_Emp_Id = $_SESSION['SBH_Emp_Id'];
?>
<div class="col-xs-3">
    <a href = "View.php" class = "badge">GO Back</a>
</div>
<div class="col-xs-3">
    <a href="View_Launch.php?tmreport=true" class="badge">TM REPORT</a>
</div>
<div class="col-xs-3">
    <a href="View_Launch.php?bmreport=true" class="badge">BM REPORT</a>
</div>
</br>
<div class="col-lg-12">
    <h4>VIEW BIP DIFFERENTIAL LAUNCH DETAIL</h4>
    <table class="table table-bordered">
        <tr>
            <th>Sr. No.</th>
            <th>Zone</th>
            <th>Region</th>
            <th>Empid</th>
            <th>Name</th>
            <th>Dr. Name</th>
            <th>Launch Activity Details</th>
        </tr>
        <?php
        $SMList = man_power::SMList(array('WHERE SBH_Emp_Id = ' . $SBH_Emp_Id));
        if (!empty($SMList)) {
            foreach ($SMList as $value) {
                if ($value->SM_Emp_Id != '') {
                    if (isset($_GET['tmreport'])) {
                        $TMlist = man_power::TMList(array('WHERE SM_Emp_Id = ' . $value->SM_Emp_Id));

                        if (!empty($TMlist)) {
                            foreach ($TMlist as $value2) {
                                if ($value2->TM_Emp_Id != '') {
                                    $view = Launch::TMActivity($value2->TM_Emp_Id);
                                    $count = 1;
                                    if (!empty($view)) {
                                        foreach ($view as $Activity) {
                                            echo '<tr>'
                                            . '<td>' . $count++ . '</td>'
                                            . '<td>' . $value2->Zone . '</td>'
                                            . '<td>' . $value2->Region . '</td>'
                                            . '<td>' . $value2->TM_Emp_Id . '</td>'
                                            . '<td>' . $value2->TM_Name . '</td>'
                                            . '<td>' . $Activity->docname . '</td>'
                                            . '<td><button type="button" class="btn btn-link btn-primary" data-container="body" data-toggle="popover" data-content="' . $Activity->act_detail . '">View</button></td>
                            </tr>';
                                        }
                                    }
                                }
                            }
                        }
                    } elseif (isset($_GET['bmreport'])) {
                        $BMlist = man_power::BMList(array('WHERE SM_Emp_Id = ' . $value->SM_Emp_Id));
                        if (!empty($BMlist)) {
                            foreach ($BMlist as $value2) {
                                if ($value2->BM_Emp_Id != '') {
                                    $view = Launch::BMActivity($value2->BM_Emp_Id);
                                    $count = 1;
                                    if (!empty($view)) {
                                        foreach ($view as $Activity) {
                                            echo '<tr>'
                                            . '<td>' . $count++ . '</td>'
                                            . '<td>' . $value2->Zone . '</td>'
                                            . '<td>' . $value2->Region . '</td>'
                                            . '<td>' . $value2->BM_Emp_Id . '</td>'
                                            . '<td>' . $value2->BM_Name . '</td>'
                                            . '<td>' . $Activity->docname . '</td>'
                                            . '<td><button type="button" class="btn btn-link btn-primary" data-container="body" data-toggle="popover" data-content="' . $Activity->act_detail . '">View</button></td>
                            </tr>';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
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
<?php require_once './footer.php'; ?>

