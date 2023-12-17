<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>K&R Restaurant</title>

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="https://res.cloudinary.com/abdel-rahman-ali/image/upload/v1535988515/rosa-favicon.png">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
    <!--Fonts-->

    <!--FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!--FontAwesome-->

    <link rel="stylesheet" href="home.css">
</head>

<body>

<!--nav-->
<nav>
            <div class="logo">
              <a href="home.php"><img src="5.png" alt="K&R Logo" width="150px" margin="0px"></a>
            </div>
          <div class="navigation-bar">
              <ul>
                  <li class="active"><a href="home.php">Home<span class="underline"></span></a></li>
                  <li><a href="menu.php">Menu<span class="underline"></span></a></li>
                  <li><a href="reserv.php">Reservations<span class="underline"></span></a></li>
                  <li><a href="code.php">Log_in<span class="underline"></span></a></li>
              </ul>
          </div>
      </nav>
<!--nav-->

<!--header-->
<header>      
  <div class="text">
          <h2>Welcome to</h2>
          <h1>K&R</h1>
          <div class="arrow">
              <span class="left"></span>
              <i class="fas fa-asterisk"></i>
              <span class="right"></span>
          </div>
          <span>Keen & Ravish</span>
      </div>
      
  </header>
  <!--End Header-->

<div class="content">
    <?php
    require 'connection.inc.php';

    $sql_content = "SELECT * FROM webcontent ORDER BY id ASC";
    $result_content = mysqli_query($conn, $sql_content);

    mysqli_close($conn);
    ?>
    <!-- Main content -->
      
                  <?php
                  if (mysqli_num_rows($result_content) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result_content)) { ?>

<!--start About Us-->
<div class="about-us">
      <div class="text">
          <h2><?php echo $row["heading"]; ?></h2>
          <h3><?php echo $row["subheading"]; ?></h3>
          <div><i class="fas fa-asterisk"></i></div>
          <?php echo $row["content"]; ?>
          <div><a class="a-CTA" href="home.php">About Us</a></div>
      </div>
      <div class="image-container">
          <div class="image image1">
              <img src="food1.png" alt="Food Photo">
          </div>
          <div class="image image2">
              <img src="food2.png" alt="Food Photo">
          </div>
      </div>
  </div>
  <!--End About Us-->

 <!--start Recipes-->
  <div class="recipes">
      <div class="image"></div>
      <div class="text">
          <h2>Tasteful</h2>
          <h3>Recipes</h3>
      </div>
  </div>
  <!--End Recipes-->

  <!--start Menu-->
  <div class="menu">
      <div class="box-model">
          <i class="fas fa-times fa-2x close"></i>
          <div class="arrow">
              <div class="arrow arrow-right"></div>
              <div class="arrow arrow-left"></div>
          </div>
          <div class="box-image-container">
              <div class="box-image">
                  <img src=""  alt="Food Photo">
              </div>
          </div>
      </div>
      <div class="menu-image-container">
          <div class="image active">
              <img src="menu3.png" alt="Food Photo">
          </div>
          <div class="image">
              <img src="menu1.png" alt="Food Photo">
          </div>
          <div class="image">
              <img src="menu2.png" alt="Food Photo">
          </div>
          <div class="image">
              <img src="menu4.png" alt="Food Photo">
          </div>
      </div>
      <div class="text">
          <h2><?php echo $row["heading2"]; ?></h2>
          <h3><?php echo $row["subheading2"]; ?></h3>
          <div><i class="fas fa-asterisk"></i></div>
          <?php echo $row["content2"]; ?>
          <div><a class="a-CTA" href="menu.php">View The Full Menu</a></div>
      </div>
  </div>
  <!--End Menu-->

    <!--Start fixed-image-->
    <div class="fixed-image">
      <div class="text">
          <h2>The Perfect</h2>
          <h3>Blend</h3>
      </div>
  </div>
  <!--End fixed-image-->

  <!--start Reservsation-->
  <div class="reservation">
      <div class="text">
          <h2><?php echo $row["heading3"]; ?></h2>
          <h3><?php echo $row["subheading3"]; ?></h3>
          <div><i class="fas fa-asterisk"></i></div>
          <?php echo $row["content3"]; ?>
          <div><a class="a-CTA" href="reserv.php">Make a Reservation</a></div>
      </div>
      <div class="image-container">
          <div class="image image1">
              <img src="food3.png" alt="Food Photo">
          </div>
          <div class="image image2">
              <img src="food4.png" alt="Food Photo">
          </div>
      </div>
  </div>
  <!--End Reservation-->
                        
                    <?php 
                     }
                  }
                  ?>

  <!--Start Footer-->
  <footer>
      <div class="text">
          <h2>ABOUT K&R</h2>
          <div><i class="fas fa-asterisk"></i></div>
          <p>At K&R Restaurant, we value your time and strive to make the reservation process as smooth as possible, leaving you free to anticipate the exceptional dining experience that awaits. Join us in savoring the moment, and let our reservation system enhance every aspect of your visit to our restaurant.</p>
      </div>
      <div class="contact-container">
        <div class="social-media">
            <h3>Follow Along</h3>
            <div class="links">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-square"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
          <div class="newsletter">
            <h4>Write a Review</h4>
              <form id = "form_new">
            <div class="modal fade" id="modal-add-new">
                  <div class="modal-body">
                    <input type="hidden" name="type" id="type" value = "insert">
                    
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name"><br>
                    
                      <br><input type="text" class="form-control" name="email" id="email" placeholder="E-mail"><br>
                   
                      <br><input type="tel" class="form-control" name="contact" id="contact" placeholder="Phone Number"><br>
                    
                      <br><input type="text" class="form-control" name="message" id="message" placeholder="Review"><br>
                    
                    <br><input type="submit" class="btn btn-primary" id = "btnAddNewRecord" value = "Submit Review">
                  
            </div>
            <!-- /.modal -->
