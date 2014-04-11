<?php

namespace Itp\Api;

class RottenTomatoesSearch{
	public function getResults($title){
	
		$urltitle = urlencode($title);
		//dd($urltitle);
		$endpoint = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=3mbpy85dwx2qgzxqe49gvfb4&q=$urltitle&page_limit=10";
    	$json = file_get_contents($endpoint);
    	


    	return json_decode($json);
	}
}