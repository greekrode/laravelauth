<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $fillable = [
        'endorsement_id',
        'image',
    ];

    protected $guarded = [
        'id'
    ];

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }
}
