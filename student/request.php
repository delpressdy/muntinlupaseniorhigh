
<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');

    $alertStyle2 ="";
    $statusMsg2="";

    if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $form=$_POST['form'];
    $purpose=$_POST['purp'];
    $mess=$_POST['mess'];
    $dateReq = $_POST['when'];

    $query=mysqli_query($con,"select * from message where form ='$form'");
    $ret=mysqli_fetch_array($query);
    if($ret > 0){

      $alertStyle ="alert alert-danger";
      $statusMsg="You already request this form!";

    }
    else{

  $query=mysqli_query($con,"insert into message(name,form,message,purpose,status,dateRequest) value('$name','$form','$mess','$purpose','Pending','$dateReq')");

    if ($query) {

      $alertStyle ="alert alert-success";
      $statusMsg="Submit Successfully! Wait for the response.";
  }
  else
    {
      $alertStyle ="alert alert-danger";
      $statusMsg="An error Occurred!";
    }
  }
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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->
    <?php $page="courses"; include 'includes/leftMenu.php';?>

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
                          
                           
                        </div> <!-- .card -->
                    </div><!--/.col-->
               
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="<?php echo $alertStyle2;?>" role="alert"><?php echo $statusMsg2;?></div>
                                    <form method="Post" action="">
                                            <div class="row">

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Form</label>
                                                            <select name="form" class="form-control cc-exp" required>
                                                                <option value="">-- Select --</option>
                                                                <option value="Form-137A">Form-137A</option>
                                                                <option value="Form-138">Form-138</option>
                                                                <option value="Enrollment Records">Enrollment records</option>
                                                                <option value="Scholarship Records">Scholarship records</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-labelbel mb-1">Purpose</label>
                                                        <select name="purp" class="form-control cc-exp">
                                                            <option value="">-- Select --</option>
                                                            <option value="Documentation">Documentation</option>
                                                            <option value="Employment">Employment</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-labelbel mb-1">Request Date</label>
                                                        <input type="date" name="when" class="form-control cc-exp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Message</label>
                                                        <textarea  name="mess" class="form-control cc-exp" placeholder="Your message here..." required></textarea>
                                                    </div>
                                                    <input type="hidden" name="name" class="form-control cc-exp" value="<?php echo $fullName; ?>">
                                                </div>
                                                
                                            </div>
                                                    <div>

                                                <button type="submit" name="submit" class="btn btn-success">Submit Request</button>
                                            </div>
                                        </form>

                                        <br>    <br>
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Form</th>
                                            <th>Message</th>
                                            <th>Purpose</th>
                                            <th>Request Date</th>
                                            <th>Status</th>
                                            <th>Admission Office Messsage</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                <?php 
                    $sql = "SELECT * FROM message WHERE name = '$fullName'";
                    $res = $con->query($sql);
                        if ($res->num_rows>0){
                            while($row = $res->fetch_assoc()){
                                
                ?>
                <tr>
                <td><?php echo $row['form']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><?php echo $row['dateRequest']; ?></td>
                <td>
                    <?php 
                        if ($row['status'] == 'Pending') {
                    ?>
                        <i style="background: #ffd60a; font-family: cursive; border-radius: 15px; padding: 2px 12px;">Pending</i>

                    <?php }else if($row['status'] == 'Approved'){ ?>

                        <i style="background: #70e000; font-family: cursive; border-radius: 15px; padding: 2px 12px;">Approved</i>

                    <?php }else if($row['status'] == 'Processing'){ ?>

                        <i style="background: #00f5d4; font-family: cursive; border-radius: 15px; padding: 2px 12px;">Processing</i>

                    <?php }else{ ?>

                        <i class="stats" style="background: red; color: white;  font-family: cursive; border-radius: 15px; padding: 2px 12px;">Rejected</i>

                    <?php } ?>
                </td>
                <td><?php echo $row['mess']; ?></td>
                <td>
                <a onclick="return confirm('Are you sure you want to delete?')" href="deleteCourse.php?delid=<?php echo $row['courseCode'];?>" title="Delete Request"><i class="fa fa-trash fa-1x"></i></a></td>
                </tr><?php }}?>
            
                                                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>



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
