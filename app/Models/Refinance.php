<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refinance extends Model
{
    protected $table = "refinance";

    protected $guarded = [];

    public function report()
    {
        return $this->belongsTo('App\Models\Report');
    }
}
