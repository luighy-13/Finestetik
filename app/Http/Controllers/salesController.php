<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class salesController extends Controller
{
    public function index(){
        return array();
    }


    public function byCustomer()
    {
        $sale = Sale::all();
        return array("status"=> 200, "data"=> $sale);
    }
}
