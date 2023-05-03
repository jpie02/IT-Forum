<html lang="pl-PL">
   <head>
      <meta charset="utf-8">
      <link rel="icon" href="logo.jpg">
      <title>Forum Informatyczne</title>
      <style>
         body {
            padding-top: 300px;
            padding-bottom: 40px;
            background-color: #4B4E6D;
         }
         
         .form-signin {
            max-width: 330px;
            margin: 0 auto;
            color: #FFFF;
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
            font-weight: 300;
            font-size: 15px;
         }
         
         .form-signin-heading {
            padding: 0px;
            text-align: center;
         }

         .form-signin,
         .form-signin .checkbox {
            margin-bottom: 0px;
            text-align: center;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin input[type="username"] {
            margin-bottom: 10px; 
         }
         
         .form-signin input[type="password"] {
            margin-top: 10px;
         }
       
         .button-zarejestruj {
            margin-bottom: 10px;
            margin-top: 20px;
            margin-left: 5px;
            color: #626262;
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
            font-weight: 300;
            font-size: 18px;
            text-align: center;
            font-weight: bold;
            padding: 5px;
         }

         h2 {
            color: #ffff;
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
            font-weight: 300;
            font-size: 70px;
            margin-top: -20px;
            margin-bottom: 40px;
            text-align: center;
            font-weight: bold;
         }

          a {
            color: #ffff;
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
            font-weight: 300;
            font-size: 20px;
            font-weight: bold;
            margin-left: 750px;
            margin-top: -140px;
            margin-bottom: -120px;
         }
         
      </style>
   </head>
   <body>
      <h2>Rejestracja</h2> 
      <div class = "container form-signin">
     
   <?php include('db_connect.php');?>

   <?php

        $msg = '';
        if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($mysqli,$_POST['username']);
        $password = mysqli_real_escape_string($mysqli,$_POST['password']);
  
  $user_check = "select count(*) as cntUser from users where username='".$username."'";
  $result = mysqli_query($mysqli,$user_check);
  $row = mysqli_fetch_array($result);

  $count = $row['cntUser'];

        if($count > 0){
            header('location: rejestracja.php');
            exit();
        }
        else {
            header('location: rejestracja_success.html');

            $sql = "INSERT INTO users (username, password) VALUES ('".$username."', '".$password."')";
            if(mysqli_query($mysqli, $sql)){
                header('location: rejestracja_success.html');
            }
            else {
                echo "BŁAD: $sql. " . mysqli_error($link);
            }
        }
        exit();
    }
      ?>
      </div>
      <a>Ta nazwa użytkownika jest już zajęta</a>
      <br>
      <br>
      <br>
      <div class = "container">
         <form class = "form-signin" role = "form" 
            action = "<?php echo $_SERVER['PHP_SELF']; 
            ?>" method = "post">
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "Podaj nazwę użytkownika" 
               required autofocus>
            <input type = "password" class = "form-control" name= "password"
               id = "password" placeholder = "Podaj hasło" required>
            <input type = "password" class = "form-control" name= "repeat_password"
               id = "repeat_password" placeholder = "Potwierdź hasło" required>
            <script>
                var password = document.getElementById("password") ,
                confirm_password = document.getElementById("repeat_password");

                function validatePassword(){
                  if(password.value != repeat_password.value) {
                    repeat_password.setCustomValidity("Hasła nie pasują do siebie");
                  } else {
                    repeat_password.setCustomValidity('');
                    }
                  }
                  password.onchange = validatePassword;
                  repeat_password.onkeyup = validatePassword;
            </script>
            <br>
            <button type= "submit" class = "button-zarejestruj" name = "submit">Rejestracja</button>
            </form>
            <br>
      </div> 
   </body>
</html>