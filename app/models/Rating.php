<?php
class Rating extends Eloquent{
    public function dvds(){
        return $this->hasMany('Dvd');
    }
}