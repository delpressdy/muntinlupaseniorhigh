
<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');

    $alertStyle2 ="";
    $statusMsg2="";

    if(isset($_POST['save'])){
        $updated = $_POST['updateStat'];
        $studName = $_GET['n'];
            
            $query2=mysqli_query($con,"UPDATE message SET status = '$updated' WHERE name = '$studName'");
                if ($query2) {
                      $alertStyle2 ="alert alert-success";
                      $statusMsg2="Updated Successfully!";
                }
    }
?>