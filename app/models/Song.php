<?php
/****
class Song{
    public static function search($song_title, $artist){

        /*SELECT title, artist_name, DATE_FORMAT(added, '%b %d %Y %h:%i %p') AS added
            FROM songs
        INNER JOIN artists
        ON songs.artist_id = artists.id
         */
      /*  $query = DB::table('songs')
            ->select('title', 'artist_name', 'genre', DB::raw("DATE_FORMAT(added, '%b %d %Y %h:%i %p') AS added"))
            ->join('artists', 'artists.id', '=', 'songs.artist_id')
            ->join('genres', 'songs.genre_id', '=', 'genres.id'); //order you put these things doesn't matter

        if($song_title){
            $query->where('title', 'LIKE', "%$song_title%");
        }
        if($artist){
            $query->where('artist_name', 'LIKE', "%$artist%");
        }
        $songs = $query->get();
        return $songs;
    }
}
*/

class Song extends Eloquent{
    public function artist(){
        return $this->belongsTo('Artist');
    }
    public function genre(){
        return $this->belongsTo('Genre');
    }
    public static function validate($input){
        return Validator::make(Input::all(), [
        'title' => 'required|min:4',
        'price' => 'required|numeric'

        ]);
    }
}