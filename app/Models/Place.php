<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $appends = [
        'things_count'
    ];

    protected $fillable = [
        'name',
        'description',
        'repair',
        'work',
        'author_id'
    ];

    public function getAuthor() {
        return $this->belongsTo(User::class, 'author_id')->first();
    }

    public function getThings() {
        return $this->hasMany(Using::class)->with('thing');
    }

    public function getThingsCountAttribute() {
        return $this->hasMany(Using::class)->count();
    }

    public function getHistory() {
        $history = History::where([
            ['model', '=', 'place'],
            ['primary_key', '=', $this->id]
        ])->latest()->get();
        return $history;
    }
}
