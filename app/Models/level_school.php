<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level_school extends Model
{
    use HasFactory;
    protected $table = 'level_school';
  
    protected $fillable = [
      'id', 'name', 'created_at', 'deleted_at', 'updated_at'
    ];
}
