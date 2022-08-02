<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_students extends Model
{
    use HasFactory;

    protected $table = 'customer_students';
  
  protected $fillable = [
    'id', 'name', 'email', 'school_grade', 'id_user', 'created_at', 'deleted_at', 'updated_at', 'code', 'dv'
  ];
}
