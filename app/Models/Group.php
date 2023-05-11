<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'is_slack',
        'is_credit',
        'name',
        'desc',
        'icon'
    ];
    
    public function events(){
        return $this->belongsToMany(Event::class);
    }
}
