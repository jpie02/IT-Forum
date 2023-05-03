<?php
	include('db_connect.php');
	$id = $_GET['id'];
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
		<title>Forum informatyczne</title>
		<meta charset="utf-8">
		<link rel="icon" href="logo.jpg">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>	
<?php

            	$sql = "SELECT id, tytul, post, author, data FROM posty where id='".$id."'";
						$result = $mysqli->query($sql);
						if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						echo "<br>";
						echo "<br>";
						echo "<br>";
						echo "<br>";
						echo "<br>";
						echo "<a class='title_post'>".$row["tytul"]."</a>";
						echo "<br>";
						echo "<br>";
						echo "<a class='author_post'>Autor: ".$row["author"]."</a>";
						echo "<a class='data_post'>".$row["data"]."</a>";
						echo "<br>";
						echo "<br>";
						echo "<br>";
						echo "<a class='post_post'>".$row["post"]."</a>";
						}
						} else { echo "Brak postów"; }



			if(isset($_POST['dodaj_komentarz'])) {
			$comment = $_POST['comment'];
			

			$sql2 = "insert into comments (username, comment, post_id) values ('".$_SESSION["username"]."', '".$comment."', '".$id."')";
			$kwerenda = mysqli_query($mysqli,$sql2);

			if($kwerenda) {
			header("location: http://jpie2018.s.zs1.stargard.pl/topic.php?id=".$id);
            exit();
			}else{
			echo "FAIL";
				}
			}
     
		?>
		<center>
		<form action="topic.php" method="POST">
			<br>
			<br>
		   <a class="komentarze_top">Komentarze:</a>
		   <br>
		   <br>
		   <textarea id="comment_input" type="text" name="comment" placeholder="Dodaj komentarz..."></textarea>
		   <br>
		   <br>
		   <br>
		   <input class="dodaj_komentarz" type="submit" value="Wyślij" name="dodaj_komentarz" >
		</form>
		</center>
		<?php
		$sql3 = "SELECT username, comment, post_id, czas FROM comments";
						$result2 = $mysqli->query($sql3);
						if ($result2->num_rows > 0) {
						while($row2 = $result2->fetch_assoc()) {
						echo "<a class='username_post'>Autor: ".$row2["username"]."</a>";
						echo "<a class='czas_post'>".$row2["czas"]."</a>";
						echo "<br>";
						echo "<br>";
						echo "<a class='komantarz_post'>".$row2["comment"]."</a>";
						echo "<br>";
						echo "<br>";
						}
						} else {
						echo "<br>";
						echo "<br>"; 
						echo "<center class='brak'>Brak komentarzy</center>"; }
		?>

	</body>
</html>