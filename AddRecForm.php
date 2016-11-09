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
			<h2>Add Recording</h2><br>
		</center>

		<div class="container" style="left-padding: 20px;">
			<?php
				// Variables used to connect to the databse
				$servername = "localhost";
				$database = "musiclibrary";
				$username = "root";
				$password = "";
					
				// Connection to localhost
				$link = mysql_connect($servername, $username, $password);
				// Connection to MusicLibrary
				$db_selected = mysql_select_db($database, $link);

				// hook up HTML vars to PHP vars
				$name = mysql_real_escape_string($_POST["name"]);
				$recid = mysql_real_escape_string($_POST["id"]);
				$producer = mysql_real_escape_string($_POST["producer"]);
				$year = mysql_real_escape_string($_POST["year"]);
				$format = mysql_real_escape_string($_POST["format"]);
				$copies = mysql_real_escape_string($_POST["copies"]);
				$ensemble = mysql_real_escape_string($_POST["copies"]);
				
				// check to see if recording exists
				$idexists = mysql_query("SELECT * FROM musiclibrary.RECORDING WHERE RecordingID = $recid");
				if($idexists) {
					echo "Recording ID $recid already exists!";
				} else {
					$add = "INSERT INTO musiclibrary.RECORDING (RecordingID, YearMade, Producer, FormatIn, TrackName, Ensemble, CNumPresent) VALUES ('$recid', '$year', '$producer', '$format', '$name', '$ensemble', '$copies')";
					$result = mysql_query($add);
					echo "Added Recording ID $recid successfully!<br><br>";
				}
			?>

			<!-- home button -->
			<br><a href='Home.php'> Return to homepage</a><br></br>

		</div>
	</body>
</html>