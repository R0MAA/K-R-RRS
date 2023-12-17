<?php
$page_title="Registration Form";

?>
<style>
html,
body {
  margin: 0;
  background: #163832;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  font-family: "Roboto Mono", monospace;
  color: #ffffff;
}

form {
  margin-bottom: 20%;
}

input {
  text-align: center;
  border-radius: 20px;
  display: flex;
  min-height: 50px;
  min-width: 300px;
  color: #96620e;
  background: linear-gradient(to right, #ffffff 50%, #1d3737 50%);
  background-size: 200% 100%;
  background-position: right bottom;
  transition: all 0.5s ease;
  border-style: solid;
  border-color: #96620e;

  submit{
  text-align: center;
  padding-top: 60px;
}

}

input::placeholder {
  color: #96620e;
}

input:focus {
  background-color: #96620e;
  color: #1d3737;
  background-position: left bottom;
  outline: none;
}

select {
  text-align: center;
  border-radius: 20px;
  display: flex;
  min-height: 50px;
  min-width: 300px;
  color: #96620e;
  background: linear-gradient(to right, #ffffff 50%, #1d3737 50%);
  background-size: 200% 100%;
  background-position: right bottom;
  transition: all 0.5s ease;
  border-style: solid;
  border-color: #96620e;
}

select::placeholder {
  color: #96620e;
}

select:focus {
  background-color: #96620e;
  color: #1d3737;
  background-position: left bottom;
  outline: none;
}

.field {
  margin: 20px;
}

button {
  font-size: large;
  padding: 15px 100px 15px;
  border-radius: 30px;
  border: 1px solid #96620e;
  background: #1d3737  ;
  color:#96620e;
  cursor: pointer;
  outline: none;
  transform: scaleX(1);
  transition: 0.5s all ease;
}

.submit-button {
  text-align: center;
  padding-top: 60px;
}

.logo{
  text-align: center;
}
.link{
  color: #b05235;
}
 
    </style>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-md-6">
                <div class="card">
                    <div class="card-shadow"></div>
                    <div class="card body">
                        <form id="form_registration">

                        <div class="logo"> 
                        <a href="home.php"><img src="7.png" height="180px"></a>
                        </div>

                        <input type="hidden" name="type" id="type" value = "insert">
                                <div class="field">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                                </div>
                                <div class="field">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                                </div>
                                <div class="field">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter E-mail Address">
                                </div>
                                <div class="field">
                                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number">
                                </div>
                                <div class="field">
                                    <select name="position" id="position" placeholder="Choose Position">
                                        <option value="Master">Master</option>
                                        <option value="Alipin">Aliping Saguiguilid</option>
                                        <option value="Alipin">Aliping Namamahay</option>
                                        <option value="Alipin">Alipin mo kahit hindi bati</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <input type="text" name="password" id="password" class="form-control" placeholder="Enter password">
                                </div>

                                 <div class="field">
                                 <input type="submit" class="btn btn-primary" id = "btnAddNewRecord" value = "Register">
                                </div>

                                <div class="field">
                                    <p>Already have an account? <a href="adminlogin.php" class="link">Log-in</a></p>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
<script>
$(document).ready(function() {
$("#form_registration").submit(function(event) {
  event.preventDefault(); //prevent submit
  var form = $(this);

    $.ajax({
        type: "POST",
        cache: false,
        url: 'process_users.php',
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
