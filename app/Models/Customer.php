<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
    'first_name',
    'last_name',
    'first_kana_name',
    'last_kana_name',
    'email',
    'tel',
    'zipcode',
    'prefectures',
    'address',
    'building',
    'birthday',
    ];
}
