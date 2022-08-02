<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\devices;

class deviceController extends Controller
{
    //
     
    public function allDevices()
    {
        try {
    		$response = devices::all();
    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }

    

    public function addDevice(Request $req)
    {
        try {

            $response = new devices();
            if($req->id > 0 )
            {
                $response = devices::find($req->id);
            }
            
            $response->name = $req->name;
            $response->mmt = $req->mmt;
            $response->screen = $req->screen;
            $response->os = $req->os;
            $response->price = $req->price;
            $response->save();
    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }

    public function deleteDevice(Request $req)
    {
        try {
            $response = devices::find($req->id);
            $response->delete();
    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }
}
