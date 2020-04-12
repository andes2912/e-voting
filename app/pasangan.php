<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasangan extends Model
{
    protected $fillable = [
        'ketua_id','wakil_id','ketua_nama','wakil_nama','status','point'
    ];
}
