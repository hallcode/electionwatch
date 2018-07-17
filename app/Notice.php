<?php

namespace App;

use App\YamlModels\Election;
use App\YamlModels\Level;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function election()
    {
        return Election::where('_id', $this->election_id)->first();
    }

    public function level() {
        return Level::open($this->level);
    }

    public function getIsActiveAttribute()
    {
        $activeDate = $this->election()->activeNotice()->created_at;

        return $this->created_at->equalTo($activeDate);
    }

    public function getChangeAttribute()
    {
        if ($this->direction == -1)
        {
            return 'reduced';
        }
        elseif ($this->direction == 0)
        {
            return 'set';
        }
        elseif ($this->direction == 1)
        {
            return 'raised';
        }

    }

    public function getChangeClassAttribute()
    {
        if ($this->direction == -1)
        {
            return 'low';
        }
        elseif ($this->direction == 0)
        {
            return '';
        }
        elseif ($this->direction == 1)
        {
            return 'critical';
        }

    }

    public function scopeRecent($query, $limit = 5)
    {

        return $query->latest()->limit($limit);
    }

}
