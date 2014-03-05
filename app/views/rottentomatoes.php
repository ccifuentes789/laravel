<html>
<head>
	<title>Rotten Tomatoes Results</title>
</head>
<body>
<h1> Rotten Tomatoes Results </h1>
<?php foreach($movies as $movie) :?>
	<p>

		<span style="font-size: 18px;"> <?php echo "<b>$movie->title</b>" ?></span> <br /> 
		<b>Rating: </b>
		<?php echo $movie->mpaa_rating ?> <br />

		<b>Year: </b>
		<?php echo $movie->year ?> <br />

		<b>Runtime: </b>
		<?php echo $movie->runtime ?> minutes <br />

	


	</p>

<?php endforeach; ?>

</body>

</html>