<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_paid extends Model
{
    use HasFactory;

    protected $table = 'sales_paid';
  
    protected $fillable = [
        'id', 'codigo_paid', 'status', 'mount', 'date', 'created_at', 'deleted_at', 'updated_at', 'id_sales','digit_verification', 'ref', 'paid_date', 'ref_long','paid'
    ];

    public function sales()
    {
        return $this->belongsTo('App\Models\sales', 'id_sales', 'id');
    }

    
}
