<?php

include('../includes/dbconnection.php');
include('../includes/session.php');


?>

<!doctype html>
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/title.php'; ?>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="../assets/img/student-grade.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style2.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <!-- Left Panel -->
    <?php $page = "student";
    include 'includes/leftMenu.php'; ?>

    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include 'includes/header.php'; ?>
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#"><?php echo $matricNo;; ?></a></li>
                                    <li><a href="#">Student</a></li>
                                    <li class="active">View</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">


                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <table 
                                    <?php    
                                        $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND gradelvl = 'Grade 11' AND semester = 1");
                                            if ($q->num_rows>0) {
                                                echo '';
                                            }else{
                                                echo 'hidden';
                                            }
                                    ?>

                                id="bootstrap-data-table1" class="table table-hover table-striped table-bordered">
                                    <thead>
                                <!-- REMOVE NUMBER IN TABLE ID ATTRIBUTE TO SHOW SEARCH AND SHOW LIST MORE THAN 20 or 15 -->
                                    <?php 
                                        $sql = mysqli_query($con,"SELECT * FROM tblstudent WHERE matricNo = $matricNo");
                                        while($row = mysqli_fetch_array($sql)){ 
                                            $grade = $row['levelId'];
                                    ?>
                                    <strong>ID #: </strong><i style="color:red;"><?php echo $row['matricNo']; ?></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <strong>Name: </strong><i style="color:red;"><?php echo $row['firstName'].' '.$row['lastName']; ?></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <strong>Status: </strong><i style="color:red;"><?php echo $row['status']; ?></i>
                                    <?php 
                                    }?>
                                    <hr>
                                    
                                    <br>
                                    <h2 align="center">
                                        <?php
                                            $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = 'Grade 11'");
                                            if ($q->num_rows>0) {
                                                while($row = mysqli_fetch_array($q)){
                                        ?>
                                        <b style="color:#00b4d8;">Grade 11 First Semester</b>
                                        <?php  
                                        }}else{
                                        ?>
                                        <b style="color:red;">No grades found for Grade 11 1st semester</b>
                                        
                                        <?php
                                        }
                                        ?>

                                    </h2>
                                        <br>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Units</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $sql = mysqli_query($con,"SELECT * FROM studentsub WHERE name = '$fullName'");
                                            $sql1 = mysqli_query($con,"SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = 'Grade 11'");

                                            $u = $row['unit'];

                                            if($sql->num_rows > 0){
                                                while($row = mysqli_fetch_array($sql) AND $row1 = mysqli_fetch_array($sql1)){
                                                    echo '<tr><td>'.$row['subject'].'</td>';
                                                    echo '<td>'.$row['unit'].'</td>';
                                                    echo '<td>'.$row1['score'].'</td>';
                                                }
                                            }else {
                                                
                                                    echo '';
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <th colspan="2">Average:
                                            <td>
                                                <?php 
                                                    $sql ="SELECT sum(score),count(score) FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = 'Grade 11'";
                                                    $res = $con->query($sql);

                                                    while($row = $res->fetch_assoc()){
                                                        if (!$row['sum(score)'] =='') {

                                                            $avg = $row['sum(score)'] / $row['count(score)'];

                                                            if($avg >= 75){
                                                                    echo '<b>'.round($avg,2).' ✔️';
                                                                }else{
                                                                    echo '<b>'.round($avg,2).' ✖️';
                                                                }
                                                            }
                                                }
                                                ?>
                                             </td>
                                        </th>
                                    </tfoot>
                                </table>



                                <!-- TABLE FOR 2nd SEMESTER -->
                                <table 
                                    <?php    
                                        $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = 'Grade 11'");
                                            if ($q->num_rows>0) {
                                                echo '';
                                            }else{
                                                echo 'hidden';
                                            }
                                    ?>
                                id="bootstrap-data-table2" class="table table-hover table-striped table-bordered">
                                <!-- REMOVE NUMBER IN TABLE ID ATTRIBUTE TO SHOW SEARCH AND SHOW LIST MORE THAN 20 or 15 -->
                                    <thead>
                                    <hr>
                                    <br>
                                    <h2 align="center">
                                        <?php
                                            $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = '$grade'");
                                            if ($q->num_rows>0) {
                                                while($row = mysqli_fetch_array($q)){
                                        ?>
                                        <b style="color:#00b4d8;">Grade 11 2nd Semester</b>
                                        <?php  
                                        }}else{
                                        ?>
                                        <b style="color:red;">No grades found for Grade 11 2nd semester</b>
                                        
                                        <?php
                                        }
                                        ?>
                                    </h2>
                                        <br>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Units</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $sql = mysqli_query($con,"SELECT * FROM studentsub WHERE name = '$fullName'");
                                            $sql1 = mysqli_query($con,"SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = 'Grade 11'");

                                            $u = $row['unit'];

                                            if($sql->num_rows > 0){
                                                while($row = mysqli_fetch_array($sql) AND $row1 = mysqli_fetch_array($sql1)){
                                                    echo '<tr><td>'.$row['subject'].'</td>';
                                                    echo '<td>'.$row['unit'].'</td>';
                                                    echo '<td>'.$row1['score'].'</td>';
                                                }
                                            }else {
                                                
                                                    echo '';
                                            }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <th colspan="2">Average:
                                            <td>
                                                <?php 
                                                    $sql ="SELECT sum(score),count(score) FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = 'Grade 11'";
                                                    $res = $con->query($sql);

                                                    while($row = $res->fetch_assoc()){
                                                        if (!$row['sum(score)'] =='') {

                                                            $avg = $row['sum(score)'] / $row['count(score)'];

                                                            if($avg >= 75){
                                                                    echo '<b>'.round($avg,2).' ✔️';
                                                                }else{
                                                                    echo '<b>'.round($avg,2).' ✖️';
                                                                }
                                                            }
                                                }
                                                ?>
                                             </td>
                                        </th>
                                    </tfoot>
                                </table>











                                <!-- GRADE 12 TABLE -->
                                <br><br>
                                <table 
                                    <?php    
                                        $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND gradelvl = 'Grade 12' AND semester = 1");
                                            if ($q->num_rows>0) {
                                                echo '';
                                            }else{
                                                echo 'hidden';
                                            }
                                    ?>

                                id="bootstrap-data-table1" class="table table-hover table-striped table-bordered">
                                    <thead>
                                <!-- REMOVE NUMBER IN TABLE ID ATTRIBUTE TO SHOW SEARCH AND SHOW LIST MORE THAN 20 or 15 -->
                                        <hr style="border:2px solid green;">
                                    
                                    <br>
                                    <h2 align="center">
                                        <?php
                                            $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = 'Grade 12'");
                                            if ($q->num_rows>0) {
                                                while($row = mysqli_fetch_array($q)){
                                        ?>
                                        <b style="color:#00b4d8;">Grade 12 First Semester</b>
                                        <?php  
                                        }}else{
                                        ?>
                                        <b style="color:red;">No grades found for Grade 12 1st semester</b>
                                        
                                        <?php
                                        }
                                        ?>

                                    </h2>
                                        <br>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Units</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $sql = mysqli_query($con,"SELECT * FROM studentsub WHERE name = '$fullName'");
                                            $sql1 = mysqli_query($con,"SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = 'Grade 12'");

                                            $u = $row['unit'];

                                            if($sql->num_rows > 0){
                                                while($row = mysqli_fetch_array($sql) AND $row1 = mysqli_fetch_array($sql1)){
                                                    echo '<tr><td>'.$row['subject'].'</td>';
                                                    echo '<td>'.$row['unit'].'</td>';
                                                    echo '<td>'.$row1['score'].'</td>';
                                                }
                                            }else {
                                                
                                                    echo '';
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <th colspan="2">Average:
                                            <td>
                                                <?php 
                                                    $sql ="SELECT sum(score),count(score) FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = 'Grade 12'";
                                                    $res = $con->query($sql);

                                                    while($row = $res->fetch_assoc()){
                                                        if (!$row['sum(score)'] =='') {

                                                            $avg = $row['sum(score)'] / $row['count(score)'];

                                                            if($avg >= 75){
                                                                    echo '<b>'.round($avg,2).' ✔️';
                                                                }else{
                                                                    echo '<b>'.round($avg,2).' ✖️';
                                                                }
                                                            }
                                                }
                                                ?>
                                             </td>
                                        </th>
                                    </tfoot>
                                </table>



                                <!-- TABLE FOR 2nd SEMESTER -->
                                <table 
                                    <?php    
                                        $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = 'Grade 12'");
                                            if ($q->num_rows>0) {
                                                echo '';
                                            }else{
                                                echo 'hidden';
                                            }
                                    ?>
                                id="bootstrap-data-table2" class="table table-hover table-striped table-bordered">
                                <!-- REMOVE NUMBER IN TABLE ID ATTRIBUTE TO SHOW SEARCH AND SHOW LIST MORE THAN 20 or 15 -->
                                    <thead>
                                    <hr>
                                    <br>
                                    <h2 align="center">
                                        <?php
                                            $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = 'Grade 12'");
                                            if ($q->num_rows>0) {
                                                while($row = mysqli_fetch_array($q)){
                                        ?>
                                        <b style="color:#00b4d8;">Grade 12 2nd Semester</b>
                                        <?php  
                                        }}else{
                                        ?>
                                        <b style="color:red;">No grades found for Grade 12 2nd semester</b>
                                        
                                        <?php
                                        }
                                        ?>
                                    </h2>
                                        <br>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Units</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $sql = mysqli_query($con,"SELECT * FROM studentsub WHERE name = '$fullName'");
                                            $sql1 = mysqli_query($con,"SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = 'Grade 12'");

                                            $u = $row['unit'];

                                            if($sql->num_rows > 0){
                                                while($row = mysqli_fetch_array($sql) AND $row1 = mysqli_fetch_array($sql1)){
                                                    echo '<tr><td>'.$row['subject'].'</td>';
                                                    echo '<td>'.$row['unit'].'</td>';
                                                    echo '<td>'.$row1['score'].'</td>';
                                                }
                                            }else {
                                                
                                                    echo '';
                                            }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <th colspan="2">Average:
                                            <td>
                                                <?php 
                                                    $sql ="SELECT sum(score),count(score) FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = 'Grade 12'";
                                                    $res = $con->query($sql);

                                                    while($row = $res->fetch_assoc()){
                                                        if (!$row['sum(score)'] =='') {

                                                            $avg = $row['sum(score)'] / $row['count(score)'];

                                                            if($avg >= 75){
                                                                    echo '<b>'.round($avg,2).' ✔️';
                                                                }else{
                                                                    echo '<b>'.round($avg,2).' ✖️';
                                                                }
                                                            }
                                                }
                                                ?>
                                             </td>
                                        </th>
                                    </tfoot>
                                </table>



















                            </div>
                        </div>
                    </div>
                    <!-- end of datatable -->

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>

    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();

        });

        // Menu Trigger
        $('#menuToggle').on('click', function(event) {
            var windowWidth = $(window).width();
            if (windowWidth < 1010) {
                $('body').removeClass('open');
                if (windowWidth < 760) {
                    $('#left-panel').slideToggle();
                } else {
                    $('#left-panel').toggleClass('open-menu');
                }
            } else {
                $('body').toggleClass('open');
                $('#left-panel').removeClass('open-menu');
            }

        });
    </script>

</body>

</html>