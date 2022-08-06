<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\customers_type;
use App\Models\customer_students;

class customersController extends Controller
{
    //
	public function showCustomer()
	{
		
	}
    //
    public function show_customer_type()
    {
    	try {
    		$response = customers_type::all();
    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }

    public function save_customer_type(Request $req)
    {
    	try {

    		$response = new customers_type();

    		if($req->id > 0)
    		{
    			$response = customers_type::find($req->id);
    		}

    		$response->name = $req->name;
    		$response->description = $req->description;

    		$response->save();

    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }

    public function delete_customer_type(Request $req)
    {
    	try {
    		$response = customers_type::find($req->id);
    		$response->delete();

    		return Response::json(array('status' => '200', 'data' => $response));
    	} catch (Exception $e) {
    		return Response::json(array('status' => '500', 'data' => ''));
    	}
    }

	//students
	public function show_students(Request $req)
	{
		try{
			$students = customer_students::all();
    		return Response::json(array('status' => '200', 'data' => $students));
		}catch(Exeption $e)
		{
			return Response::json(array('status' => '500', 'data' => ''));
		}
	}

	public function add_dv_students(Request $req)
	{
		try{
			$codes = $req->codes;
			for ($i=0; $i < count($codes); $i++) { 
					if($codes[$i] !== "")
					{
							$codes[$i] = explode("\t",$codes[$i])[0];
							
							$code = substr($codes[$i], 0, -1);
							$dv = substr($codes[$i], -1); 
							
							$sales_paid =  customer_students::where('code', '=', $code)->first();
							
							$sales_paid->dv = $dv;

							$sales_paid->save();
					}
			}

    		return Response::json(array('status' => '200', 'data' => $sales_paid));
		}catch(Exeption $e)
		{
			return Response::json(array('status' => '500', 'data' => ''));
		}
	}

	public function show_students_by_customer(Request $req)
	{
		try{
			$students = customer_students::where('id_user', '=', $req->id_customer)->get();
    		return Response::json(array('status' => '200', 'data' => $students));
		}catch(Exeption $e)
		{
			return Response::json(array('status' => '500', 'data' => ''));
		}
	}

	public function add_or_edit_student(Request $req){
		try{
			if($req->id >0)
			{
				$students = customer_students::find($req->id);
			}else {
				$students = new customer_students();

				
			}
			

			$students->name = $req->name;
			$students->email = $req->email;
			$students->school_grade = $req->school_grade;
			$students->id_user = $req->id_user;

			$students->save();

			$students = customer_students::find($students->id);

			if(!$students->code)
			{
				$students->code = date('Y').'00'.$students->id;
				$students->account = "{}";
				$students->device = "{}";
				$students->dv = '';
				$students->save();
			}

    		return Response::json(array('status' => '200', 'data' => $students));
		}catch(Exeption $e)
		{
			return Response::json(array('status' => '500', 'data' => ''));
		}
	}

	public function delete_student(Request $req){
		try{
			$students = customer_students::find($req->id);
			
			$students->delete();

    		return Response::json(array('status' => '200', 'data' => $students));
		}catch(Exeption $e)
		{
			return Response::json(array('status' => '500', 'data' => ''));
		}
	}

	public function saveInfoAccounts(Request $req){
		try{

			$students = customer_students::find($req->id);

			$students->account = $req->accoutn;
			$students->device = $req->device;

			$students->save();
    		return Response::json(array('status' => '200', 'data' => $students));
		}catch(Exeption $e)
		{
			return Response::json(array('status' => '500', 'data' => ''));
		}
	}
}
