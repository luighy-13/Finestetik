<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    use HasFactory;

    protected $table = 'permissions';
  
    protected $fillable = [
        'id', 'id_rol', 'status', 'id_main', 'created_at', 'updated_at', 'deleted_at'
    ];
}
