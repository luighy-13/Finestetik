<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class main extends Model
{
    use HasFactory;

  protected $table = 'main';
  
  protected $fillable = [
    'id', 'name', 'icon', 'route', 'id_father', 'created_at', 'updated_at', 'deleted_at'
  ];

}
