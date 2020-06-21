<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Future extends Model
{
    protected $table = "future";

    protected $guarded = [];

    public function report()
    {
        return $this->belongsTo('App\Models\Report');
    }
}
