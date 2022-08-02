<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\plans;
use App\Models\schools;
use App\Models\level_school;
use App\Http\Controllers\OpenpayController;

class plansController extends Controller
{
    //

    public function allPlans()
    {
        try {
    		$response = plans::all();
    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }



    public function addPlan(Request $req)
    {
        try {

            $response = new plans();
            if($req->id > 0 )
            {
                $response = plans::find($req->id);
            }

            $response->name = $req->name;
            $response->description = $req->description;
            $response->price = $req->price;
            $response->status = $req->status;
            $response->months = $req->months;
            $response->id_device = $req->id_device;
            $response->save();

            if($response->id_plane == null)
            {
                $openpay_ctr = new OpenpayController();
                $id_plane = $openpay_ctr->createPlan($response)['id_plane'];

                $response->id_plane = $id_plane;
                $response->save();

            }else {

                $openpay_ctr = new OpenpayController();
                $openpay_ctr->updatePlan($response);

            }




    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }

    public function deletePlan(Request $req)
    {
        try {
            $response = plans::find($req->id);
            $response->delete();
    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }


    public function getSchools(){
        try{
            $response = schools::all();

            return Response::json(array('status' => '200', 'data' => $response));
        }catch(Exception $e){
            return Response::json(array('status' => '500', 'data' => ''));
        }
    }

    public function getLevelSchool(){
        try{

            $response = level_school::all();

            return Response::json(array('status' => '200', 'data' => $response));
        }catch(Exception $e){
            return Response::json(array('status' => '500', 'data' => ''));
        }
    }

    public function getStatesCounty(){
        try{
            $response = schools::all();

            return Response::json(array('status' => '200', 'data' => $response));
        }catch(Exception $e){
            return Response::json(array('status' => '500', 'data' => ''));
        }
    }

    public function getCityCountry(){
        try{

            $response = level_school::all();

            return Response::json(array('status' => '200', 'data' => $response));
        }catch(Exception $e){
            return Response::json(array('status' => '500', 'data' => ''));
        }
    }

    public function getCountry(){
        try{

            $response = level_school::all();

            return Response::json(array('status' => '200', 'data' => $response));
        }catch(Exception $e){
            return Response::json(array('status' => '500', 'data' => ''));
        }
    }

}
