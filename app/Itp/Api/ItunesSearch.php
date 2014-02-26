<?php

namespace Itp\Api;

class ItunesSearch{
	public function getResults(){
		$endpoint = "https://itunes.apple.com/search?term=jack+johnson";
    	$json = file_get_contents($endpoint);
    	

    	return json_decode($json);
	}
}