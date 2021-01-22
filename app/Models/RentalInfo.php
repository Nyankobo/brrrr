<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalInfo extends Model
{
    protected $table = "rental_info";

    protected $guarded = [];

    public function report()
    {
        return $this->hasOne('App\Models\Report');
    }
}
