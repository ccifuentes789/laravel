<?php
class Title extends Eloquent{
    public function dvds(){
        return $this->hasMany('DVD');
    }
}