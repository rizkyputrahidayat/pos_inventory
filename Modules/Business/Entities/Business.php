<?php

namespace Modules\Business\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Business extends Model
{
    use HasFactory;
    protected $table = 'business';
    protected $fillable = [
        'location_id',
        'name',
        'address',
        'city',
        'zip_code',
        'country',
        'mobile',
        'email',
    ];
    protected $guarded = [];
}