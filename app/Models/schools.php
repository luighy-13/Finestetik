<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schools extends Model
{
    use HasFactory;

    protected $table = 'schools';
  
    protected $fillable = [
      'id', 'name', 'created_at', 'deleted_at', 'updated_at'
    ];
}
