<?php
error_reporting(0);
    session_start();
    include('includes/dbconnection.php');

        $query = mysqli_query($con,"select * from announcement");
        $count = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);

    
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
  <!-- <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet"> -->
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style22.css" rel="stylesheet">

</head>

<body>
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Vission</h2>
          <p>THE DEPED VISION</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="img/foot.jpg" style="height:400px;" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <p>
                  We dream of Filipinos
                  who passionately love their country
                  and whose values and competencies
                  enable them to realize their full potential
                  and contribute meaningfully to building the nation.

                  As a learner-centered public institution,
                  the Department of Education
                  continuously improves itself
                  to better serve its stakeholders.
            </p>
          </div>
        </div>
<br><br><br><br>
        <div class="section-title">
          <h2>Mission</h2>
          <p>THE DEPED MISSION</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="img/pic1.png" style="height:400px;" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <p>
              To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where:

              Students learn in a child-friendly, gender-sensitive, safe, and motivating environment.
              Teachers facilitate learning and constantly nurture every learner.
              Administrators and staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen.
              Family, community, and other stakeholders are actively engaged and share responsibility for developing life-long learners.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    
          </div>
        </div>

      </div>
    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <hr style="border: 1px solid green; width: 100%;">
        <div class="row">
            <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.2413560641653!2d121.02599942656673!3d14.388004949229003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d1037d979a2d%3A0x6623949c6b53dcb3!2sMuntinlupa%20National%20High%20School!5e1!3m2!1sen!2sph!4v1668872505836!5m2!1sen!2sph" width="550" height="450" style="border:7px solid green;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <br><br><br><br><h2>Muntinlupa <br>National High School</h2>
            <p>
               Poblacion, Muntinlupa,<br>
              1776 Metro Manila<br><br>
            </p>
          </div>
        </div><hr style="border: 1px solid green; width: 100%;">

          
    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; <strong><span>Student Information System</span></strong>
        </div>
        <div class="credits">
        </div>
      </div>
    </div>
  </footer>

  <a href="index.php" class="ret" style="font-weight: 700; background-color: #fff; color: black; padding: 4px; border-radius: 14px;"><b class="blink" style="font-size:30px;">🚩</b> Back to Home </i></a>

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<script>
  $(document).ready(function(){

    function blink(){

      $('.blink').fadeOut(500);
      $('.blink').fadeIn(500);
    }

    setInterval(blink,1000);

  });

</script>