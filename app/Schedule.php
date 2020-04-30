<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =[
        'jadwal','increments'
    ];
    public function registers()
    {
        return $this->hasmany('App\Register');
    }
    public function preregists()
    {
        return $this->hasmany('App\Preregist');
    }
}
