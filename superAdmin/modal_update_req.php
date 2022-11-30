<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');
    include('../includes/dataValues.php');



    if (isset($_POST['checking_viewbtn'])){

        $name = $_POST['name'];
        $stats = $_POST['stats'];
        $form = $_POST['form'];

        $sql = "SELECT * FROM message WHERE name ='$name' AND status = '$stats' AND form = '$form' ";
        $run_qry = mysqli_query($con, $sql);

            if ($run_qry->num_rows>0){

                foreach ($run_qry as $row) {
                    echo $return = '
                        <div>
                            <h5>
                            '.$name.'
                                <h4 align="center">
                                    <input style="border:none; margin-left:-10px; background:none;" type="text" name="form" value="'.$row['form'].'" readonly>
                                    <select name="updateStat" style="border: none; background:none;" >
                                        <option value="">-- Select --</option>
                                        <option value="Pending"'.(($stats == "Pending")? "selected":"").'>Pending</option>
                                        <option value="Approved"'.(($stats == "Approved")? "selected":"").'>Approved</option>
                                        <option value="Processing"'.(($stats == "Processing")? "selected":"").'>Processing</option>
                                        <option value="Rejected"'.(($stats == "Rejected")? "selected":"").'>Reject</option>
                                    </select>
                                    <select hidden name="std" style="border: none;">
                                        <option value="'.$name.'"></option>
                                    </select>

                                    <input class="form-control cc-exp" style="border:none; margin-left:-10px; background:none;" type="text" name="message" placeholder="Your message here..." value="'.$row['mess'].'">
                                </h4>
                            </h5>
                        </div>
                        <hr style="border: 1px dotted #38b000;">

                    ';
                }
            }else{
                echo $return = "<h5>No Record Found</h5>";
            }
    }


?>

