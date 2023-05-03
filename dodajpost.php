<?php
	require('db_connect.php');
?>
<html>
<div class="navbar">
	<?php
	if(@_SESSION["username"]) {
		echo "<a>" . "Zalogowano jako ".$_SESSION["username"] . "</a>";
	}else{
		echo "Nie działa";
	}
	?>
  <a href="forum.php">Strona główna</a>
  <a href="dodajpost.php">Dodaj nowy post</a>
  <a href="index.php?ction=logout">Wyloguj się</a>
</div>
	<head>
		<title>Forum Informatyczne</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
		<link rel="icon" href="logo.jpg">
	</head>	
	<br>
	<br>
	<br>
	<br>
	<center>
		<form action="dodajpost.php" method="POST">
			<br>
			<br>
		   <a class="temat">Temat:</a>
		   <br>
		   <br>
		   <input id="tytulposta" type="text" name="tytul">
		   <br>
		   <br>
		   <br>
		   <br>
		   <a class="tresc">Treść posta:</a>
		   <br>
		   <br>
		   <textarea id="post" type="text" name="post"></textarea>
		   <br>
		   <br>
		   <br>
		   <input class="dodaj_post" type="submit" value="Wyślij" name="dodaj" >
		</form>
	</center>
<?php
	
		if(isset($_POST['dodaj'])) {
		$tytul = $_POST['tytul'];
		$post = $_POST['post'];

		$sql = "insert into posty (tytul, post, author) values ('".$tytul."', '".$post."', '".$_SESSION["username"]."')";

		$query = mysqli_query($mysqli,$sql);
		if($query) {
			header('location: forum.php');
            exit();
		}else{
			echo "FAIL";
		}
	}
?>
</html>
