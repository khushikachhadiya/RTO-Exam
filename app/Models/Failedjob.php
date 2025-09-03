<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Failedjob extends Model
{
     protected $table = 'failed_jobs';

    protected $fillable = [ 'uuid' ,'connection' , 'queue' ,'payload' , 'exception'];

    
}
