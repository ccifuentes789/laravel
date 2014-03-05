<?php foreach($movies as $movie) :?>
	<p>

		<span style="font-size: 18px;"> <?php echo "<b>$movie->title</b>" ?></span> <br /> 
		<b>Rating: </b>
		<?php echo $movie->mpaa_rating ?> <br />

		<b>Year: </b>
		<?php echo $movie->year ?> <br />

		<b>Runtime: </b>
		<?php echo $movie->runtime ?> minutes <br />
<!--
		<b>Rating: </b>
		<?php/* echo $movie->ratings->critics_rating */?> <br /> -->


	</p>

<?php endforeach; ?>