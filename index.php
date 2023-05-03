<html lang="pl-PL">
   <head>
      <meta charset="utf-8">
      <link rel="icon" href="logo.jpg">
      <title>Forum informatyczne</title>
      <style>
         body {
            padding-top: 300px;
            padding-bottom: 40px;
            background-image: url('bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
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
            margin-bottom: 5px;
            margin-top: 15px;
         }

         .button-login {
            margin-bottom: 10px;
            margin-top: 50px;
            color: #626262;
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
            font-weight: 300;
            font-size: 18px;
            text-align: center;
            font-weight: bold;
            padding: 5px;
         margin-left: -115px;
         }
         
         .button-zarejestruj {
            margin-bottom: 10px;
            margin-top: -46px;
            margin-left: 958px;
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

      </style>
   </head>
   <body>
      <h2>Zaloguj się</h2> 
      <div class = "container form-signin">
      <br>
      <br>
      <br>
      <?php include('db_connect.php'); ?>
         <?php
            $msg = '';
            if (isset($_POST['submit'])) {
        $login = mysqli_real_escape_string($mysqli,$_POST['username']);
        $password = mysqli_real_escape_string($mysqli,$_POST['password']);

        $sql_query = "select count(*) as cntUser from users where username='".$login."' and password='".$password."'";
        $result = mysqli_query($mysqli,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0) {
            @$_SESSION["username"] = $login;
            header('location: forum.php');
            exit();
        }
        else {
            header('location: strona_error.html');
            exit();
        }
    }
         ?>
      </div>
      <div class = "container">
         <form class = "form-signin"
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "Podaj nazwę użytkownika" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "Podaj hasło" required>
            <br>   
            <button class = "button-login" type = "submit" 
               name = "submit">Logowanie</button>
            <br>
         </form>
         <form>
            <input type="button" value="Rejestracja" class = "button-zarejestruj" onclick="window.location.href='rejestracja.php'"/>
         </form>
      </div> 
   </body>
</html>