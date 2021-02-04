<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailing extends Model
{
    use HasFactory;

    protected $table = "mailing";

    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo('App\Models\Property');
    }

    /**
     * Format full address
     */
    public function formatAddress()
    {
        return "$this->address<br>$this->city, $this->state  $this->zip";
    }
}
