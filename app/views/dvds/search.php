<?php
/*
$genres = DB::table('genres')->get();
var_dump($genres);*/
?>

<!doctype html>
<html>

<head>
    <title>DVD Search</title>
</head>
<body>
<form method="get" action="/dvds">
    <h1>DVD Search</h1>
    <div>
DVD Title:
    <input type="text" name="dvd_title"/>
    </div>

    <div>
Genre:
    <select name="genre">
        <option>All</option>
        <?php
        $genres = DB::table('genres')->get();

           foreach($genres as $genre){
                echo "<option> $genre->genre_name</option>";
            }

        ?>


    </select>
    </div>

    <div>
        Rating:
        <select name="rating">
            <option>All</option>
            <?php
            $ratings = DB::table('ratings')->get();

            foreach($ratings as $rating){
                echo "<option> $rating->rating_name</option>";
            }

            ?>


        </select>
    </div>

    <div>
    <input type="submit" value="Search"/>
    </div>
</form>

</body>

</html>
