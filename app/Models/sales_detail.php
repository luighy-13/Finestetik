<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_detail extends Model
{
    use HasFactory;

    protected $table = 'sales_detail';
  
    protected $fillable = [
        'id', 'id_sales', 'data', 'created_at', 'deleted_at', 'updated_at'
    ];

    public function sales()
    {
        return $this->belongsTo('App\Models\sales', 'id', 'id_sales');
    }

}
