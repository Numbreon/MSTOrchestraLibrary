<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<title>The Missouri S&T Instrumental Music Library</title>
	</head>

	<body>
		<center>		
			<!--Title Banner-->
			<a href="Home.php"><img src="http://i63.tinypic.com/qzojtv.png" alt="Banner" style="width: 75%; padding-bottom: 20px;"/></a>
			<h2>Modify Music</h2><br>
		</center>
		<?php
			// Variables used to connect to the databse
			$servername = "localhost";
			$database = "musiclibrary";
			$username ="root";
			$password = "";

			// Connection to localhost
			$link = mysql_connect($servername, $username, $password);
			// Connection to MusicLibrary
			$db_selected = mysql_select_db($database, $link);

			// hook up HTML vars to PHP vars
			$musselect = mysql_real_escape_string($_POST["choice"]);
		?>

		<div class="container" style="left-padding: 20px;">
			Modifying for <?php echo "'$musselect'" ?>. Please fill in all fields.
			<br></br>
			<!--Form Start-->
			<form action="Modified.php" method="post">
				Music Title: <input type="text" name="title" required><br>
				Music ID: <input type="text" name="id" required><br>
				Composer Name:
				<div class="container" style="left-padding: 20px;">
					First: <input type="text" name="fname">
					Last: <input type="text" name="lname" required>
				</div>
				Arranger Name: <input type="text" name="arranger"><br>
				Year: <input type="text" name="year"><br>
				Genre: <br>
				<div class="container" style="left-padding: 20px;">
					<input type="checkbox" name="genre" value="Baroque"> Baroque <br>
					<input type="checkbox" name="genre" value="Classical"> Classical <br>
					<input type="checkbox" name="genre" value="Soundtrack"> Soundtrack <br>
					<input type="checkbox" name="genre" value="Contemporary"> Contemporary <br>
				</div>
				Time Period: <br>
				<div class="container" style="left-padding: 20px;">
					<input type="radio" name="period" value="18th century"> 18th century<br>
					<input type="radio" name="period" value="19th century"> 19th century<br>
					<input type="radio" name="period" value="20th century"> 20th century<br>
					<input type="radio" name="period" value="21st century"> 21st century<br>
				</div>
				Ensemble: <br>
				<div class="container" style="left-padding: 20px;">
					<input type="radio" name="ensemble" value="Marching"> Marching Band<br>
					<input type="radio" name="ensemble" value="Concert"> Concert Band <br>
					<input type="radio" name="ensemble" value="Wind"> Wind Symphony <br>
					<input type="radio" name="ensemble" value="Symphony"> Symphony Orchestra<br>
					<input type="radio" name="ensemble" value="Chamber"> Chamber Orchestra<br>
				</div>
				Number of Copies: <input type="text" name="copies" required><br>
				<!--Submit Button-->
				</br>Update <input type="submit" name="choice" value="<?php echo "$musselect" ?>">  
			</form>

			<!-- Home Button -->
			<br><a href='Home.php'> Return to homepage</a><br></br>
		</div>

	</body>
</html>