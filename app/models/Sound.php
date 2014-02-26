<?php
class Sound extends Eloquent{
    public function dvds(){
        return $this->hasMany('DVD');
    }
}