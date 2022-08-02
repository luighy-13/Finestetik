<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\main;
use App\Models\permissions;

class mainController extends Controller
{
    //

    public function mainUser(Request $req)
    {
        try {
            $id_user = $req->user_id;
            $id = 1;

            $data = array();
            $response = main::where('id_father', '=', '0')->get();
            for ($i=0; $i < count($response); $i++) {
                $response[$i]->{'active'} = false;
                $response[$i]->{'childrens'} = main::where('id_father', '=', $response[$i]->id)->get();

                for ($j=0; $j < count($response[$i]->childrens); $j++) {

                    $status = permissions::select('status')
                    ->where('id_rol', '=', $id)
                    ->where('id_main','=', $response[$i]->childrens[$j]->id)->first();

                    if(!empty($status))
                    {
                        $response[$i]->childrens[$j]->{'status'} = (permissions::select('status')
                        ->where('id_rol', '=', $id)
                        ->where('id_main','=', $response[$i]->childrens[$j]->id)->first())->status == 1 ? true: false;
                    }else {
                        $response[$i]->childrens[$j]->{'status'} = false;
                    }
                }

                $aux = array();
                for ($j=0; $j < count($response[$i]->childrens); $j++) {
                    $element = $response[$i]->childrens[$j];

                    if($element->status == 1)
                    {
                        array_push($aux, $element);
                    }
                }
                $response[$i]->childrens = $aux;
                if(count($aux) > 0){
                    array_push($data, $response[$i]);
                }

            }




			return Response::json(array('status' => '200', 'data' => $data));
		} catch (Exception $e) {
			return Response::json(array('status' => '500', 'data' => ''));
		}

    }

}
