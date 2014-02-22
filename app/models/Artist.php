<?php
class Artist extends Eloquent{
    public function songs(){
        return $this->hasMany('Song');
    }
}