<?php

namespace App\YamlModels;


use App\Notice;
use App\Poll;

class Election extends YamlObject
{
    public static function getWatched()
    {
        return self::where('isWatched', true);
    }

    public function notices()
    {
        return Notice::where('election_id', $this->_id);
    }

    public function polls()
    {
        return Poll::where('election_id', $this->_id);
    }
    
    public function activeNotice()
    {
        return $this->notices()->recent()->first();
    }

}
