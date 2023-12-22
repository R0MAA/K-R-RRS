<?php

   if(isset($_COOKIE["code"])){
    setcookie('code', "", time()-0, "/","", 0);
   }

?>

<!DOCTYPE html>
<html lang="en">

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
  color: #dac1ad;
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
  color: #dac1ad;
  background: linear-gradient(to right, #ffffff 50%, #1d3737 50%);
  background-size: 200% 100%;
  background-position: right bottom;
  transition: all 0.5s ease;
  border-style: solid;
  border-color: #96620e;
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

<body>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<div class="logo"> 
<a href="home.php"><img src="7.png" height="180px"></a>
</div>
            <div class="field">

                <input class="textbox" type="password" name="code" placeholder="Enter Code"></br>
            </div>
            
            <div class="submit-button">
                <button id="button" type="submit">Submit</button>
            </div>
            
        </form>
        </div>
      
    <?php
        if(isset($_POST['code']) ){
            if($_POST['code'] === "12345678"){
                $user = ($_POST['username']);
                  
                setcookie('user', $user, time()+3600, "/","", 0);
                header("Location: /Dreamer/pages/admin/adminlogin.php");
            } 
        }
    ?>
</body>
</html>