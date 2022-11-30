<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');
    include('../includes/dataValues.php');



    if (isset($_POST['checking_viewbtn'])){

        $s_id = $_POST['student_id'];
        // echo $return = $s_id;

        $sql = "SELECT * FROM  tblstudent WHERE matricNo ='$s_id'";
        $run_qry = mysqli_query($con, $sql);

            if ($run_qry->num_rows>0){
                foreach ($run_qry as $row) {
                    echo $return = '
                        <div><h5>ID Number:<h4 align="center">'.$row['matricNo'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>Name:<h4 align="center">'.$row['firstName'].' '.$row['lastName'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>Grade Level:<h4 align="center">'.$row['levelId'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>ID Number:<h4 align="center">'.$row['matricNo'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>Sex:<h4 align="center">'.$row['sex'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>B-day:<h4 align="center">'.$row['bday'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>Age:<h4 align="center">'.$row['age'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>Nationality:<h4 align="center">'.$row['nationality'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>Religion:<h4 align="center">'.$row['religion'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>Contact:<h4 align="center">'.$row['mobile'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>Address:<h4 align="center">'.$row['address'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>Email:<h4 align="center">'.$row['email'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>Birthplace:<h4 align="center">'.$row['bplace'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>Status:<h4 align="center">'.$row['status'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">
                        <div><h5>Teacher:<h4 align="center">'.$row['teacher'].'</h4></h5></div><hr style="border: 1px dotted #38b000;">

                    ';
                }
            }else{
                echo $return = "<h5>No Record Found</h5>";
            }
    }


?>

