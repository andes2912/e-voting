<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voting extends Model
{
    protected $fillable = [
        'user_id','calon_id','vot'
    ];
}
