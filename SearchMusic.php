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

				// hook up HTML vars to PHP vars and check to see if music exists
				// search by title
				if (!empty($_POST["title"])){
					$title = mysql_real_escape_string($_POST["title"]);
					$titleexists = mysql_query("SELECT * FROM musiclibrary.SHEET_MUSIC WHERE Title = '$title'");
					if($titleexists) {
						// if music exists, display MusicID and Title
						$query1 = "SELECT * FROM musiclibrary.SHEET_MUSIC WHERE Title = '$title'";
						$result1 = mysql_query($query1);
						echo "<h2>Search Results for '".$title."':</h2><br>";
						echo "<table class='table table-striped'><thead><tr><th>MusicID</th><th>Title</th><th>Composer</th></tr></thead><tbody>";
						while($row = mysql_fetch_array($result1)) {
							echo "<tr><td>".$row["MusicID"]."</td><td>".$row["Title"]."</td><td>".$row["COMPFirst"]." ".$row["COMPLast"]."</td></tr>";
						}
						echo "</table>";
					} else {
						// if music does not exist, spit out error message
						echo "'$title' does not exist!";
					}
				}
				
				// search by ID
				if (!empty($_POST["id"])){
					$id = mysql_real_escape_string($_POST["id"]);
					$idexists = mysql_query("SELECT * FROM musiclibrary.SHEET_MUSIC WHERE MusicID = '$id'");
					if($idexists) {
						$query2 = "SELECT * FROM musiclibrary.SHEET_MUSIC WHERE MusicID = '$id'";
						$result2 = mysql_query($query2);
						echo "<h2>Search Results for '".$id."':</h2><br>";
						echo "<table class='table table-striped'><thead><tr><th>MusicID</th><th>Title</th><th>Composer</th></tr></thead><tbody>";
						while($row = mysql_fetch_array($result2)) {
							echo "<tr><td>".$row["MusicID"]."</td><td>".$row["Title"]."</td><td>".$row["COMPFirst"]." ".$row["COMPLast"]."</td></tr>";
						}
						echo "</table>";
					} else {
						echo "Music ID $id does not exist!";
					}
				}
			?>

		<!-- home button -->
		<br><a href='Home.php'> Return to homepage</a><br></br>

		</div>
	</body>
</html>