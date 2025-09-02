<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Failedjob extends Model
{
    protected $fillable = [ 'uuid' ,'connection' , 'queue' ,'payload' , 'exception'];
}
