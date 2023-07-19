

<!doctype html>
<html lang="en">

<head>
  <title>DEPARTMENT OF Mathematics</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


  <link rel="stylesheet" href="css2/style.css">
  <link rel="stylesheet" href="fonts2/icomoon/style.css">
  <link rel="stylesheet" href="css2/bootstrap-grid.min.css">
  <link rel="stylesheet" href="css2/bootstrap.min.css.map">

  <link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
  <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">


  <!-- boostrap - accordion -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- Include Bootstrap CSS -->

  <!-- bootstrap carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
  <!-- carousel -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>




  <!-- Include Owl Carousel CSS -->
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css'>



  <!-- boostrap - accordion - script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>




</head>

<body>
 
<?php include('mathheader.php'); ?>
  <!-- END nav -->
  <!-- content starts -->
  <!-- page content starts -->
  <!-- video section -->
  <section class="fullsize-video-bg">
    <div class="video-sec">
      <div id="video-viewport">
        <video width="1600" height="450" autoplay muted loop>
          <source src="img/main.mp4" type="video/mp4" />
          <source src="img/main.mp4" type="video/webm" />
        </video>

        <div class="latest-news" style="z-index:9;">
          <div class="card side-card mb-4">
            <div class="card-body">
              <h5 class="card-title">Upcoming News & Events</h5>
              <div class="ne-scroll">
                <div id="scroll-text">
                  <?php
                  $db_host = 'localhost';
                  $db_name = 'mathsnew_phyadmin';
                  $db_username = 'mathsnew_root';
                  $db_password = 'Maths@321';

                  // Create a connection
                  $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

                  // Check connection
                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }

                  // Assuming your upid is stored in $upid
                  $upid = isset($_GET['upid']) ? $_GET['upid'] : '';

                  // SQL query to fetch data from the table based on upid
                  $sql = "SELECT upid, ucontent, uimg, udate FROM upcoming WHERE type = 'faculty'";

                  $result = $conn->query($sql);

                  if ($result && $result->num_rows > 0) {
                    // Output data for each row
                    while ($row = $result->fetch_assoc()) {
                      $upid = $row["upid"];
                      $ucontent = $row["ucontent"];
                      $uimg = 'http://maths-new.c1.is/img/' . $row["uimg"];
                      $udate = $row["udate"];
                      if (!empty($ucontent)) {

                        // Display the fetched data in the HTML structure
                        echo '
                        <div class="ne-box">
                            <div class="ne-img">
                                <img src="' . $uimg . '" alt="...">
                            </div>
                            <div class="ne-item">
                                <div class="ne-desc"><a href="#">' . $ucontent . '</a></div>
                                <span class="ne-date"><i class="fa fa-calendar"></i>' . $udate . '</span>
                            </div>
                        </div>';
                      }
                    }
                  } else {
                    echo "No results found";
                  }

                  // Close the connection
                  $conn->close();
                  ?>


                </div>
              </div>
              <div class="mt-2" style="text-align: center;">
                <a href="#" class="dep-btn" style="text-decoration: none;">More News </a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- video section end  -->
  <!-- ABOUT DEPARTMENT -->

  <section class="mech-content">
    <div class="container">
      <div class="row" style="padding: 20px 0;">
        <div class="col-md-6 abt-btn">
          <div class="wrapper">
            <div class="button-box">
              <button type="button" class="btn-appl btn-15">Prospective Students</button>
              <button type="button" class="btn-appl btn-15">Prospective Faculty</button>
            </div>
            <div class="button-box">
              <button type="button" class="btn-appl btn-15">Current Students</button>
              <button type="button" class="btn-appl btn-15">Current Faculty</button>
            </div>
            <div class="button-box">
              <button type="button" class="btn-appl btn-15">Industry Engagement</button>
              <button type="button" class="btn-appl btn-15">Recruiters</button>
            </div>
          </div>
        </div>


        <div class="col-md-6">
          <h2 class="abt-deprt" style="padding-top:50px;"><span class="app-line" style="color: #a00;">|</span> About the Department</h2>
          <p class="abt-content">The Department of Mathematics offers a doctoral research program for motivated students interested in
            pursuing their career in mathematics - either academic or industry, as well as two post graduate programs namely M.Sc.
            in Mathematics and M.Tech in Industrial Mathematics and Scientific Computing.</p>

        </div>
      </div>
    </div>

  </section>

  <!-- HEAD OF DEPARTMENT -->



  <?php
  // Database connection parameters
  $hostname = "localhost";
  $username = "mathsnew_root";
  $password = "Maths@321";
  $database = "mathsnew_phyadmin";

  // Create a connection
  $connection = mysqli_connect($hostname, $username, $password, $database);

  // Check if the connection was successful
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  ?>
  <div class="msg-frm-HOD">
    <div class="container">
      <div class="row" style="padding: 22px;">
        <div class="col-md-7 hod-content">
          <h2 class="head-of-deprt" style="padding-bottom: 20px;"><span class="hod-line" style="color: #a00;">|</span> Message from the Head
            of Department</h2>
          <?php

          $query = "SELECT hcontent,himg FROM hodcontent WHERE id='87'";
          $result = mysqli_query($connection, $query);

          if ($result) {

            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);


              $HodContent = $row['hcontent'];
              $hodImage = $row['himg'];


              echo '<p class="head-content">' . $HodContent . ' </p>';
            } else {

              echo '<p>No content found</p>';
            }

            mysqli_free_result($result);
          } else {
            echo 'Error executing the query: ' . mysqli_error($connection);
          }
          ?>
        </div>
        <div class="col-md-5">
          <div class="hod-image">
            <?php
            echo '<img src="http://maths-new.c1.is/img/' . $hodImage . '" alt="">';
            ?>
          </div>
        </div>



        <!-- <div class="button">
          <button type="button" class="hod-btn" data-toggle="modal" data-target="#modalDiscount">Read
            More</button>
        </div> -->
      </div>


    </div>
  </div>


  <?php
  mysqli_close($connection);
  ?>



  <!-- image section -->

  <div class="hero-deer" style="background: -webkit-linear-gradient(0deg, rgba(236, 196, 124, 0.7), rgba(236, 196, 124, 0.7)), url('img/deer-bg.png');background-position: bottom;background-size: cover;background-repeat: no-repeat;display: flex;padding: 40px 0;">
    <div class="container">

      <?php
      $db_host = 'localhost';
      $db_name = 'mathsnew_phyadmin';
      $db_username = 'mathsnew_root';
      $db_password = 'Maths@321';

      // Create a new PDO instance
      $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);

      // Fetch the cid values from the database
      $stmt = $pdo->prepare("SELECT DISTINCT cid FROM counter WHERE type='faculty'");
      $stmt->execute();
      $cids = $stmt->fetchAll(PDO::FETCH_COLUMN);
      ?>

      <div class="row justify-content-left">

        <?php foreach ($cids as $cid) : ?>

          <div class="col-md-3 home-counters">
            <div class="counter">
              <div class="counter-content">
                <?php
                $stmt = $pdo->prepare("SELECT cheading, cvalue FROM counter WHERE type='faculty' AND cid=:cid");
                $stmt->bindParam(':cid', $cid);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                // Fetch the values from the result

                $cheading = $result['cheading'];
                $cvalue = $result['cvalue'];
                ?>

                <span class="counter-value"><?php echo $cvalue; ?></span>
                <h3 class="counter-hdng"><?php echo $cheading; ?></h3>
              </div>
            </div>
          </div>

        <?php endforeach; ?>

      </div>

    </div>
  </div>

  <!-- youtube video -->



  <!-- Research Areas -->
  <div class="Resrch" style="padding: 30px;">
    <div class="container">
      <div class="row" style="padding: 10px 0;">
        <h2 class="reserch-headng"><span class="resrch" style="color: #a00; ">|</span> Research Areas</h2>
      </div>
      <div class="row rearch-img" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="col-md-4 research-col">

          <img src="img/algebra.png" class="imags-1">
          <div class="centered">Algebra and Number Theory</div>
          <div class="overlay-solid">
            <div class="centered-text">Algebra and Number Theory

            </div>
          </div>
        </div>
        <div class="col-md-4 research-col">
          <img src="img/Box-3.png" class="imags-1">
          <div class="centered">Analysis and Linear Algebra</div>
          <div class="overlay-fluid">
            <div class="centered-text">Analysis and Linear Algebra</div>
          </div>

        </div>
        <div class="col-md-4 research-col">
          <img src="img/Box-1.png" class="imags-1">
          <div class="centered">Combinatorics and Theoretical Computer Science</div>
          <div class="overlay-biomedical">
            <div class="centered-text" style="padding: 0;">Combinatorics and Theoretical Computer Science</div>
          </div>



        </div>
      </div>
      <div class="row rearch-img" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="col-md-4 research-col">

          <img src="img/Box-2.png" class="imags-1">
          <div class="centered">Differential Equations and Applied Mathematics</div>
          <div class="overlay-solid">
            <div class="centered-text">Differential Equations and Applied Mathematics</div>
          </div>
        </div>
        <div class="col-md-4 research-col">
          <img src="img/Box-3.png" class="imags-1">
          <div class="centered">Geometry and Topology</div>
          <div class="overlay-fluid">
            <div class="centered-text">Geometry and Topology</div>
          </div>

        </div>
        <div class="col-md-4 research-col">
          <img src="img/Box-4.png" class="imags-1">
          <div class="centered">Probability and Statistics</div>
          <div class="overlay-biomedical">
            <div class="centered-text" style="padding: 0;">Probability and Statistics</div>
          </div>



        </div>
      </div>


    </div>

  </div>

  <!-- Faculty achievement -->




  <?php
  // Database connection parameters
  $hostname = "localhost";
  $username = "mathsnew_root";
  $password = "Maths@321";
  $database = "mathsnew_phyadmin";

  // Create a connection
  $connection = mysqli_connect($hostname, $username, $password, $database);

  // Check if the connection was successful
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

  // Fetch the aid from the achievement table
  $query = "SELECT aid FROM achievement WHERE type = 'faculty'";
  $result = mysqli_query($connection, $query);

  // Check if there is a result
  if ($result) {
    $achievements = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
  } else {
    echo 'Error executing the query: ' . mysqli_error($connection);
  }

  ?>
  <section class="fac-achvmnt" style="background: url(img/fac-bg.png);background-size: cover; background-position: bottom; margin-top: 30px;">
    <div class="container">
      <div class="row" style="padding: 10px 0;">
        <h3 class="fac-headng">Faculty Achievement</h3>
      </div>
      <div class="row justify-content-center" style="padding: 20px 0;">
        <div class="col-md-6">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

              <?php
              // Iterate through each achievement
              foreach ($achievements as $index => $achievement) {
                $aid = $achievement['aid'];

                // Fetch the achievement details using the aid
                $achievementQuery = "SELECT facname, facdesig, fcontent, fimg FROM achievement WHERE aid = '$aid'";
                $achievementResult = mysqli_query($connection, $achievementQuery);

                if ($achievementResult) {
                  if (mysqli_num_rows($achievementResult) > 0) {
                    $row = mysqli_fetch_assoc($achievementResult);
                    $facultyName = $row['facname'];
                    $facultyDesignation = $row['facdesig'];
                    $facultyContent = $row['fcontent'];
                    $facultyImage = $row['fimg'];

                    if (!empty($facultyName)) {
                      // Output the achievement details
              ?>
                      <div class="carousel-item<?= ($index == 0 ? ' active' : '') ?>">
                        <div class="faculty-achievement-info" style="justify-content:center;">
                          <div class="faculty-Achievement-details">
                            <p style="text-align: center;"><?= $facultyContent ?></p>
                            <hr class="faculty-red-line">
                            <h3><?= $facultyName ?></h3>
                            <h5><?= $facultyDesignation ?></h5>
                          </div>
                          <?php if (!empty($facultyImage)) { ?>
                            <div class="faculty-Achievement-image">
                              <img src="http://localhost/maths-new/img/<?= $facultyImage ?>" alt="">
                            </div>
                          <?php } ?>
                        </div>
                      </div>
              <?php
                    }
                  } else {
                    echo '<p>No faculty found</p>';
                  }

                  mysqli_free_result($achievementResult);
                } else {
                  echo 'Error executing the query: ' . mysqli_error($connection);
                }
              }
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>






  <style>
    /*news*/



    #news-slider {
      margin-top: 80px;
    }

    .post-slide {
      background: #fff;
      border-radius: 0px;
      padding-top: 1px;
      border: 1px solid #D9D9D9;
    }

    .post-slide .post-img {
      position: relative;
      overflow: hidden;
      border-radius: 0px;
      /* margin: 8px 15px 8px 15px;
			 */
    }

    .post-slide .post-img img {
      width: 100%;
      height: auto;
      transform: scale(1, 1);
      transition: transform 0.2s linear;
    }

    /* .post-slide:hover .post-img img {
			transform: scale(1.1, 1.1);
		} */

    .post-slide .over-layer {
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      background: linear-gradient(-45deg, rgba(6, 189, 244, 0) 0%, rgba(45, 111, 253, 0) 100%);
      transition: all 0.50s linear;
    }

    .post-slide:hover .over-layer {
      opacity: 1;
      text-decoration: none;
    }

    .post-slide .over-layer i {
      position: relative;
      top: 45%;
      display: block;
      color: #fff;
      font-size: 25px;
    }

    .post-slide .post-content {
      background: #fff;
      padding: 20px 20px 0px;
      border-radius: 15px;
      text-align: center;
      height: 150px;
    }

    .post-slide .post-contentt {
      background: #fff;
      padding: 20px 20px 0px;
      border-radius: 15px;
      text-align: center;
    }

    .post-slide .post-title a {
      font-size: 15px;
      font-weight: bold;
      color: #0d0606;
      display: inline-block;
      text-transform: uppercase;
      transition: all 0.3s ease 0s;
      text-align: center;
    }

    .post-slide .post-title a:hover {
      text-decoration: none;
      color: #a00;
    }

    .post-slide .post-description {
      line-height: 24px;
      color: #0d0606;
      margin-bottom: 25px;
    }

    .post-slide .post-date {
      font-size: 12px;
      color: #333;
      text-transform: uppercase;
    }

    .post-slide .read-more {
      padding: 7px 20px;
      float: right;
      font-size: 12px;
      background: #a00;
      color: #ffffff;
      box-shadow: 0px 10px 20px -10px #1376c5;
      border-radius: 25px;
      text-transform: uppercase;
    }

    .post-slide .read-more:hover {
      background: #a00;
      text-decoration: none;
      color: #fff;
    }


    .owl-prev,
    .owl-next {
      /* position: absolute;
            top: 45%;
            transform: translateY(-50%);
            display: inline-block;
            background: #fff;
            color: #000;
            font-size: 24px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 50%;
            line-height: 1;
            transition: all 0.3s ease 0s;
            cursor: pointer; */
      display: none;
    }

    .owl-prev:hover,
    .owl-next:hover {
      /* background: #3498db;
            color: #fff; */
      display: none;
    }

    .owl-prev {
      /* left: -35px; */
      display: none;
    }

    .owl-next {
      /* right: -35px; */
      display: none;
    }

    .owl-theme .owl-dots {
      margin-top: 10px;
      text-align: center;
    }

    .owl-theme .owl-dots .owl-dot {
      display: inline-block;
      height: 12px;
      width: 12px;
      margin: 0 5px;
      border-radius: 50%;
      background: #dcdcdc;
      transition: all 0.3s ease 0s;
    }

    .owl-theme .owl-dots .owl-dot.active {
      background: #3498db;
      width: 25px;
    }

    .news-readmore {
      text-align: center;
      padding: 10px 0;
    }

    .news-readmore a {
      text-decoration: none;
    }

    .news-readmore button {
      background: #fff;
      border: none;
      font-size: 16px;
      font-weight: 400;
      font-family: 'Lato', sans-serif;
      text-align: left;
      color: #888888;
    }

    .blog-home2 .bg-info-gradiant {
      background: linear-gradient(to right, #a00 0%, #A00E09 100%);
    }


    .d-block {
      display: block !important;
    }

    .blog-home2 .date-pos {
      position: absolute;
      right: 10px;
      top: 10px;
    }

    .blog-home2 .date-pos span {
      font-size: 30px;
      line-height: 30px;
    }

    /*end*/
    @media (max-width: 767px) {
      .post-slide {
        margin-bottom: 20px;
        width: 100%;
      }
    }
  </style>


  <?php
  // Assuming you have established a database connection ($conn)

  // Query to fetch news items from the database

  $servername = "localhost";
  $username = "mathsnew_root";
  $password = "Maths@321";
  $dbname = "mathsnew_phyadmin";

  // Create a new mysqli connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM news";
  $result = $conn->query($sql);

  // Initialize an empty array to store the news items
  $newsItems = array();

  // Check if there are any news items
  if ($result->num_rows > 0) {
    // Loop through the result set and store each news item in the array
    while ($row = $result->fetch_assoc()) {
      $newsItems[] = $row;
    }
  }

  $conn->close();
  ?>

  <div class="news">
    <div class="container">
      <div class="row " style="padding: 20px 0;">
        <h2 class="abt-deprt"><span class="app-line" style="color: #a00;">|</span> News</h2>
      </div>
    </div>
    <div class="container-fluid">

      <div class="row equal-size-rows">
        <div class="col-md-12" style="margin-top: -67px; ">

          <?php if (!empty($newsItems)) { ?>
            <div id="news-slider" class="owl-carousel">

              <?php foreach ($newsItems as $newsItem) {
              ?>
                <?php
                if (empty($newsItem['nhead'])) {
                  continue;
                }
                ?>

                <div class="post-slide">

                  <div class="post-img">
                    <?php
                    if (!empty($newsItem['nimg'])) {
                      echo '<img src="http://maths-new.c1.is/img/' . $newsItem['nimg'] . '" alt="" style="width: 553px; height: 250px;">';
                    }
                    ?>
                  </div>


                  <div class="post-content">
                    <h3 class="post-title"><a href="#"><?php echo $newsItem['nhead']; ?></a></h3>
                    <p class="post-description"><?php echo $newsItem['ncontent']; ?></p>
                  </div>
                  <div class="post-contentt">
                    <div class="news-readmore button">
                      <a href="<?php echo $nlink; ?>"><button>Read More >></button></a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="news-button">
          <button type="button" class="news-btn" data-toggle="modal" data-target="#modalDiscount">Read More</button>
        </div>
      </div>
    </div>
  </div>






  <!-- student achievement -->

  <?php
  // Database connection parameters
  $hostname = "localhost";
  $username = "mathsnew_root";
  $password = "Maths@321";
  $database = "mathsnew_phyadmin";

  // Create a connection
  $connection = mysqli_connect($hostname, $username, $password, $database);

  // Check if the connection was successful
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

  // Fetch the aid from the achievement table
  $query = "SELECT stuid FROM stuach WHERE usertype = 'faculty'";
  $result = mysqli_query($connection, $query);

  // Check if there is a result
  if ($result) {
    $achievements = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
  } else {
    echo 'Error executing the query: ' . mysqli_error($connection);
  }

  ?>
  <section class="fac-achvmnt" style="background: url(img/fac-bg.png);background-size: cover; background-position: bottom; margin-top: 30px;">
    <div class="container">
      <div class="row" style="padding: 10px 0;">
        <h3 class="fac-headng">Student Achievement</h3>
      </div>
      <div class="row justify-content-center" style="padding: 20px 0;">
        <div class="col-md-6">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

              <?php
              // Iterate through each achievement
              foreach ($achievements as $index => $achievement) {
                $stuid = $achievement['stuid'];

                // Fetch the achievement details using the aid
                $achievementQuery = "SELECT snameid,scontent, simg FROM stuach WHERE stuid = '$stuid'";
                $achievementResult = mysqli_query($connection, $achievementQuery);

                if ($achievementResult) {
                  if (mysqli_num_rows($achievementResult) > 0) {
                    $row = mysqli_fetch_assoc($achievementResult);
                    $facultyName = $row['snameid'];
                    $facultyContent = $row['scontent'];
                    $facultyImage = $row['simg'];

                    if (!empty($facultyName)) {
                      // Output the achievement details
              ?>
                      <div class="carousel-item<?= ($index == 0 ? ' active' : '') ?>">
                        <div class="faculty-achievement-info" style="justify-content:center;">
                          <div class="faculty-Achievement-details">
                            <p style="text-align: center;"><?= $facultyContent ?></p>
                            <hr class="faculty-red-line">
                            <h3><?= $facultyName ?></h3>
                            <h5><?= $facultyDesignation ?></h5>
                          </div>
                          <?php if (!empty($facultyImage)) { ?>
                            <div class="faculty-Achievement-image">
                              <img src="http://localhost/maths-new/img/<?= $facultyImage ?>" alt="">
                            </div>
                          <?php } ?>
                        </div>
                      </div>
              <?php
                    }
                  } else {
                    echo '<p>No faculty found</p>';
                  }

                  mysqli_free_result($achievementResult);
                } else {
                  echo 'Error executing the query: ' . mysqli_error($connection);
                }
              }
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- event calendar -->



  <div class="calendar" style="padding: 30px;">
    <div class="container">
      <div class="row">
        <h2 class="abt-deprt"><span class="app-line" style="color: #a00;">|</span> Event Calendar</h2>
      </div>
      <div class="row" style="padding: 5px 0px 20px 0px;">
        <div class="blog-home2 py-2">
          <div class="container">
            <div id="eventCarousel" class="owl-carousel owl-theme">

              <?php
              // Database connection parameters
              $hostname = "localhost";
              $username = "mathsnew_root";
              $password = "Maths@321";
              $database = "mathsnew_phyadmin";

              // Create a connection
              $connection = mysqli_connect($hostname, $username, $password, $database);

              // Check if the connection was successful
              if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
              }

              // Query the database to fetch the eid values
              $eidQuery = "SELECT DISTINCT eid FROM event WHERE type='faculty'";
              $eidResult = mysqli_query($connection, $eidQuery);

              // Check if the query was successful
              if (!$eidResult) {
                echo "Error: " . mysqli_error($connection);
                exit();
              }

              // Fetch all the rows from the result
              $rows = mysqli_fetch_all($eidResult, MYSQLI_ASSOC);

              // Loop through the rows
              foreach ($rows as $row) {
                $eid = $row['eid'];

                // Query the database to fetch the event for the current eid
                $query = "SELECT evemon, evedate, evehead, eveaddr, evelink, eveimg FROM event WHERE type='faculty' AND eid='$eid'";
                $result = mysqli_query($connection, $query);

                // Check if the query was successful
                if (!$result) {
                  echo "Error: " . mysqli_error($connection);
                  exit();
                }

                // Fetch the row from the result
                $row = mysqli_fetch_assoc($result);

                if (!empty($row['evehead'])) {
                  // Display the event
                  echo '
                                    <div class="item">
                                        <div class="col-md-12 on-hover" style="padding-right: 20px;">
                                            <div class="card border-0 mb-4 style="font-size: 1rem;">
                                                <a href="#">
                                                    <img class="card-img-top" src="http://maths-new.c1.is/img/' . $row['eveimg'] . '" style="width:435px; height:300px;">
                                                </a>
                                                <div class="date-pos bg-info-gradiant p-2 d-inline-block text-center rounded text-white position-absolute">
                                                    ' . $row['evemon'] . '<span class="d-block">' . $row['evedate'] . '</span>
                                                </div>
                                                <h5 class="font-weight-medium mt-3"><a href="#" class="text-decoration-none link" style="font-size: 17px;">' . $row['evehead'] . '</a></h5>
                                                <p class="mt-3">' . $row['eveaddr'] . '</p>
                                                <a href="' . $row['evelink'] . '" class="text-decoration-none linking text-themecolor mt-2" style="font-size:15px;">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                ';
                }

                // Free the result
                mysqli_free_result($result);
              }

              // Close the database connection
              mysqli_close($connection);
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add the following JavaScript code after the above HTML code -->
  <script>
    // Initialize the Owl Carousel
    $(document).ready(function() {
      $('#eventCarousel').owlCarousel({
        navigation: true,
        navigationText: ["", ""],
        pagination: true,
        autoPlay: true,
        slideSpeed: 5000,
        items: 3,
        margin: 20,
        nav: true,
        dots: false,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            nav: true
          },
          768: {
            items: 2,
            nav: true
          },
          992: {
            items: 3,
            nav: true
          }
        }
      });
    });
  </script>



  <!-- footer -->

  <?php include('mathfooter.php'); ?>


  <script src="http://localhost/maths-new/js2/jquery.min.js"></script>
  <script src="http://localhost/maths-new/js2/popper.js"></script>
  <script src="http://localhost/maths-new/js2/bootstrap.min.js"></script>
  <script src="http://localhost/maths-new/js2/jquery.sticky.js"></script>
  <script src="http://localhost/maths-new/js2/jquery.touch-swipe.min.js"></script>
  <script src="http://localhost/maths-new/js2/main.js"></script>

  <!-- calendar -->
  <script src='fullcalendar/packages/core/main.js'></script>
  <script src='fullcalendar/packages/interaction/main.js'></script>
  <script src='fullcalendar/packages/daygrid/main.js'></script>
  <script src='fullcalendar/packages/timegrid/main.js'></script>
  <script src='fullcalendar/packages/list/main.js'></script>

  <!-- Include jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Include Owl Carousel JS -->
  <script src='https://code.jquery.com/jquery-1.12.0.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'></script>
  <script src="http://localhost/maths-new/script.js"></script>




  <!-- calendar script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        height: 'parent',
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        defaultView: 'dayGridMonth',
        defaultDate: '2023-02-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [{
            title: 'All Day Event',
            start: '2020-02-01',
          },
          {
            title: 'Long Event',
            start: '2020-02-07',
            end: '2020-02-10'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2020-02-09T16:00:00'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2020-02-16T16:00:00'
          },
          {
            title: 'Conference',
            start: '2020-02-11',
            end: '2020-02-13'
          },
          {
            title: 'Meeting',
            start: '2020-02-12T10:30:00',
            end: '2020-02-12T12:30:00'
          },
          {
            title: 'Lunch',
            start: '2020-02-12T12:00:00'
          },
          {
            title: 'Meeting',
            start: '2020-02-12T14:30:00'
          },
          {
            title: 'IITM Hour',
            start: '2020-02-12T17:30:00'
          },
          {
            title: 'Dinner',
            start: '2020-02-12T20:00:00'
          },
          {
            title: 'G20 event',
            start: '2020-02-13T07:00:00'
          },
          {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2023-02-28'
          }
        ]
      });

      calendar.render();
    });
  </script>

  <!-- calendar script End -->
</body>

<style>
  @media (min-width: 1200px) {
    .container {
      max-width: 95%;
    }
  }
</style>

</html>