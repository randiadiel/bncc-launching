<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preregist extends Model
{
    protected $fillable =[
        'nama','email','nim','tlp','lineId','jurusan','payment','verified','bnccId','batch','type'
    ];
    public function schedules(){
        return $this->belongsTo('App\Schedule');
    }
}
