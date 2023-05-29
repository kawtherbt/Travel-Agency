<?php
require('../database/config.php');


$flights = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
  $placeFrom = $_POST['place_from'];
  $placeTo = $_POST['place_to'];

  try {
    $query = "SELECT * FROM flight WHERE place_from = '$placeFrom'
              AND place_to = '$placeTo'";
    $stmt = $db->prepare($query);

  

    $stmt->execute();

    $flights = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die('Database error: ' . $e->getMessage());
  }
}
?>








<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Go Tours</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/flights.css">
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-light text-capitalize">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img src="imgs/logo.png" alt="#" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show-menu"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="show-menu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="hotels.php">Hotels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">signup</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="far fa-user"></i></a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </nav>

        <header id="home">
            <div class="overlay ">
                <div class="container ">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1><span>Book Your Flight:</span><br>Fly with Ease and Save!</h1>
                            <p>Discover seamless flight booking experience with our user-friendly platform. Find the best
                                deals,
                                choose your preferred airlines, and embark on your dream journey hassle-free. Start your
                                adventure now!</p>

                        </div>

                        <div class="col">
                            <div class="contact" id="contact">

                                <div class="container">
                                    <h2 class="text-center">Search Flight</h2>
                                    <div class="contact-form" >
                                        <form action="" method="POST">
                                            <input type="text" name="place_from" id="place_from" placeholder="From">
                                            <input type="text" name="place_to" id="place_to" placeholder="To">
                                            
                                            <input type="submit" value="Search Flights">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </header>

        <div class="w-100 text-center" style="background-color:#563158;padding-top:1in;padding-bottom:1in;color:white">
            <!-- Display flight results -->
            <h3>Flight Search Results:</h3><br>

            <div class="row text-center justify-content-center">


                    <?php if ($flights) : 
                    foreach ($flights as $flight) : ?>

                        <div class="col-4 list-group " style="margin-bottom:0.1in;padding-left:0.5in;padding-right:0.5in;">
                                <a href="bookflight.php?id_f=<?php echo $flight['id_f']; ?>" class="list-group-item list-group-item-action list-group-item-light" aria-current="true">
                                <div class="d-flex w-100 justify-content-center">
                              
                                <h5 class="mb-1">Flight ID: <?php echo $flight['id_f']; ?><br>
                                Departure From: <?php echo $flight['place_from']; ?><br>
                                Arrival In: <?php echo $flight['place_to']; ?></h5>
                                
                                </div>
                                <p class="mb-1">From: <?php echo $flight['depart_date']; ?><br>
                                To: <?php echo $flight['return_date']; ?>
                                </p>
                                <input type="button" class="btn btn-secondary" onclick=window.location.href="bookflight.php?id_f=<?php echo $flight['id_f']; ?>" value="Book"  style="background-color:#e3bde6;color:#791980;margin-bottom:0.1in"><br>
                                </a>
                        </div>
                      <?php endforeach; 
                      else : ?>
                      <p>No flights found matching the criteria.</p>
                    <?php endif; ?>
                
            </div>
        </div>

        <div class="contact" id="contact" >
            <div class="violet-overlay">
              <div class="container">
                <h2 class="text-center" style="padding-bottom:0.5in;color:#563158">Browse Throught Our Available Flights</h2>
                <div class="row">
                    <?php 
                        require('../database/config.php');

                        
                        $stmt = $db->query("SELECT * FROM flight ");
                        $flights = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($flights as $flight): ?>

                    <div class="col-4 list-group " style="margin-bottom:0.1in">
                        <a href="bookflight.php?id_f=<?php echo $flight['id_f']; ?>" class="list-group-item list-group-item-action list-group-item-light" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Departure From: <?php echo $flight['place_from']; ?><br>
                            Arrival In: <?php echo $flight['place_to']; ?></h5>
                            <small>3 days ago</small>
                            </div>
                            <p class="mb-1">From: <?php echo $flight['depart_date']; ?><br>
                            To: <?php echo $flight['return_date']; ?>
                            </p>
                            <input type="button" class="btn btn-secondary" onclick=window.location.href="bookflight.php?id_f=<?php echo $flight['id_f']; ?>" value="Book"  style="background-color:#e3bde6;color:#791980;margin-bottom:0.1in"><br>
                        </a>
                    </div>
                    <br>
                    
                    <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>


        <div class="about-us" id="about">
            <div class="container">
                <h2 class="text-center">Our Beloved <span>Partners</span></h2>
                <section id="clients" class="clients section-bg">
                    <div class="container">

                        <div class="row">

                            <div class="col d-flex align-items-center justify-content-center"   data-aos="zoom-in">
                                <img src="imgs/i2.png"  alt="">
                            </div>

                            <div class="col d-flex align-items-center justify-content-center"  data-aos="zoom-in">
                                <img src="imgs/i1.jpg"  alt="">
                            </div>

                            <div class="col d-flex align-items-center justify-content-center"
                                data-aos="zoom-in">
                                <img src="imgs/i3.png"  alt="">
                            </div>

                            <div class="col d-flex align-items-center justify-content-center"
                                data-aos="zoom-in">
                                <img src="imgs/i4.png"  alt="">
                            </div>

                            <div class="col d-flex align-items-center justify-content-center"
                                data-aos="zoom-in">
                                <img src="imgs/i5.png"  alt="">
                            </div>

                            <div class="col d-flex align-items-center justify-content-center"
                                data-aos="zoom-in">
                                <img src="imgs/i6.png"  alt="">
                            </div>

                        </div>

                    </div>
                </section>
            </div>
        </div>



        <footer>
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <a class="navbar-brand" href="index.html"><img src="imgs/logo.png" alt="#" /></a>
                        </div>
                    </div>
                   

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <h4 class="text-uppercase">Contact us</h4>
                            <p class="address">
                                Sousse Khezema<br>
                                Avenue les orangers<br>
                               Sousse, Tunisie<br>
                                +216 11 111 111
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <h4 class="text-uppercase">additional links</h4>
                            <ul>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Terms and conditions</a></li>
                                <li><a href="#">Privacy policy</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
           
        </footer>

                <script src="js/jquery-3.3.1.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script>
                    $(function () {

                        

                        var winH = $(window).height();

                        $('header').height(winH);

                        $('header .container > div').css('top', (winH / 2) - ($('header .container > div').height() / 2));

                        $('.navbar ul li a.search').on('click', function (e) {
                        });
                        $('.navbar a.search').on('click', function () {
                            $('.navbar form').fadeToggle();
                        });

                        $('.navbar ul.navbar-nav li a').on('click', function (e) {

                            var getAttr = $(this).attr('href');


                            $('html').animate({ scrollTop: $(getAttr).offset().top }, 1000);
                        });
                    })
                </script>

    </body>

</html>

