<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Using extends Model
{
    use HasFactory;

    protected $fillable = [
        'thing_id',
        'place_id',
        'user_id',
        'amount'
    ];

    public function place() {
        return $this->belongsTo(Place::class, 'place_id');
    }

    public function thing() {
        return $this->belongsTo(Thing::class, 'thing_id');
    }
}
