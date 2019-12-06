<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = [
        'user_id','owner_id','date','time','no_of_persons','table_no',
    ];

    
}
