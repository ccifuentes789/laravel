<?php
class DVDController extends BaseController{
    public function search(){
        return View::make('dvds/search');
    }

    public function listDVDs(){
        $dvd_title = Input::get('dvd_title'); //$_GET['song_title']
        $genre = Input::get('genre');
        $rating = Input::get('rating');

        // dd($artist);
        $dvds = Dvd::search($dvd_title, $genre, $rating);
        /*
        var_dump($songs);
        die();*/
        // dd($songs);//equivalent to above commented code: dumb and die
        return View::make('dvds/dvd-list', [
            'dvds' =>$dvds
        ]);
    }

}