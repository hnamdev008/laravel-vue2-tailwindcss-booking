<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function itemType()
    {
        return $this->belongsTo('App\Models\ItemType');
    }

    public function timeUnit()
    {
        return $this->belongsTo('App\Models\TimeUnit');
    }

    public function availabilities()
    {
        return $this->hasMany('App\Models\Availability');
    }
}
