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

<!--nav-->
<nav>
            <div class="logo">
              <a href="home.php"><img src="5.png" alt="K&R Logo" width="150px" margin="0px"></a>
            </div>    
          <div class="navigation-bar">
              <ul>
                  <li><a href="home.php">Home<span class="underline"></span></a></li>
                  <li><a href="menu.php">Menu<span class="underline"></span></a></li>
                  <li class="active"><a href="reserv.php">Reservations<span class="underline"></span></a></li>
                  <li><a href="code.php">Log_in<span class="underline"></span></a></li>
              </ul>
          </div>
      </nav>
<!--nav-->
<header>
  <div class="text">
  <div class="contact-container">
  <div class="newsletter">
<form id="form_new">
 
  <h2>K&R Reservation Form</h2>
  <input type="hidden" name="type" id="type" value = "insert"><br>

    <br><label for="">Date</label>
    <input type="date" id="bagong_araw" name="bagong_araw" /><br>

    <br><label for="">Time</label>
    <input type="time" id="bagong_oras" name="bagong_oras"/><br>

    <br><label for="">No. of pax</label>
    <input type="text" id="table_id" name="table_id"/><br>

    <br><label for="">Fullname</label>
    <input type="text" id="name" name= "name"/><br>

    <br><label for="contactNumber">Contact Number</label>
    <input type="tel" id="contact" name="contact"/><br>

    <br><label for="">Email</label>
    <input type="email" id="email" name="email"/><br>

    <br><input type="submit" class="btn btn-primary" id = "btnAddNewRecord" value = "Add New Reservation">
 
</form>

</div>
</div>
</div>
</header>

<!--Start Copy-Right-->
<div class="copyright">
      <svg class="svg-up" width="192" height="61" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 160.7 61.5" enable-background="new 0 0 160.7 61.5" xml:space="preserve"><path fill="#262526" d="M80.3,61.5c0,0,22.1-2.7,43.1-5.4s41-5.4,36.6-5.4c-21.7,0-34.1-12.7-44.9-25.4S95.3,0,80.3,0c-15,0-24.1,12.7-34.9,25.4S22.3,50.8,0.6,50.8c-4.3,0-6.5,0,3.5,1.3S36.2,56.1,80.3,61.5z"></path></svg>
      <a href="reserv.php"><i class="fas fa-angle-double-up arrow-up"></i></a>
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

<!-- SweetAlert2 -->
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
        url: 'process_reservations.php',
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