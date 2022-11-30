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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

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
                    <div class="col-lg-12">
                        <div class="card">


                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <h2 align="center">List of all Student</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID #</th>
                                            <th>Full Name</th>
                                            <th>Sex</th>
                                            <th>Age</th>
                                            <th>Contact Addresses</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $sql=mysqli_query($con,"SELECT * from tblstudent");
                                            while ($row=mysqli_fetch_array($sql)) {
                                        ?>  <tr>
                                            <td><a class="stud-id" style="color:red;" href="editStudent.php?editStudentId=<?php echo $row['matricNo'];?>"><?php echo $row['matricNo'];?></a></td>
                                            <td><a class="view-stud" href="modal_stud_details.php" style="color:#70e000; font-weight: 600;"><?php echo $row['firstName'].' '.$row['lastName'];?></a></td>
                                            <td><?php echo $row['sex'];?></td>
                                            <td><?php echo $row['age'];?></td>
                                            <td><?php echo '0'.$row['mobile'].'<br>'.$row['email'];?></td>
                                            <td><a style="color:red;" href="studentInfo.php?info=<?php echo $row['matricNo'];?>&name=<?php echo $row['firstName'] .' '. $row['lastName'] ?>">
                                                <i class="fa fa-eye"></i><?php echo ' '.'View';?></td>
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
                        </div>
                    </div>
                    <!-- end of datatable -->


                    <!-- Modal -->
                            <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color: #70e000;">
                                    <h4 class="modal-title" id="exampleModalLabel" style="font-family:cursive; color: white;" align="center">Student Information</h4>
                                  </div>
                                  <div class="modal-body" style="background: #eff6e0;">
                                        <div class="viewStud">
                                            
                                        </div>
                                  </div>
                                  <div class="modal-footer" style="background: #eff6e0;">
                                    <button type="button" id="x" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>


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
    <script src="https://cdn.usebootstrap.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();

        }); 


        $('.view-stud').click(function(e){
                e.preventDefault();

                var stud_id = $(this).closest('tr').find('.stud-id').text();
                // console.log(stud_id);
                // alert('Hello');

                $.ajax({
                    type: "POST",
                    url: "modal_stud_details.php",
                    data: {
                        'checking_viewbtn': true,
                        'student_id': stud_id,
                    },
                    success: function (response) {
                        console.log(response);
                        $('.viewStud').html(response);
                        $('#viewModal').modal('show');
                    }   
                });
        });

        $('#x').click(function(e){
            $('#viewModal').modal('hide');
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