
<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');
error_reporting(0);

if(isset($_GET['status']) && $_GET['status'] == "success"){

      $alertStyle ="alert alert-success";
      $statusMsg="Session Set and Updated Successfully!";
}


if(isset($_POST['submit'])){

    // File upload path
    $targetDir = "announcement/";
    $img = basename($_FILES["img"]["name"]);
    $targetFilePath = $targetDir . $img;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


    $alertStyle ="";
    $statusMsg="";

    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $when=$_POST['when'];
    $dateAnn=$_POST['dateAnn'];

    $query=mysqli_query($con,"select * from announcement where title ='$title'");
    $ret=mysqli_fetch_array($query);
 
    if($ret > 0){
      $alertStyle ="alert alert-danger";
      $statusMsg="This announcement is already exist!";
    }
    else{
        if(move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
            $insert=mysqli_query($con,"insert into announcement(img,title,details,dateWhen,dateAdded) value('$img','$title','$desc','$when','$dateAnn')");

                if($insert){
                    $alertStyle ="alert alert-success";
                    $statusMsg="Added Successfully!";
                }else{
                    $statusMsg = "Failed, please try again.";
                } 

            }else{
                $statusMsg = "Sorry, there was an error uploading your Image.";
            }
    }
  //   $query=mysqli_query($con,"select * from announcement where title ='$title'");
  //   $ret=mysqli_fetch_array($query);

  //   if($ret > 0){
  //     $alertStyle ="alert alert-danger";
  //     $statusMsg="This announcement is already exist!";
  //   }
  //   else{

  //   $query=mysqli_query($con,"insert into announcement(img,title,details,dateWhen,dateAdded) value('$img','$title','$desc','$when','$dateAnn')");


  //   if ($query) {
  //         $alertStyle ="alert alert-success";
  //         $statusMsg="Added Successfully!";
  //   }
  //   else
  //   {
  //         $alertStyle ="alert alert-danger";
  //         $statusMsg="An error Occurred!";
  //   }
  // }
}
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


</head>
<body>
    <!-- Left Panel -->
    <?php $page="session"; include 'includes/leftMenu.php';?>

   <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
            <?php include 'includes/header.php';?>
        <!-- /header -->
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h2 align="center">Add Details</h2></strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></div>

                                        <form method="Post" action="" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Title</label>
                                                        <input id="" name="title" type="text" class="form-control cc-exp" value="" placeholder="Announcement title" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Description</label>
                                                        <textarea  name="desc" class="form-control cc-exp" placeholder="Title" required></textarea>
                                                    </div> 
                                                    <div class="form-group">
                                                        <br>
                                                        <label for="cc-exp" class="control-label mb-1">Upload Image:</label>
                                                        <input id="img" name="img" type="file" >
                                                    </div> 
                                                </div>
                                                <div class="col-6">
                                                    
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-labelbel mb-1">Date Announced</label>
                                                        <input id="" name="dateAnn" type="text" class="form-control cc-exp" value="<?php echo date('M-d-Y'); ?>" readonly required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">When</label>
                                                        <input id="" name="when" type="date" class="form-control cc-exp" placeholder="When" required>
                                                    </div>  
                                                </div>
                                                
                                            </div>
                                                    <div>

                                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->
               

                <br><br>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h2 align="center">ANNOUNCEMENTS</h2></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>When</th>
                                            <th>Date Announced</th>
                                            <th>Delete</th>                                           
                                            </tr>
                                    </thead>
                                    <tbody>
                                      
                            <?php
        $ret=mysqli_query($con,"SELECT * from announcement");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
                            ?>
                <tr>
                <td><?php echo $cnt;?></td>
                <td>
                    <?php  
                        $pic = 'announcement/'.$row['img'];
                    ?>
                    <img src="<?php echo $pic; ?>" width="100" height="100">
                </td>
                <td><?php  echo $row['title'];?></td>
                <td><?php  echo $row['details'];?></td>
                <td><?php  echo $row['dateWhen'];?></td>
                <td><?php  echo $row['dateAdded'];?></td>

                <td><a href="editSession.php?editid=<?php echo $row['Id'];?>" title="Edit Session Details"><i class="fa fa-edit fa-1x"></i></a></td>

                <td><a onclick="return confirm('Are you sure you want to delete?')" href="deleteWarning.php?delid=<?php echo $row['id'];?>" title="Delete Session"><i class="fa fa-trash fa-1x"></i></a></td>
                </tr>
                <?php 
                $cnt=$cnt+1;
                }?>
                                                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!-- end of datatable -->

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

        <script>
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


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );

      
  </script>

</body>
</html>
