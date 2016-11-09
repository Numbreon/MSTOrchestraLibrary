<!DOCTYPE html>
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
			<img src="http://i63.tinypic.com/qzojtv.png" alt="Banner" style="width: 75%; padding-bottom: 20px;" />

			<!--Search bar for music search by title-->
			<form action="SearchMusic.php" method="post"> Search music by title:
			<input type="text" name="title">
			<input type="submit" value="Search">  
			</form>
			<br>

			<!--Search bar for music search by id-->
			<form action="SearchMusic.php" method="post"> Search music by ID:
			<input type="text" name="id">
			<input type="submit" value="Search">  
			</form>
			<br>

			<!--Dropdown to search the music catalog by ensemble-->
			<div class="container">
				<form action="Catalog.php" method="post">
				<select name = "ensemble">
				    <option value="Marching">Marching Band</option>
				    <option value="Concert">Concert Band</option>
				    <option value="Wind">Wind Symphony</option>
				    <option value="Symphony">Symphony Orchestra</option>
				    <option value="Chamber">Chamber Orchestra</option>
				</select>
				<input type="submit" value="Search Catalog">
				</form>
			</div>
		</center>

		<br></br>

		<!--Dropdown to add/delete/modify the music catalog-->
		<div class="container">
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Admin Area
				<span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="AddMusForm.html">Add Sheet Music</a></li>
					<li><a href="AddRecForm.html">Add Recording</a></li>
					<li><a href="DeleteForm.html">Delete Music</a></li>
					<li><a href="ModifySelect.php">Modify Music</a></li>
				</ul>
			</div>
		</div>

		<!--Button to check out music/recordings-->
		<div class="container">
			<a href="#" class="btn btn-default" role="button">Music Checkout (WIP)</a>
		</div>

		<br></br>

	</body>
</html>

<?php
?>