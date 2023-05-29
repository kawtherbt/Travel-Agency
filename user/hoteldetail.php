<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Go Tours</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/hoteldetails.css">
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
                            <a class="nav-link" href="flights.php">flights</a>
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
                            <h1><span>Hotel Details:</span><br>Here You Go!</h1>
                            <p>Discover seamless flight booking experience with our user-friendly platform. Find the best
                                deals,
                                choose your preferred airlines, and embark on your dream journey hassle-free. Start your
                                adventure now!</p>

                        </div>

                        

                    </div>


                </div>
            </div>
        </header>



        <div class="w-100 text-center" style="background-color:#563158;padding-top:1in;padding-bottom:1in;color:white">
            <h1>Hotel Details</h1>

            <div class="container">
                
                <?php
                require '../database/config.php';
        
                if (isset($_GET['id_h'])) {
                    $id_h = $_GET['id_h'];
        
                    
                        $query = "SELECT * FROM hotel WHERE id_h = :id_h";
                        $stmt = $db->prepare($query);
        
                        $stmt->bindParam(':id_h', $id_h);
        
                        $stmt->execute();
        
                        $hotelDetails = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($hotelDetails) {
                            ?>
                            <p>Name: <?php echo $hotelDetails['name']; ?></p>
                            <p>Location: <?php echo $hotelDetails['location']; ?></p>
                            <p>Price Per Night: <?php echo $hotelDetails['prix']; ?></p>
                            <p>Rooms: <?php echo $hotelDetails['rooms']; ?></p>
        
                            <?php
                        } else {
                            echo "Hotel not found.";
                        }
        
                    
                } else {
                    echo "Invalid request. Hotel ID is missing.";
                }
                ?>
        
            </div>
            <div class="row text-center justify-content-center">


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
        
                    <div class="container">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="item">
                                    <h4 class="text-uppercase">Contact us</h4>
                                    <p class="address">
                                        123 Second Street Fifth <br>
                                        Avenue,<br>
                                        Manhattan, New York<br>
                                        +987 654 3210
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
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="item date">
                                    <h4 class="text-uppercase">resent posts</h4>
                                    <p><a href="#">01/03/2019</a></p>
                                    <p><a href="#">08/05/2019</a></p>
                                    <p><a href="#">01/03/2019</a></p>
                                    <p><a href="#">08/05/2019</a></p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="item">
                                    <h4 class="text-uppercase">newsletter</h4>
                                    <form>
                                        <input type="text" placeholder="Name">
                                        <input type="email" placeholder="Email">
                                        <input type="submit" value="Submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright text-center">
                        <p>Copyright 2019 Design by <a href="https://html.design">Free Html Templates</a></p>
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

