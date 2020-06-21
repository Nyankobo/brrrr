<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseInfo extends Model
{
    protected $table = "purchase";

    protected $guarded = [];

    public function report()
    {
        return $this->belongsTo('App\Models\Report');
    }
}
