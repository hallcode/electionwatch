<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\YamlModels\Election;
use Carbon\Carbon;

class Poll extends Model
{
    protected $dates = [
        'created_at', 'updated_at', 'date'
    ];

    public function election()
    {
        return Election::where('_id', $this->election_id)->first();
    }

    public function isSoon()
    {
        $thisYear = date("Y");

        return $this->year == $thisYear || ($this->year - 1 ) == $thisYear;
    }

    public function getYearAttribute()
    {
        return $this->date->year;
    }

    public function getDayAttribute()
    {
        $date = $this->date->format('jS \\of M');

        preg_match('/(\d)([a-z]{2})(.+)/', $date, $preg_date);

        //die(var_dump($preg_date));

        return $preg_date[1] . '<sup>' . $preg_date[2] . '</sup>' . $preg_date[3];
    }

    public function scopeSoon($query, $limit = 4)
    {
        return $query->whereDate('date', '>=', date('Y-m-d'))
            ->oldest('date')
            ->limit($limit);
    }

    public function scopePrevious($query, $limit = 5)
    {
        return $query->whereDate('date', '<', date('Y-m-d'))
            ->latest('date')
            ->limit($limit);
    }

}
