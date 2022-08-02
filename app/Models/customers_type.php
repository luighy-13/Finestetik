<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class customers_type extends Model
{
    use HasFactory;

  protected $table = 'customer_type';
  
  protected $fillable = [
    'id', 'name', 'description', 'deleted_at', 'updated_at', 'created_at'
  ];

}
