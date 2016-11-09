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
			<h2>Delete Music</h2><br>
		</center>

		<div class="container" style="left-padding: 20px;">
			<?php
				// Variables used to connect to the databse
				$servername = "localhost";
				$database="musiclibrary";
				$username ="root";
				$password = "";

				// Connection to localhost
				$link = mysql_connect($servername, $username, $password);
				// Connection to MusicLibrary
				$db_selected = mysql_select_db($database, $link);

				// hook up HTML vars to PHP vars and check to see if music exists
				// deleting sheet music
				if (!empty($_POST["musid"])){
					$musid = $_POST["musid"];
					$temp = sprintf("SELECT * FROM musiclibrary.SHEET_MUSIC WHERE MusicID = '%s'", mysql_real_escape_string($musid));
					$musidexists = mysql_query($temp);
					if($musidexists) {
						// if music exists, check foreign key constraint
						$temp2 = sprintf("SELECT * FROM musiclibrary.BORROWS WHERE MID = '%s'", mysql_real_escape_string($musid));
						$mborrowed = mysql_query($temp2);
						if($mborrowed) {
							echo "Music ID $musid is currently being borrowed. Cannot delete $musid.<br><br>";					
						} else {
							$musdelete = sprintf("DELETE FROM musiclibrary.SHEET_MUSIC WHERE MusicID = '%s'", mysql_real_escape_string($musid));
							$result = mysql_query($musdelete);
							echo "Deleted Music ID $musid successfully!<br><br>";
						}
					} else {
						// if music does not exist, spit out error message
						echo "MusicID $musid does not exist!";
					}
				}

				// deleting recording
				if (!empty($_POST["recid"])){
					$recid = $_POST["recid"];
					$temp3 = sprintf("SELECT * FROM musiclibrary.RECORDING WHERE RecordingID = '%s'", mysql_real_escape_string($recid));
					$recidexists = mysql_query($temp3);
					if($recidexists) {
						$temp4 = sprintf("SELECT * FROM musiclibrary.BORROWS WHERE RID = '%s'", mysql_real_escape_string($recid));
						$rborrowed = mysql_query($temp4);
						if($rborrowed) {
							echo "Recording ID $recid is currently being borrowed. Cannot delete $recid.<br><br>";					
						} else {
							$recdelete = sprintf("DELETE FROM musiclibrary.RECORDING WHERE RecordingID = '%s'", mysql_real_escape_string($recid));
							$result2 = mysql_query($recdelete);
							echo "Deleted Recording ID $recid successfully!<br><br>";
						}
					} else {
						echo "Recording ID $recid does not exist!";
					}
				}
			?>

			<!-- home button -->
			<br><a href='Home.php'> Return to homepage</a><br></br>

		</div>
	</body>
</html>