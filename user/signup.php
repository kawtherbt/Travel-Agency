<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Go Tours</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light text-capitalize">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="imgs/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show-menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="show-menu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><i class="far fa-user"></i></a>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>

    <div class="contact" id="contact">
        <div class="violet-overlay">
          <div class="container">
            <h2 class="text-center">Sign Up</h2>
            <div class="contact-form">
              <form id="signup-form" action="" method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="country" placeholder="Country" required>
                <input type="text" name="phone" placeholder="Phone" required>
                <input type="text" name="cin" placeholder="cin" required>
                <input type="date" name="date_n" placeholder="date_n" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <li class="nav-item">
                        <a class="nav-link" href="login.php">Already Have An Account. Log In</a>
                    </li>
               
                <input type="submit" value="Sign Up">
              </form>
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
            
            $('.navbar ul li a.search').on('click', function (e) {
                e.preventDefault();
            });
            $('.navbar a.search').on('click', function () {
                $('.navbar form').fadeToggle();
            });

            $('.navbar ul.navbar-nav li a').on('click', function (e) {
                
                var getAttr = $(this).attr('href');
                
                $('html').animate({scrollTop: $(getAttr).offset().top}, 1000);
            });
        })
    </script>



</body>
</html>

<?php

require_once '../database/config.php';
require_once '../models/ClientModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $country = $_POST['country'];
  $cin = $_POST['cin'];
  $date_n = $_POST['date_n'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $client = new ClientModel();

  $client->setName($name);
  $client->setPhone($phone);
  $client->setCountry($country);
  $client->setCin($cin);
  $client->setDate_n($date_n);
  $client->setEmail($email);
  $client->setPassword($password);

  
    
    $stmt = $db->prepare("INSERT INTO client (name, phone, country, cin, date_n, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$client->getName(), $client->getPhone(), $client->getCountry(), $client->getCin(), $client->getDate_n(), $client->getEmail(), $client->getPassword()]);

 
}

?>

