<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    public $fillable = ['rating', 'place_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function place()
    {
        return $this->belongsTo(Place::class);
    }

}