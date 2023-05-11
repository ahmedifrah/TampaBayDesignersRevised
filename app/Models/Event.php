<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'start_at',
        'name',
        'desc',
        'location'
    ];

    public function faqs(){
        return $this->hasMany(Faq::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class);
    }
}
