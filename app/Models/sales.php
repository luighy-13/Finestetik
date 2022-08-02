<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'id', 'folio', 'id_customer', 'id_plan', 'discount', 'created_at','code','updated_at', 'deleted_at', 'id_student', 'payeds_in_months','payed_mounth', 'payed', 'total_debt', 'topic', 'cancelled'
    ];

    public function details()
    {
        return $this->hasOne('App\Models\sales_detail', 'id_sales', 'id');
    }

    public function paids()
    {
        return $this->hasMany('App\Models\sales_paid', 'id_sales', 'id');
    }

    public function mounth_paids()
    {
        return $this->hasMany('App\Models\sales_month_paid', 'id_sales', 'id');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\customer_students', 'id_student', 'id');
    }
}
