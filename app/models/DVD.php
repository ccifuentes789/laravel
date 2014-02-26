<?php
/*
class DVD{
    public static function search($dvd_title, $genre, $rating){

        /*SELECT title, artist_name, DATE_FORMAT(added, '%b %d %Y %h:%i %p') AS added
            FROM songs
        INNER JOIN artists
        ON songs.artist_id = artists.id
         */
        /*$query = DB::table('dvds')
            ->select('title', 'genre_name', 'rating_name', 'sound_name', 'label_name', 'format_name', DB::raw("DATE_FORMAT(release_date, '%b %d %Y %h:%i %p') AS release_date"))
            ->join('genres', 'genres.id', '=', 'dvds.genre_id')
            ->join('labels', 'labels.id', '=', 'dvds.label_id')
            ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
            ->join('formats', 'formats.id', '=', 'dvds.format_id')
            ->join('ratings', 'dvds.rating_id', '=', 'ratings.id'); //order you put these things doesn't matter

        if($dvd_title){
            $query->where('title', 'LIKE', "%$dvd_title%");
        }

        if($genre!="All"){
            $query->where('genre_name', '=', "$genre");
        }
        if($rating!="All"){
            $query->where('rating_name', '=', "$rating");
        }
        $dvds = $query->get();
        return $dvds;
    }
}*/

class DVD extends Eloquent{
    public function title(){
        return $this->belongsTo('Title');
    }
    public function genre(){
        return $this->belongsTo('MGenre');
    }
    public function sound(){
        return $this->belongsTo('Sound');
    }
    public function rating(){
        return $this->belongsTo('Rating');
    }
    public function label(){
        return $this->belongsTo('Label');
    }
    public function format(){
        return $this->belongsTo('Format');
    }
    
}