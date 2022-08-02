<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sales;

class reportsController extends Controller
{
    //

    public function salesReport(){
        $data =  sales::with('details')->with('paids')->with('mounth_paids')->with('student')->orderBy('folio', 'asc')->get();
        $aux = array();
        for ($i=0; $i < count($data); $i++) { 
            $element = $data[$i];
            $student = $element->student;
            $total_pago = 0;
            $plane = json_decode($element->details->data, true);

            for ($j=0; $j < count($element->paids); $j++) { 
                $total_pago += $element->paids[$j]->paid;
            }


            for ($j=0; $j < count($element->mounth_paids); $j++) { 
                $paid = $element->mounth_paids[$j];
                

                $paid->{"student"} = $student->name;
                $paid->{"code"} = $student->code.$student->dv;
                $paid->{"plane"} = $plane['name']." ".$plane['description']." $".$plane['price']." Duración ".$plane['months']." meses";


                if($paid->mount < $total_pago)
                {
                    
                    $paid->{"paid"}  =  $paid->mount;
                    $total_pago -= $paid->mount;

                }
                else if ($total_pago == 0){

                    $paid->{"paid"}  = 0;
                }else {
                    
                    $paid->{"paid"}  = $total_pago;
                    $total_pago -= $total_pago;
                }
                

                array_push($aux, $paid);    
            }

            
        }

        return $aux;
    }

    public function  getPaidsMonth() {
        
    }
}
