<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'system',
        'title',
        'did',
        'phone',
        'city',
        'district',
        'category',
        'page',
        'index',
        'from',
        'jwt',
        'stamps',
        'data',
        'req',
        'last'
    ];
}
