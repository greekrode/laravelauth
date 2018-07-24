<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = 
    [
        'bid_id',
        'job_id',
        'user_id',
        'bank_name',
        'account_name',
        'account_number',
        'payment_date',
        'amount',
        'remarks',
        'photo',
    ];

    protected $guarded = 
    [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }

}
