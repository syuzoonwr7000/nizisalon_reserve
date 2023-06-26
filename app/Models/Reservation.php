<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'customer_id',
        'treatment_type_id',
        'sales_id',
        'start_time',
        'reservable',
        'babysitting',
        'payment',
        'payment_method',
        'completed',
    ];
}
