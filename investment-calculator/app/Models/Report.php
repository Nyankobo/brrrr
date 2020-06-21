<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';

    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo('App\Models\Property');
    }

    public function rental()
    {
        return $this->hasOne('App\Models\RentalInfo');
    }

    public function refinance()
    {
        return $this->hasOne('App\Models\Refinance');
    }

    public function purchase()
    {
        return $this->hasOne('App\Models\Purchase');
    }

    public function income()
    {
        return $this->hasOne('App\Models\Income');
    }

    public function future()
    {
        return $this->hasOne('App\Models\Future');
    }

    public function expenses()
    {
        return $this->hasOne('App\Models\Expenses');
    }
}
