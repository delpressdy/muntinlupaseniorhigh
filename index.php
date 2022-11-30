<?php
error_reporting(0);
    session_start();
    include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Student Information System</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="shortcut icon" href="assets/img/ronk1.jpg" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <link href="assets/css/style22.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->

  <header id="header" class="fixed-top">
    <div class="container d-flex"><h4 style="margin-left:-100px; color: lawngreen; transition: all 1s;"><a class="skul" href="about.php" style="text-decoration: overline; font-weight:700; color: #00bbf9;">About Us</a></h4>
      <h1 class="logo mr-auto"><a class="skul" href="index.php"></a></h1>
        
       <nav class="nav-menu d-none d-lg-block">
        <ul class="log">
          <li class="drop-down"><img class="pic" src="img/logo.jpg" style="width:80px;height:80px; margin-top: -20px; border-radius: 25px; margin-left: -640%;">
            <i hidden class='bx bxs-down-arrow'></i>
            <ul style="margin-left: -540%;">
              <li><a href="adminLogin.php">Administrator</a></li>
              <li><a href="studentLogin.php">Student</a></li>
              <li><a href="adminLogin.php">Teacher</a></li>

            </ul>
          </li>

        </ul>
      </nav><!-- .nav-menu -->


    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center" style="background-image: url('img/school.jpg');">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100" style="background:rgba(0,0,0,0.5); padding: 19px; border-radius: 15px;">
      <h2 id="tots" style="color: #ffd60a;">WELCOME!</h2>
      <h1 style="color: #00bbf9;">MUNTINLUPA SENIOR HIGH SCHOOL</h1><h1>STUDENT INFORMATION SYSTEM</h1>
    </div>
  </section>
    <div id class="section-title" style="background-color: #00bbf9; padding-bottom: 0px;"><p align="center" style="color: #ffffff;">Announcements<hr style="border:1px solid #00bbf9; margin-top: 1px;"></p></div>
  <main id="main">

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">



<!-- STARTING SA EVENT 1 -->
    <?php
      $sql =mysqli_query($con, "SELECT * FROM announcement");
        if($sql->num_rows>0){
          while($row = mysqli_fetch_array($sql)){
    ?>
        <div class="section-title">
          <h2>Latest Event</h2>
          <!-- TITLE -->
          <p>
            <?php echo '<h1 style="font-family: monospace; font-size: 40px; color: red; font-weight: 700;">'.$row['title'].'</h1>' ?>
            </p>
            <p style="font-size: 17px;">
              <!-- PETSA -->
              <?php echo '<h1 style="font-size: 19px;">Announced on: <i style="font-size: 19px; color: green;">'.$row['dateAdded'].'</i></h1>' ?>
            </p> 
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="superAdmin/announcement/<?php echo $row['img']; ?>" style="height:350px; margin-top: -90px;" class="img-fluid" alt=""><br><br><br><br>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <!-- DESCRIPTION NYA -->
            <p>
              <?php echo '<p style="font-size: 17px; font-family: monospace;" align="justify">'.$row['details'].'' ?>
            </p>
          </div>
        </div> <!-- END SA 1st EVENT --><br><br><hr style="border: 1px dashed red;">
      <?php }} ?>
      </div>
    </section><!-- End EVENT Section -->
      </div>
    </section>
<hr>
  </main>

  <a href="index.php" class="back-to-top" style="font-weight: 700; background-color: #fff; color: black; padding: 4px; border-radius: 14px;">CLICK ME! AND HOVER THE LOGO TO LOGIN</a>


  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>
<script>
  $(document).ready(function(){

    function blink(){

      $('#tots').fadeOut(500);
      $('#tots').fadeIn(500);
    }

    setInterval(blink,1000);

  });

</script>