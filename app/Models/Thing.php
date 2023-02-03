<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;

//    protected $appends = [
//        'full_image_src'
//    ];

    protected $fillable = [
        'name',
        'description',
        'wrst',
        'author_id',
        'owner_id'
    ];

    public function owner() {
        return $this->belongsTo(User::class);
    }

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function place() {
        $using = $this->hasOne(Using::class, 'thing_id')->first();

        if ($using) return $using->place()->first();
        return null;
    }

    public function getHistory() {
        $history = History::where([
            ['model', '=', 'thing'],
            ['primary_key', '=', $this->id]
        ])->latest()->get();
        return $history;
    }

}
