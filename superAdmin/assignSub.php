<?php

include('../includes/dbconnection.php');
include('../includes/session.php');

$matricNo = $_GET['info'];
$fullName = $_GET['name'];
$grade = $_GET['glvl'];
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
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Pupils</a></li>
                                    <li class="active">View Pupils</li>
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
                    <!--/.col-->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <a href="addCourse.php?info=<?php echo $_SESSION['info'];?>&name=<?php echo $_SESSION['name'];?>&glvl=<?php echo $_GET['glvl'];?>&s=1" class="btn btn-info">Add 1st Semester</a>
                                    <a href="addCourse.php?info=<?php echo $_SESSION['info'];?>&name=<?php echo $_SESSION['name'];?>&glvl=<?php echo $_GET['glvl'];?>&s=2" class="btn btn-info">Add 2nd Semester</a>
                                </strong>
                            </div><br>  
                            <div align="center"><h2><b style="color:#00b4d8;">Grade 11</b></h2></div>
                            <div class="card-body">
                                <table>
                                    <thead>
                                <!-- REMOVE NUMBER IN TABLE ID ATTRIBUTE TO SHOW SEARCH AND SHOW LIST MORE THAN 20 or 15 -->
                                    <?php 
                                        $sql = mysqli_query($con,"SELECT * FROM tblstudent WHERE matricNo = $matricNo");
                                        $sql2 = mysqli_query($con,"SELECT * FROM enrolled WHERE studid = $matricNo");
                                        while($row = mysqli_fetch_array($sql) AND $row2 = mysqli_fetch_array($sql2)){ 
                                            $grade = $row['levelId'];
                                    ?>
                                    <strong>ID #: </strong><i style="color:red;"><?php echo $row['matricNo']; ?></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <strong>Name: </strong><i style="color:red;"><?php echo $row['firstName'].' '.$row['lastName']; ?></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <strong>Status: </strong><i style="color:red;"><?php echo $row2['status']; ?></i>
                                    <?php 
                                    }?>

                                    
                                    <?php
                                         $sql2 = "SELECT * FROM studentsub WHERE name = '$_SESSION[name]' AND grade = '$_GET[glvl]'";
                                         $res2 = $con->query($sql2);
                                    ?>
                                    <br><br>
                                    <table id="bootstrap-data-table" class="table" <?php echo ($res2->num_rows>0)? '':'hidden'?> >
                                        <thead align="center" style="background-color:#242423; color: white;">
                                            <th>Subject</th>
                                            <th>Unit</th>
                                            <th>Teacher</th>
                                            <th>Semester</th>
                                        </thead>
                                        <tbody style="background-color: rgb( 0, 0, 0, 0.1); color: black;">

                                    <?php
                                                $sql = "SELECT * FROM studentsub WHERE name = '$_SESSION[name]' AND grade = '$_GET[glvl]'";
                                                $res = $con->query($sql);

                                                while ($row = $res->fetch_assoc()) {
                                    ?>           
                                            <tr>      
                                            <td><?php echo $row['subject']; ?></td>
                                            <td align="center"><?php echo $row['unit']; ?></td>
                                            <td align="center"><?php echo $row['teacher']; ?></td>
                                            
                                            <td align="center">
                                                <?php 
                                                    if ($row['semester'] == 1) {
                                                    $nSem = '1<sup>st</sup> Semester';
                                                    }else{
                                                        $nSem = '2<sup>nd</sup> Semester';
                                                    }
                                                    echo $nSem; 
                                                ?>
                                            </td>
                                            </tr>
                                    <?php } ?>

                                        </tbody>
                                    </table>
                                </table>

                                    <!-- TABLE FOR PRELIM -->
                                    
                                    <br><br>
                                    <div align="center">
                                    <button id="1semg11" class="btn btn-success" onmouseover="this.style='background: #fff; color:black;';" onmouseout="this.style='background: #25a244; color:fff;';">1st Semester</button> 
                                    <button id="2semg11" class="btn btn-success" onmouseover="this.style='background: #fff; color:black;';" onmouseout="this.style='background: #25a244; color:fff;';"> 
                                    2nd Semester</button>
                                    </div><br><br>
                                    <div class="g111sem">
                                    <table style="background-color:#98f5e1; color: black;"
                                    <?php    
                                        $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND gradelvl = '$grade' AND semester = 1 AND quarter = 1");
                                            if ($q->num_rows>0) {
                                                echo '';
                                            }else{
                                                echo 'hidden';
                                            }
                                    ?> id="bootstrap-data-table2" class="table">        
                                    <h3 align="left">
                                        <?php
                                            $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = '$grade' AND quarter = 1");
                                            if ($q->num_rows>0) {
                                        ?>
                                        <b style="color:#242423;">Preliminary:</b>
                                        <?php  
                                        }else{
                                        ?>
                                        <b style="color:red;">No preliminary grades!</b>
                                        
                                        <?php
                                        }
                                        ?>

                                    </h3>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Units</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $sql = mysqli_query($con,"SELECT * FROM studentsub WHERE name = '$_SESSION[name]'");
                                            $sql1 = mysqli_query($con,"SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = '$grade' AND quarter = 1");

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
                                                    $sql ="SELECT sum(score),count(score) FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = '$grade' AND quarter = 1";
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

                                <!-- TABLE FOR MIDTERM -->
                                <table style="background-color:#98f5e1; color: black;"
                                    <?php    
                                        $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = '$grade' AND quarter = 2");
                                            if ($q->num_rows>0) {
                                                echo '';
                                            }else{
                                                echo 'hidden';
                                            }
                                    ?>
                                id="bootstrap-data-table2" class="table">
                                <!-- REMOVE NUMBER IN TABLE ID ATTRIBUTE TO SHOW SEARCH AND SHOW LIST MORE THAN 20 or 15 -->
                                    <thead>
                                    <br>
                                    <h3 align="left">
                                        <?php
                                            $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = '$grade' AND quarter = 2");
                                            if ($q->num_rows>0) {
                                        ?>
                                        <b style="color:#242423;">Midterm:</b>
                                        <?php  
                                        }else{
                                        ?>
                                        <b style="color:red;">No midterm grade!</b>
                                        
                                        <?php
                                        }
                                        ?>
                                    </h3>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Units</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $sql = mysqli_query($con,"SELECT * FROM studentsub WHERE name = '$_SESSION[name]'");
                                            $sql1 = mysqli_query($con,"SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = '$grade' AND quarter = 2");

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
                                                    $sql ="SELECT sum(score),count(score) FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = '$grade' AND quarter = 2";
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

                                <!-- TABLE FOR FINAL -->
                                <table
                                    <?php    
                                        $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = '$grade' AND quarter = 3");
                                            if ($q->num_rows>0) {
                                                echo '';
                                            }else{
                                                echo 'hidden';
                                            }
                                    ?>
                                id="bootstrap-data-table2" class="table">
                                <!-- REMOVE NUMBER IN TABLE ID ATTRIBUTE TO SHOW SEARCH AND SHOW LIST MORE THAN 20 or 15 -->
                                    <thead  style="background-color:#e5383b; color: white;">
                                    <br>
                                    <h3 align="left">
                                        <?php
                                            $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = '$grade' AND quarter = 3");
                                            if ($q->num_rows>0) {
                                        ?>
                                        <b style="color:#e5383b;">Final:</b>
                                        <?php  
                                        }else{
                                        ?>
                                        <b style="color:red;">No grades in final quarter!</b>
                                        
                                        <?php
                                        }
                                        ?>
                                    </h3>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Units</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody style="background-color:#ffa69e; color: black;">

                                        <?php 
                                            $sql = mysqli_query($con,"SELECT * FROM studentsub WHERE name = '$_SESSION[name]'");
                                            $sql1 = mysqli_query($con,"SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = '$grade' AND quarter = 3");

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
                                    <tfoot style="background-color:#ffa69e; color: black;">
                                        <th colspan="2">Average:
                                            <td>
                                                <?php 
                                                    $sql ="SELECT sum(score),count(score) FROM studentres WHERE idnumber = $matricNo AND semester = 1 AND gradelvl = '$grade' AND quarter = 3";
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

                            <!-- TABLE FOR 2nd SEMESTER -->
                            <div class="g112sem">
                                    <table style="background-color:#98f5e1; color: black;"
                                    <?php    
                                        $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND gradelvl = '$grade' AND semester = 2 AND quarter = 1");
                                            if ($q->num_rows>0) {
                                                echo '';
                                            }else{
                                                echo 'hidden';
                                            }
                                    ?> id="bootstrap-data-table2" class="table">        
                                    <h3 align="left">
                                        <?php
                                            $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = '$grade' AND quarter = 1");
                                            if ($q->num_rows>0) {
                                        ?>
                                        <b style="color:#242423;">Preliminary:</b>
                                        <?php  
                                        }else{
                                        ?>
                                        <b style="color:red;">No preliminary grades!</b>
                                        
                                        <?php
                                        }
                                        ?>

                                    </h3>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Units</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $sql = mysqli_query($con,"SELECT * FROM studentsub WHERE name = '$_SESSION[name]'");
                                            $sql1 = mysqli_query($con,"SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = '$grade' AND quarter = 1");

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
                                                    $sql ="SELECT sum(score),count(score) FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = '$grade' AND quarter = 1";
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

                                <!-- TABLE FOR MIDTERM -->
                                <table style="background-color:#98f5e1; color: black;"
                                    <?php    
                                        $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = '$grade' AND quarter = 2");
                                            if ($q->num_rows>0) {
                                                echo '';
                                            }else{
                                                echo 'hidden';
                                            }
                                    ?>
                                id="bootstrap-data-table2" class="table">
                                <!-- REMOVE NUMBER IN TABLE ID ATTRIBUTE TO SHOW SEARCH AND SHOW LIST MORE THAN 20 or 15 -->
                                    <thead>
                                    <br>
                                    <h3 align="left">
                                        <?php
                                            $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = '$grade' AND quarter = 2");
                                            if ($q->num_rows>0) {
                                        ?>
                                        <b style="color:#242423;">Midterm:</b>
                                        <?php  
                                        }else{
                                        ?>
                                        <b style="color:red;">No midterm grades!</b>
                                        
                                        <?php
                                        }
                                        ?>
                                    </h3>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Units</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $sql = mysqli_query($con,"SELECT * FROM studentsub WHERE name = '$_SESSION[name]'");
                                            $sql1 = mysqli_query($con,"SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = '$grade' AND quarter = 2");

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
                                                    $sql ="SELECT sum(score),count(score) FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = '$grade' AND quarter = 2";
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

                                <!-- TABLE FOR FINAL -->
                                <table
                                    <?php    
                                        $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = '$grade' AND quarter = 3");
                                            if ($q->num_rows>0) {
                                                echo '';
                                            }else{
                                                echo 'hidden';
                                            }
                                    ?>
                                id="bootstrap-data-table2" class="table">
                                <!-- REMOVE NUMBER IN TABLE ID ATTRIBUTE TO SHOW SEARCH AND SHOW LIST MORE THAN 20 or 15 -->
                                    <thead  style="background-color:#e5383b; color: white;">
                                    <br>
                                    <h3 align="left">
                                        <?php
                                            $q = mysqli_query($con, "SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = '$grade' AND quarter = 3");
                                            if ($q->num_rows>0) {
                                        ?>
                                        <b style="color:#e5383b;">Final:</b>
                                        <?php  
                                        }else{
                                        ?>
                                        <b style="color:red;">No grades in final quarter!</b>
                                        
                                        <?php
                                        }
                                        ?>
                                    </h3>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Units</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody style="background-color:#ffa69e; color: black;">

                                        <?php 
                                            $sql = mysqli_query($con,"SELECT * FROM studentsub WHERE name = '$_SESSION[name]'");
                                            $sql1 = mysqli_query($con,"SELECT * FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = '$grade' AND quarter = 3");

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
                                    <tfoot style="background-color:#ffa69e; color: black;">
                                        <th colspan="2">Average:
                                            <td>
                                                <?php 
                                                    $sql ="SELECT sum(score),count(score) FROM studentres WHERE idnumber = $matricNo AND semester = 2 AND gradelvl = '$grade' AND quarter = 3";
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
                    </div>
                    <!-- end of datatable -->

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>

        <?php include 'includes/footer.php'; ?>


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
            $('.g112sem').hide();
            $('.g111sem').hide();
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

        $('#1semg11').on('click', function(e){
            $('.g111sem').fadeIn();
            $('.g112sem').hide();
            $('#1semg11').style.backgroundColor = "#fff";
        });

        $('#2semg11').on('click', function(e){
            $('.g112sem').fadeIn();
            $('.g111sem').hide();
        });
    </script>

</body>

</html>