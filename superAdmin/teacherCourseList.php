
<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');
    include('../includes/functions.php');

    if(isset($_GET['matricNo']) && isset($_GET['levelId']) && isset($_GET['departmentId']) && isset($_GET['facultyId']) && isset($_GET['sessionId']) && isset($_GET['semesterId'])){

        $matricNo = $_GET['matricNo'];
        $levelId = $_GET['levelId'];
        $departmentId = $_GET['departmentId'];
        $facultyId = $_GET['facultyId'];
        $sessionId = $_GET['sessionId'];
        $semesterId = $_GET['semesterId'];
        $qrt = $_GET['qrtr'];

        if ($qrt == 1) {
            $quart = 'Prelim';
        }elseif($qrt == 2){
            $quart = 'Midterm';
        }else{
            $quart = 'Final';
        }
        
        $stdQuery=mysqli_query($con,"select * from tblstudent where matricNo = '$matricNo'");                        
        $rowStd = mysqli_fetch_array($stdQuery);
        $name = $rowStd['firstName'] .' '.$rowStd['lastName'];

        $semesterQuery=mysqli_query($con,"select * from tblsemester where Id = '$semesterId'");                        
        $rowSemester = mysqli_fetch_array($semesterQuery);

        $sessionQuery=mysqli_query($con,"select * from tblsession where Id = '$sessionId'");                        
        $rowSession = mysqli_fetch_array($sessionQuery);

        $levelQuery=mysqli_query($con,"select * from tbllevel where levelName = '$levelId'");                        
        $rowLevel = mysqli_fetch_array($levelQuery);

    
    }
    else{
        echo "<script type = \"text/javascript\">
        window.location = (\"studentList.php\");
        </script>";
    }



//------------------------------------ COMPUTE RESULT -----------------------------------------------

if (isset($_POST['compute'])){

    $score=$_POST['score'];
    $N = count($score);

    $subject = $_POST['subject'];
    $unit = $_POST['unit'];
    $dateAdded = date("Y-m-d");

    $totalCourseUnit = 0;
    $totalScoreGradePoint = 0;
    $gpa = "";

    for($i = 0; $i < $N; $i++)
    {

    
            //Checks if result has been computed (MatricNo, level, semester and session)
            $que=mysqli_query($con,"select * from tblfinalresult where matricNo ='$matricNo' and levelId = '$levelId' and semesterId = '$semesterId' and sessionId = '$sessionId' and quarter = $qrt");
            $ret=mysqli_fetch_array($que); 

            if($ret == 0){  //if no record exists, insert a record

                $query=mysqli_query($con,"insert into studentres(idnumber,gradelvl,semester,quarter,sy,subject,unit,score,dateAdded) 
                value('$matricNo','$levelId','$semesterId','$qrt','$sessionId','$subject[$i]','$unit[$i]','$score[$i]','$dateAdded')");

                if ($query) {

                    $alertStyle ="alert alert-success";
                    $statusMsg="Result Successfully Added!";
                    
                }
                else
                {
                    $alertStyle ="alert alert-danger";
                    $statusMsg="An error Occurred!";
                }

            }//end of check 

       
            //echo 'Score = '.$score[$i].' Letter Grade = '.$letterGrade.' Grade point = '.$gradePoint.' totalGradePoint = '.$scoreGradePoint.'<br>';

    }//end of loop


           //Checks if result has been computed (MatricNo, level, semester and session)
            $que=mysqli_query($con,"select * from tblfinalresult where matricNo ='$matricNo' and levelId = '$levelId' and semesterId = '$semesterId' and sessionId = '$sessionId' and quarter = '$qrt'");
            $ret=mysqli_fetch_array($que);

            if($ret > 0){

                $alertStyle ="alert alert-danger";
                $statusMsg="Results have already been submitted";
            }
            else{

                $querys = mysqli_query($con,"insert into tblfinalresult(matricNo,levelId,semesterId,sessionId,quarter,dateAdded) 
                value('$matricNo','$levelId','$semesterId','$sessionId','$qrt','$dateAdded')");
            }

    
}//end of POST


?>



<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/title.php';?>
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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<script>

//Only allows Numbers
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

//Check if the value entered is greater than 100 and not less than 0
function myFunction() {
  var x, text;
  // Get the value of the input field with id="numb"
  x = document.getElementById("score").value;
  // If x is Not a Number or less than one or greater than 10
  if (isNaN(x) || x < 1 || x > 100) {
    // text = "Value cannot be greater than 100 or less than 0";
    alert("Invalid");
  } 
  else{
    text = "";
  }
 document.getElementById("demo").innerHTML = text;
}
</script>
</head>
<body>
    <!-- Left Panel -->
     
         <?php include 'includes/teacherLeftMenu.php';?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
                    <?php include 'includes/teacherHeader.php';?>
        <!-- Header-->


        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                          
                        </div> <!-- .card -->
                    </div><!--/.col-->
               
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h4 align="center"><?php echo  $rowStd['firstName'].' '.$rowStd['lastName']?>'s&nbsp;<?php echo $rowSemester['semesterName'];?>&nbsp;<?php echo '<strong style="color:red;">['.$quart.']</strong>';?> - Result</h></strong>
                            </div>
                            <form method="post">
                            <div class="card-body">
                                <p id="demo"></p>
                             <div class="<?php if(isset($alertStyle)){echo $alertStyle;}?>" role="alert"><?php if(isset($statusMsg)){echo $statusMsg;}?></div>
                                <table class="table table-hover table-striped table-bordered">
                                       <thead>
                                        <tr>
                                            <th>Course</th>
                                            <th>Unit</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                    <?php 
                                        $sql3 = mysqli_query($con, "SELECT * FROM studentsub WHERE name = '$_GET[ho]' AND semester = $semesterId AND grade = '$levelId'");
                                        while($row3 = mysqli_fetch_array($sql3)){
                                    ?>
                                                
                                    <tr>
                                    <td><?php echo $row3['subject']; ?></td>
                                    <td><?php echo $row3['unit']; ?></td>
                                    <td><input value=""  name="score[]" id="score" type="text" class="form-control" maxlength="3" onkeypress="return isNumber(event)" ></td>
                                    <input id="" value="<?php echo $row3['subject'];?>" name="subject[]" type="hidden" class="form-control" >
                                    <input id="" value="<?php echo $row3['unit'];?>" name="unit[]"  type="hidden" class="form-control" >
                                    <input id="" name="" value="<?php echo $row3['id'];?>" type="hidden" class="form-control" >
                                    </tr>

                                    <?php } ?>
                                                                                
                                    </tbody>
                                </table>
                            <button type="submit" onclick="myFunction()" name="compute" class="btn btn-success">Save Result</button>
                             </form>
                            </div>
                        </div>
                    </div>
                    

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

        <?php include 'includes/footer.php';?>


</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>

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
      } );

      // Menu Trigger
      $('#menuToggle').on('click', function(event) {
            var windowWidth = $(window).width();   		 
            if (windowWidth<1010) { 
                $('body').removeClass('open'); 
                if (windowWidth<760){ 
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
