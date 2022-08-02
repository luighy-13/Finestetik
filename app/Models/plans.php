<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plans extends Model
{
    use HasFactory;

    protected $table = 'plans';

  protected $fillable = [
    'id', 'name', 'description', 'price', 'status','created_at', 'deleted_at', 'updated_at', 'id_device', 'id_plane'
  ];
}