</form>
          </div>
      </div>
  </footer>
<!--End Footer-->

<!--Start Copy-Right-->
<div class="copyright">
      <svg class="svg-up" width="192" height="61" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 160.7 61.5" enable-background="new 0 0 160.7 61.5" xml:space="preserve"><path fill="#262526" d="M80.3,61.5c0,0,22.1-2.7,43.1-5.4s41-5.4,36.6-5.4c-21.7,0-34.1-12.7-44.9-25.4S95.3,0,80.3,0c-15,0-24.1,12.7-34.9,25.4S22.3,50.8,0.6,50.8c-4.3,0-6.5,0,3.5,1.3S36.2,56.1,80.3,61.5z"></path></svg>
      <a href="home.php"><i class="fas fa-angle-double-up arrow-up"></i></a>
      <ul class="info">
          <li>&copy; K&R 2023</li>
          <li>13 Hanway Square, London</li>
          <li>Tel: 71494563</li>
          <li>Handcrafted with love by <a href="#">K&R</a> Team</li>
      </ul>
      <ul class="CTA">
          <li><a href="#">PERMISSIONS AND COPYRIGHT</a></li>
          <li><a href="#">CONTACT THE TEAM</a></li>
      </ul>
  </div>
  <!--End Copy-Right-->

                </body>

<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
$("#form_new").submit(function(event) {
  event.preventDefault(); //prevent submit
  var form = $(this);


    $.ajax({
        type: "POST",
        cache: false,
        url: 'process_reviews.php',
        data: form.serialize(),
        success:function(data){
          var response_data = JSON.parse(data);
          
          if (response_data.title == 'Success') {
                        Swal.fire({
                            title: response_data.title,
                            text: response_data.message,
                            icon: 'success',
                            timer: 2000,
                            timerProgressBar: true
                        })
                        setTimeout(function(){location.reload();},2000);
                    } else {
                        Swal.fire('Error!', response_data.message, 'error');
                    }

        }
      });

});
});
</script>

</html>