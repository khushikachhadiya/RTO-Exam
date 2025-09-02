<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RtoOffice extends Model
{
     protected $fillable = [
        'stateCode', 'stateName', 'officeAddress', 'contact'
    ];
}
