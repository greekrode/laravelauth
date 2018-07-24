<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = [
        'job_id', 
        'user_id',
        'description',
        'expected',
    ];

    protected $guarded = [
        'id'
    ];

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function payment()
    {
        return $this->hasOne('App\Models\Payment');
    }
}
