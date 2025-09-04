<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{

  protected $table = 'question_bank';

  protected $fillable = ['questio','answer','lang'];

  protected $hidden = ['created_at', 'updated_at'];
}
