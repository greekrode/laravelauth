<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $fillable = [
        'title', 
        'location', 
        'category_id', 
        'user_id',
        'description',
        'price',
    ];

    protected $guarded = [
        'id'
    ];

    public function photo()
    {
       return $this->hasMany('App\Models\Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
