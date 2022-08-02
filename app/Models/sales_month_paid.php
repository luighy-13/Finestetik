<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_month_paid extends Model
{
    use HasFactory;

    protected $table = 'sales_month_paid';
  
    protected $fillable = [
        'id','date', 'mount', 'id_sales', 'id_paid_sales'
    ];

}
