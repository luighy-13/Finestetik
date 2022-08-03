<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class salesController extends Controller
{
    public function index(){
        $sale = Sale::all();

        return array("status"=> 200, "data"=> $sale);
    }


    public function byCustomer()
    {
        $sale = Sale::all();
        return array("status"=> 200, "data"=> $sale);
    }



    public function newSale(Request $req){

        $folio =  $this->makeFolio();

        $sale = new Sale();

        $sale->folio = $folio;
        $sale->id_customer = $req->id_customer;
        $sale->status = 0;
        $sale->payeds_in_months = $req->payeds_in_months;
        $sale->payed_mounth = $req->payed_mounth;
        $sale->payed = $req->payed + $req->deposit;
        $sale->total_debt = ($req->payed_mounth * $req->payeds_in_months) - $req->deposit;
        $sale->deposit = $req->deposit;

        return $sale;

    }

    public function makeFolio(){
        $start  = 1;
        $count  = 1;
        $digits = 10;
        $result = array();
        for ($n = $start; $n < $start + $count; $n++) {
         $result = str_pad($n, $digits, "0", STR_PAD_LEFT);
         $folio  = Sale::where('folio','=', $result)->first();
         if ($folio) {
          $count = $count + 1;
         }
        }
        return $result;
    }
}
