<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Go Tours</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bookhotel.css">
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
                            <h1><span>Fly High: </span><br>Book Your Perfect Flight Now!</h1>
                            <p></p>

                        </div>

                        

                    </div>


                </div>
            </div>
        </header>





        <div class="contact" id="contact">
    <div class="violet-overlay">
        <div class="container">
            <h2 class="text-center">Book Flight</h2>
            <?php 
            require '../database/config.php';
            require '../models/BookingModel.php';
            require '../models/ClientModel.php';
            
            if (isset($_GET['id_f'])){
                $id_f = $_GET['id_f'];

                
                    $stmt = $db->prepare("SELECT * FROM flight WHERE id_f = :id_f");
                    $stmt->bindParam(':id_f', $id_f);
                    $stmt->execute();
                    $flightDetails = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($flightDetails) {
                ?>

                <div class="contact-form">
                    <form id="signup-form" action="" method="POST">
                        <input type="number" name="id_f" value="<?php echo $flightDetails['id_f']; ?>" required>
                        <input type="number" name="cin" placeholder="Cin" required>
                        <input type="date" name="debut_f" value='<?php echo $flightDetails['debut_f']; ?>' required>
                        <input type="date" name="fin_f" value='<?php echo $flightDetails['fin_f']; ?>' required>

                        <input type="submit" value="Book Flight"><br>
                        <input type="submit" onclick="window.location.href='flights.php'" value="Return">
                    </form>
                </div>
                
                <?php
                    }
               
            } else {
                echo "Invalid request. Flight ID is missing.";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $clienthotel = new ClientModel();
                $hotelbook = new BookingModel();

                $hotelbook->setIdF($_POST['id_f']);
                $hotelbook->setDebutF($_POST['debut_f']);
                $hotelbook->setFinF($_POST['fin_f']);
                $clienthotel->cin = $_POST['cin'];

                $stmt = $db->prepare("UPDATE booking SET id_f = ?, debut_f = ?, fin_f = ? WHERE cin = ?");
                $stmt->execute([$hotelbook->getIdF(), $hotelbook->getDebutF(), $hotelbook->getFinF(), $clienthotel->cin]);
            }
            ?>
        </div>
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
                
                'use strict';
                
                var winH = $(window).height();
                
                $('header').height(winH);  
                
                $('header .container > div').css('top', (winH / 2) - ( $('header .container > div').height() / 2));
                
                  
                $('.navbar ul.navbar-nav li a').on('click', function (e) {
                    
                    var getAttr = $(this).attr('href');
                    
                    
                    $('html').animate({scrollTop: $(getAttr).offset().top}, 1000);
                });
            })
        </script>
        
    </body>
</html>

