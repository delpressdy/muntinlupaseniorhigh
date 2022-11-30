
<?php

    include('../includes/dbconnection.php');
    include('../includes/session.php');


    $alertStyle2 ="";
    $statusMsg2="";


    if(isset($_POST['save'])){
        $updated = $_POST['updateStat'];
        $std = $_POST['std'];
        $form = $_POST['form'];
        $mess = $_POST['message'];
            
            $query2=mysqli_query($con,"UPDATE message SET status = '$updated' WHERE name = '$std' AND form = '$form'");
                if ($query2) {

                      $query2=mysqli_query($con,"UPDATE message SET mess = '$mess' WHERE name = '$std' AND form = '$form'");

                      $alertStyle2 ="alert alert-success";
                      $statusMsg2="Updated Successfully!";
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

</head>
<body>
    <?php $page="request"; include 'includes/leftMenu.php';?>

    <div id="right-panel" class="right-panel">

            <?php include 'includes/header.php';?>
            
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
                                    
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Form</th>
                                            <th>Message</th>
                                            <th>Purpose</th>
                                            <th>Request Date</th>
                                            <th>Status</th>
                                            <th>Message</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                <?php 
                    $sql = "SELECT * FROM message";
                    $res = $con->query($sql);
                        if ($res->num_rows>0){
                            while($row = $res->fetch_assoc()){
                        $stats=$row['status'];
                ?>
                <tr>
                <td class="name"><?php echo $row['name']; ?></td>
                <td class="frms"><?php echo $row['form']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><?php echo $row['dateRequest']; ?></td>
                <td>
                    <?php 
                        if ($row['status'] == 'Pending') {
                    ?>
                        <i class="stats" style="background: #ffd60a; font-family: cursive; border-radius: 15px; padding: 2px 12px;">Pending</i>

                    <?php }else if($row['status'] == 'Approved'){ ?>

                        <i class="stats" style="background: #70e000; font-family: cursive; color: white; border-radius: 15px; padding: 2px 12px;">Approved</i>

                    <?php }else if($row['status'] == 'Processing'){ ?>

                        <i class="stats" style="background: #00f5d4; font-family: cursive; border-radius: 15px; padding: 2px 12px;">Processing</i>

                    <?php }else{ ?>

                        <i class="stats" style="background: red; color: white;  font-family: cursive; border-radius: 15px; padding: 2px 12px;">Rejected</i>

                    <?php } ?>


                </td>
                <td><?php echo $row['mess'] ?></td>
                <td>
                
                <a class="update" href="n=<?php echo $row['name']; ?>" title="Update Request">Update</i></a>|
                <a onclick="return confirm('Are you sure you want to delete?')" href="deleteCourse.php?delid=<?php echo $row['courseCode'];?>" title="Delete Request"><i class="fa fa-trash fa-1x"></i></a></td>
                </tr><?php }}?>
            
                                                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        
                        <!-- Modal -->
                        <form method="POST">
                            <div class="modal fade" id="viewUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color: #70e000;">
                                    <h4 class="modal-title" id="studHeader" style="font-family:cursive; color: white;" align="center"></h4>
                                  </div>
                                  <div class="modal-body" style="background: #eff6e0;">
                                        <div class="updateReq">
                                            
                                        </div>
                                  </div>
                                  <div class="modal-footer" style="background: #eff6e0;">
                                    <button type="save" name="save" id="" class="btn btn-success">Update</button>
                                    <button type="button" id="x" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </form>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

        <?php include 'includes/footer.php';?>


</div>

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
    <script src="https://cdn.usebootstrap.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );


      $('.update').click(function(e){
                e.preventDefault();

                var name = $(this).closest('tr').find('.name').text();
                var stats = $(this).closest('tr').find('.stats').text();
                var form = $(this).closest('tr').find('.frms').text();
                console.log(name);
                console.log(stats);
                console.log(form);
                // alert('Hello');

                $.ajax({
                    type: "POST",
                    url: "modal_update_req.php",
                    data: {
                        'checking_viewbtn': true,
                        'name': name,
                        'stats': stats,
                        'form': form,
                    },
                    success: function (response) {
                        console.log(response);
                        $('.updateReq').html(response);
                        $('#viewUpdate').modal('show');
                    }   
                });
        });

        $('#x').click(function(e){
            $('#viewUpdate').modal('hide');
        });

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
