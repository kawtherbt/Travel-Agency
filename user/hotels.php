<?php

?>







<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Go Tours</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/hotels.css">
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
                            <h1><span>Book Your Hotel:</span><br>Fly with Ease and Save!</h1>
                            <p>Discover seamless hotel booking experience with our user-friendly platform. Find the best
                                deals,
                                choose your preferred stays, and embark on your dream journey hassle-free. Start your
                                adventure now!</p>

                        </div>

                        <div class="col">
                            <div class="contact" id="contact">
                            <h2 class="text-center">Search Hotel</h2>

                                <div class="container">
                                    <div class="contact-form">
                                        <form action="" method="POST">

                                            <input type="text" name="location" id="location" placeholder="In (Country)">
                                            <input type="submit" value="Search Hotels">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </header>


        
        <div class="w-100 text-center justify-content-center" style="background-color:#bd8cbf;padding-top:1in;color:white;padding-bottom:1in">
            <h3>Hotels Search Results</h3><br>
   

            <div class="row">
                <div class="col-12 justify-content-center">
                     <div class="card-columns" style="color:black;">

                     <?php 
                     require('../database/config.php');

                     
                     $hotels = [];
                     
                     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                             $location = $_POST['location'];
                     
                     
                       
                         $query = "SELECT * FROM hotel WHERE location= :location";
                         $stmt = $db->prepare($query);
                        $stmt->bindParam(':location', $location);
                         
                     
                         $stmt->execute();
                     
                         $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      
                     }
                     if ($hotels) : 
                    
                         foreach ($hotels as $hotel) : ?>

                            <div class="card bg-light" style="width: 18rem; border: radius 40px;">
                                <div class="card-body">
                                <img src="imgs/agency.jpg" class="card-img" alt="..." style="height=2in;">
                                <h4 class="card-title"><?php echo $hotel['name']; ?></h4>
                                <h5 class="card-title"><?php echo $hotel['location'];?><br><?php echo $hotel['prix']; ?> TND/Night</h5>
                            
                                <form action="hoteldetail.php">
                                <input type="button" class="btn btn-secondary" onclick=window.location.href="hoteldetail.php?id_h=<?php echo $hotel['id_h']; ?>" value="See Details"  style="background-color:#e3bde6;color:#791980;margin-bottom:0.1in"><br>
                                </form>
                                <input type="button" class="btn btn-secondary" onclick=window.location.href="bookhotel.php?id_h=<?php echo $hotel['id_h']; ?>" value="Book"  style="background-color:#e3bde6;color:#791980">
                                </div>
                            </div>

                            <?php endforeach; 
                            else : ?>
                            <p>No hotels found matching the criteria.</p>
                            <?php endif; ?>

                     </div>
                </div>
               
            </div>
        </div>





        <div class="w-100 text-center justify-content-center" style="background-color:#563158;padding-top:1in;color:white;padding-bottom:1in">
            <h3>Browse Through Our Available Hotels</h3><br>
   

            <div class="row">
                <div class="col-12">
                     <div class="card-columns" style="color:black;">
                        <?php 
                                require('../database/config.php');

                               
                                $stmt = $db->query("SELECT * FROM hotel");
                                $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($hotels as $hotel): ?>

                
                
                    
                            <div class="card bg-light" style="width: 18rem; border: radius 40px;">
                                <div class="card-body">
                                <img src="imgs/agency.jpg" class="card-img" alt="..." style="height=2in;">
                                <h4 class="card-title"><?php echo $hotel['name']; ?></h4>
                                <h5 class="card-title"><?php echo $hotel['location'];?><br><?php echo $hotel['prix'];?> dt/night</h5>
                            
                                <form action="hoteldetail.php">
                                <input type="button" class="btn btn-secondary" onclick=window.location.href="hoteldetail.php?id_h=<?php echo $hotel['id_h']; ?>" value="See Details"  style="background-color:#e3bde6;color:#791980;margin-bottom:0.1in"><br>
                                </form>
                                <input type="button" class="btn btn-secondary" onclick=window.location.href="bookhotel.php?id_h=<?php echo $hotel['id_h']; ?>" value="Book"  style="background-color:#e3bde6;color:#791980">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
               
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

                       
                        $('.navbar ul.navbar-nav li a').on('click', function (e) {

                            var getAttr = $(this).attr('href');


                            $('html').animate({ scrollTop: $(getAttr).offset().top }, 1000);
                        });
                    })
                </script>

    </body>

</html>
