<?php
class Format extends Eloquent{
    public function dvds(){
        return $this->hasMany('DVD');
    }
}