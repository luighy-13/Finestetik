<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\rols;
use App\Models\main;
use App\Models\permissions;

class rolController extends Controller
{
    //
    public function show()
    {
    	try {
    		$response = rols::all();
    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }

	public function showWhitPermission()
    {
    	try {
    		$response = rols::all();

			for ($i=0; $i < count($response); $i++) {

				$response[$i]->{'permissions'} = $this->getPermissions($response[$i]->id);
			}

    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }

	public function getPermissions($id)
	{
		$response = main::where('id_father', '=', '0')->get();
		for ($i=0; $i < count($response); $i++) {

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
		}

		return $response;
	}

	public function saveStatusPermission(Request $req)
	{

		$permission = permissions::where('id_rol', '=', $req->id_rol)->where('id_main','=', $req->id_children)->first();

		if($permission != null)
		{


			$permission->id_rol = $req->id_rol ;
			$permission->status = $req->status;
			$permission->id_main = $req->id_children;

			$permission->save();
		}else {
			$permission = new permissions();

			$permission->id_rol = $req->id_rol ;
			$permission->status = $req->status;
			$permission->id_main = $req->id_children;

			$permission->save();
		}


		return $permission;
		return $this->showWhitPermission();
	}

    public function showRol(Request $req){
        try {
            $response = rols::find($req->id);
            return Response::json(array('status' => '200', 'data' => $response));
        } catch (Exception $e) {
            return Response::json(array('status' => '500', 'data' => ''));
        }
    }

    public function add_or_edit(Request $req)
    {
    	try {

    		$response = new rols();

    		if($req->id > 0)
    		{
    			$response = rols::find($req->id);
    		}

    		$response->name = $req->name;
    		$response->description = $req->description;

            $response->delete = $req->delete;
            $response->edit = $req->edit;
            $response->write = $req->write;

    		$response->save();

    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }

    public function deleted(Request $req)
    {
    	try {
    		$response = rols::find($req->id);
    		$response->delete();

    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }
}
