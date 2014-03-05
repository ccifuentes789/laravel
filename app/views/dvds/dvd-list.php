<!doctype html>
<html>

<head>
    <title>My DVDs</title>
</head>
<body>
<h1>My DVDs</h1>
<div class = "dvd">
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Rating</th>
            <th>Genre</th>
            <th>Label</th>
            <th>Sound</th>
            <th>Format</th>
            <th>Release Date</th>
        </tr>
<?php foreach ($dvds as $dvd) : ?>
        <?php echo "<tr>" ;?>

        <?php echo "<td>" . $dvd->title . "</td>" ;?>
        <?php echo "<td>" . $dvd->rating->rating_name . "</td>"; ?>
        <?php echo "<td>" . $dvd->genre->genre_name . "</td>"; ?>
        <?php echo "<td>" . $dvd->label->label_name . "</td>"; ?>
        <?php echo "<td>" . $dvd->sound->sound_name . "</td>"; ?>
        <?php echo "<td>" . $dvd->format->format_name . "</td>"; ?>
        <?php echo "<td>" . $dvd->release_date . "</td>"; ?>

        <?php echo "</tr>" ;?>
<?php endforeach; ?>
    </table>
</div>
</body>

</html>