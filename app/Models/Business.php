<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'business_types';

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'name',
    ];

}
