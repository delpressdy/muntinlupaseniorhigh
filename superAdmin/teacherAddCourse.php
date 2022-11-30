<?php

include('../includes/dbconnection.php');
include('../includes/session.php');

?>

<?php       
    
    if(isset($_POST['submit'])){

        $g = $_GET['g'];
        $s = $_GET['s'];
        $alertStyle ="";
        $statusMsg ="";

        $sub = $_POST['sub'];
        $unit = $_POST['unit'];
        $date = date('Y-m-d');

                for ($i=0; $i < sizeof($sub) ; $i++) { 
                    $query=mysqli_query($con, "insert into studentsub (subject,name,dateAdded,unit,grade,semester) value('$sub[$i]','$_SESSION[name]','$date','$unit[$i]','$g','$s')");  
                }
                if ($query) {

                  $alertStyle ="alert alert-success";
                  $statusMsg="Added Successfully!";

                }
                else
                {
                    $alertStyle ="alert alert-danger";
                    $statusMsg="An error Occurred!";
                }
        
          
        
    }else{
        $alertStyle = "";
        $statusMsg = "";
    }
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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>
    <!-- Left Panel -->
    <?php $page = "student";
    include 'includes/teacherLeftMenu.php'; ?>

    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include 'includes/teacherHeader.php'; ?>
        <!-- /header -->
        <!-- Header-->


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
                                <strong class="card-title">
                                    <a href="teacherAssignSub.php?name=<?php echo $_SESSION['name'];?>&g=<?php if($_GET['g']=='1'){ echo 'Grade 11'; }else{ echo 'Grade 12';}?>" class="btn btn-danger">Back</a>
                                    <h2 align="center">List of all Courses</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></div>
                                <form action="#" method="POST">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Course Code</th>
                                            <th>Unit</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $g = $_GET['g'];
                                            $s = $_GET['s'];
                                            $sql=mysqli_query($con,"SELECT * FROM tblcourse WHERE levelId = '$g' AND semesterId = $s ORDER BY courseTitle");
                                            while ($row=mysqli_fetch_array($sql)) {
                                        ?>  <tr>
                                            <td>
                                                <input type="checkbox" name="sub[]" value="<?php echo $row['courseTitle'];?>"> <?php echo $row['courseTitle'];?>
                                        </td>
                                            <td><?php echo $row['courseCode'];?></td>
                                            <td><input type="checkbox" name="unit[]" value="<?php echo $row['courseUnit'];?>"> <?php echo $row['courseUnit'];?></td>
                                            </tr>
                                        <?php 
                                        }?>

                                        <!-- FETCHING DATA IN THE TABLE INSIDE THE DB WITHOUT SPECIFIC COLUMN -->
                                        <!-- <?php 
                                            $result = $con->query("SELECT * FROM tblstudent");
                                            if($result->num_rows>0){
                                                while ($row = $result->fetch_object()) {
                                                    foreach ($row as $r){
                                                        echo '<td>'.$r.'</td>';
                                                    }
                                                }
                                            }
                                        ?> -->

                                    </tbody>
                                </table>
                                            </div>
                                                <button type="submit" name="submit" class="btn btn-success">Save</button>
                                            </div>
                            </div>
                            </form>
                        </div>
                    </div>     
                </div>
            </div>
        </div>

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