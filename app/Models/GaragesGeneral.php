<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaragesGeneral extends Model
{
    use HasFactory;

    protected $table = 'garages_general';

    public function owner()
    {
        return $this->belongsTo(GaragesOwner::class, 'owner_id');
    }
}
