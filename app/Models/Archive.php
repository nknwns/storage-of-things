<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'wrst',
        'author_id'
    ];

    public function author() {
        return $this->belongsTo(User::class)->first();
    }
}
