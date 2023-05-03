<?php
	include('db_connect.php');
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
	<body>
		<br>
		<br>
		<br>
		<br>
		<img id="logo" src="logo.png" alt="Logo">
		<h3>Forum Informatyczne</h3>
		<br>
		<br>
			<main>
				<center>
			       <table>
					<tr>
					<th class='tabela'>Tytuł</th>
					<th class='tabela'>Autor</th>
					<th class='tabela'>Data</th>
					</tr>
	               <?php
						$sql = "SELECT id, tytul, post, author, data FROM posty order by id desc limit 100";
						$result = $mysqli->query($sql);
						if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						$id = $row["id"];
						//$_SESSION["komentarze"] = $id;
						echo "<tr><span class='tabela'><td><a class='linki' href='topic.php?id=".$row["id"]."'>" . $row["tytul"] . "</a></td><td>" . $row["author"] . "</td><td>" . $row["data"] . "</td></span></tr>";
						}
						echo "</table>";
						} else { echo "Brak postów"; }
						$mysqli->close();
	               ?>
	              </table>
	            </center>
	      	</main>
	</body>   
</html>