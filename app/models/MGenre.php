<?php
class MGenre extends Eloquent{
    public function dvds(){
        return $this->hasMany('DVD');
    }
}