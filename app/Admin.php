<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\RankOverflowException;

define('MAX_RANK',3);
define('MIN_RANK',1);

class Admin extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function rankUp()
    {
        if($this->rank >= MAX_RANK)
            throw new RankOverflowException;

        $this->rank+=1;
    }

    public function rankDown()
    {
        if($this->rank <= MIN_RANK)
            throw new RankOverflowException;

        $this->rank-=1;
    }
}
