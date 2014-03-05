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
Route::get('itunes', function(){
   $itunes = new \Itp\Api\ItunesSearch();
   $json =$itunes->getResults();

   //dd($json);
    return View::make('itunes', [
        'songs' => $json->results

        ]);


});


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
    //dd(Input::all());
    $validation = Song::validate(Input::all());
    if($validation->passes()){
        $song = new Song();
        $song->title = Input::get('title');
        $song->artist_id =Input::get('artist');
        $song->genre_id = Input::get('genre');
        $song->price = Input::get('price');
        $song->save();  

        return Redirect::to('songs/create')
            //->withErrors($validation);
            ->with('success', 'Yay!');
    }

    
    return Redirect::to('songs/create')
        ->withInput()
        ->with('errors', $validation->messages());
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

Route::get('/dvds/create', function(){
    //$titles = Title::all();
    $genres = Genre::all();
    $sounds = Sound::all();
    $labels = Label::all();
    $ratings = Rating::all();
    $formats = Format::all();
    return View::make('dvds/create', [
       // 'dvds'=> $titles,
        'genres'=>$genres,
        'sounds'=>$sounds,
        'labels'=>$labels,
        'ratings'=>$ratings,
        'formats'=>$formats
    ]);
});

Route::post('dvds', function(){
    //dd(Input::all());
    $validation = Dvd::validate(Input::all());
    if($validation->passes()){
        $dvd = new Dvd();
        $dvd->title = Input::get('title');
        $dvd->rating_id =Input::get('rating');
        $dvd->genre_id = Input::get('genre');
        $dvd->label_id = Input::get('label');
        $dvd->sound_id = Input::get('sound');
        $dvd->format_id = Input::get('format');
       
        $dvd->save();  
         //dd($dvd);
        
        
        return Redirect::to('dvds/create')
            ->with('success', 'Yay!');
        }

        return Redirect::to('dvds/create')
        ->withInput()
        ->with('errors', $validation->messages());
        
});