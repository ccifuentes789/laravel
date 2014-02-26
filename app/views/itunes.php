<?php foreach($songs as $song) :?>
	<p>
		<?php echo $song->trackName ?>
		by
		<?php echo $song->artistName ?>
	</p>

<?php endforeach; ?>