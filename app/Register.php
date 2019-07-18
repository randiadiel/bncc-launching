<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable =[
        'lane','bnccId','nama','email','nim','tlp','lineId'
    ];

}
