<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = "property";

    protected $guarded = [];

    public function report()
    {
        return $this->hasMany('App\Models\Report');
    }
}
