<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = "income";

    protected $guarded = [];

    public function report()
    {
        return $this->belongsTo('App\Models\Report');
    }
}
