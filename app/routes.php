<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/songs/search', 'SongController@search');
Route::get('/songs','SongController@listSongs');
/**** FOR DVD  ****/
Route::get('/dvds/search', 'DVDController@search');
Route::get('/dvds', 'DVDController@listDVDs');

/*
Route::get('create-song', function(){
    $song = new Song();
    $song->title = 'Sound of winter';
    $song->artist_id = 25;
    $song->genre_id = 1;
    $song->price = 0.99;
    $song->save();
    dd($song);
});*/

Route::get('/songs/create', function(){
    $artists = Artist::all();
    $genres = Genre::all();
    return View::make('songs/create', [
        'artists'=> $artists,
        'genres'=>$genres
    ]);
});

Route::post('songs', function(){
    $song = new Song();
    $song->title = Input::get('title');
    $song->artist_id =Input::get('artist');
    $song->genre_id = Input::get('genre');
    $song->price = Input::get('price');
    $song->save();
    return Redirect::to('songs/create')
        ->with('success', 'Yay!');
});
Event::listen('illuminate.query', function($sql){
    echo "<div style='color:red'>$sql </div>";
});

/**
 * Lazy Loading
 * N + 1 PROBLEM
 */
Route::get('songs', function(){
    $songs = Song::take(5)->get();
    foreach($songs as $song){
        var_dump($song->artist->toArray());
    }
    //dd($songs->toArray());

});
/*
 * Eager Loading, hydration
 *
 */
Route::get('songs2', function(){
    $songs = Song::with('artist', 'genre')
        ->take(5)
        ->get();

    //dd($songs);

    foreach($songs as $song){
        //$song->artist->getArtistNameLowerCase();
       // var_dump($song->toArray());
    }

});

Route::get('artists/{id}', function($id){
    $artist = Artist::find($id);
    dd($artist->songs->toArray());
});