<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rols extends Model
{
    use HasFactory;
    protected $table = 'rols';
  
    protected $fillable = [
      'id', 'name', 'description', 'created_at', 'deleted_at', 'updated_at'
    ];
}
