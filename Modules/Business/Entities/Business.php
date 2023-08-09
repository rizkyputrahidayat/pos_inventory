<?php

namespace Modules\Business\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Business extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'business';
}
