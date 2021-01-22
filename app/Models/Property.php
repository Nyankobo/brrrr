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

    /**
     * Get full address
     */
    public function getAddress()
    {
        return "$this->address, $this->city, $this->state $this->zip";
    }
}
