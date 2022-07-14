<?php

namespace App\Http\Controllers;

use Auth;
use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
// use App\Http\Controllers\OpenpayController;

class AuthController extends Controller
{
    public function deleteUser(Request $req)
    {
        $user = User::find($req->id);
        $user->delete();

        return response([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function factureData(Request $request){

        $user = User::find($request->id);

        $user->rfc = $request->rfc;
        $user->email_facture = $request->email_facture;
        $user->social_name = $request->social_name;

        $user->save();

        return response([
            'status' => 'success',
            'data' => $user
        ], 200);
    }


    public function register(Request $request)
    {
        if($request->id > 0)
        {
            $user = User::find($request->id);
            if($user->password != $request->password)
            {
                $user->password = bcrypt($request->password);
            }

        }else {
            $user = new User;
            $user->password = bcrypt($request->password);
        }

        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->rol_id = $request->rol;
        $user->is_customer = $request->is_customer;
        if($request->is_customer == 1)
        {
            // $openpay_ctr = new OpenpayController();
            // $id_openpay = $openpay_ctr->createUser($request);

            // $user->pay_user = $id_openpay;
        }

        if($request->facture)
        {
            $user->rfc = $request->rfc;
            $user->email_facture = $request->email_facture;
            $user->social_name = $request->social_name;
        }

        $user->save();

        return response([
            'status' => 'success',
            'data' => $user
        ], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ( ! $token = JWTAuth::attempt($credentials)) {
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], 400);
        }

        return response([
            'status' => 'success'
        ])
        ->header('Authorization', $token);
    }

    public function updateIdTokent($id, $id_pay)
    {
        $user = User::find($id);

        $user->pay_user = $id_pay;

        $user->save();
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if($user->pay_user == null)
        {
            // $ctr_openpay = new  OpenpayController();

            // $id_pay = $ctr_openpay->createUser($user);
            // $this->updateIdTokent($user->id, $id_pay);

            // $user = User::find(Auth::user()->id);
        }

        return response([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate();

        return response([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }


    public function getUsers()
    {
     try{
            $response = User::where("is_customer","=", 0)->get();


            return Response::json(array('status' => '200', 'data' => $response));
        } catch (Exception $e) {
            return Response::json(array('status' => '500', 'data' => ''));
        }
    }

    public function getCustomers()
    {
     try{
            $response = User::where("is_customer","=", 1)->with('student')->get();


            return Response::json(array('status' => '200', 'data' => $response));
        } catch (Exception $e) {
            return Response::json(array('status' => '500', 'data' => ''));
        }
    }

}
