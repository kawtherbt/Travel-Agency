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
                            <h1><span>Book Your Dream Stay:</span><br>Hotel Booking Made Easy!</h1>
                            <p></p>

                        </div>

                        

                    </div>


                </div>
            </div>
        </header>





        <div class="contact" id="contact">
            <div class="violet-overlay">
              <div class="container">
                <h2 class="text-center">Book Hotel</h2>
                <?php 
                  require '../database/config.php';
                  require '../models/BookingModel.php';
                  require '../models/ClientModel.php';
                  if (isset($_GET['id_h'])){
                    $id_h=$_GET['id_h'];

                    
                        $stmt=$db->prepare("SELECT * FROM hotel where id_h= :id_h");
                        $stmt->bindParam(':id_h', $id_h);
                        $stmt->execute();
                        $hotelDetails = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($hotelDetails) {

                        ?>

                            <div class="contact-form">
                            <form id="signup-form" action="" method="POST">
                                <input type="number" name="id_h" value="<?php echo $hotelDetails['id_h']; ?>" required>
                                <input type="number" name="cin" placeholder="Cin" required>
                                <input type="text" name="name" value="<?php echo $hotelDetails['name']; ?>" required>
                                <input type="text" name="location" value="<?php echo $hotelDetails['location']; ?>" required>
                                <input type="number" name="rooms_h" placeholder="Rooms Booked" required>
                                <input type="date" name="debut_h" placeholder="Check In" required>
                                <input type="date" name="fin_h" placeholder="Check Out" required>

                                <input type="submit" value="Book Hotel"><br>
                                <input type="submit" onclick=window.location.href="hotels.php" value="Return">

                            </form>
                            </div>
                        <?php
                        }
                    
                        }else {
                        echo "Invalid request. Hotel ID is missing.";
                        } if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $clienthotel=new ClientModel();
                            $hotelbook = new BookingModel();
                            $clienthotel->setCin($_POST['cin']);
                            $hotelbook->setIdH($_POST['id_h']);
                            $hotelbook->setDebutH($_POST['debut_h']);
                            $hotelbook->setFinH($_POST['fin_h']);
                            $hotelbook->setRoomsH($_POST['rooms_h']);
            
                            $stmt = $db->prepare("INSERT INTO booking (id_h,cin, debut_h, fin_h, rooms_h) VALUES (?,?, ?, ?, ?)");
                            $stmt->execute([$hotelbook->getIdH(),$clienthotel->getCin(), $hotelbook->getDebutH(), $hotelbook->getFinH(), $hotelbook->getRoomsH()]);
                        }
                    ?>

              </div>
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

