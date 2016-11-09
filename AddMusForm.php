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
			<h2>Add Sheet Music</h2><br>
		</center>

		<div class="container" style="left-padding: 20px;">
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
				$musid = mysql_real_escape_string($_POST["id"]);
				$period = mysql_real_escape_string($_POST["period"]);
				$genre = mysql_real_escape_string($_POST["genre"]);
				$ensemble = mysql_real_escape_string($_POST["ensemble"]);
				$title = mysql_real_escape_string($_POST["title"]);
				$year = mysql_real_escape_string($_POST["year"]);
				$copies = mysql_real_escape_string($_POST["copies"]);
				$fname = mysql_real_escape_string($_POST["fname"]);
				$lname = mysql_real_escape_string($_POST["lname"]);
				
				// check to see if sheet music already exists
				$idexists = mysql_query("SELECT * FROM musiclibrary.SHEET_MUSIC WHERE MusicID = $musid");
				if($idexists) {
					echo "Music ID $musid already exists!";
				} else {
					$add = "INSERT INTO musiclibrary.SHEET_MUSIC (MusicID, TimePeriod, Genre, Title, YearComposed, NumPresent, COMPFirst, COMPLast, Ensemble) VALUES ('$musid', '$period', '$genre', '$title', '$year', '$copies', '$fname', '$lname', '$ensemble')";
					$result = mysql_query($add);
					echo "Added Music ID $musid successfully!<br><br>";			
				}
			?>

			<!-- home button -->
			<br><a href='Home.php'> Return to homepage</a><br></br>

		</div>
	</body>
</html>