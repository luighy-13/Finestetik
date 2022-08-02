<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use JWTAuth;

use Openpay;
use Exception;
use OpenpayApiError;
use OpenpayApiAuthError;
use OpenpayApiRequestError;
use OpenpayApiConnectionError;
use OpenpayApiTransactionError;
use Illuminate\Support\Facades\Response;

class OpenpayController extends Controller
{


    public function createUser($data){

        Openpay::setProductionMode(false);
        $openpay = Openpay::getInstance(env('Openpay_ID'),env('Openpay_Key'), 'MX');


        $customerData = array(
            'name' => $data->name,
            // 'last_name' => 'Velazco',
            'email' => $data->email,
            'phone_number' => $data->phone,
            // 'address' => array();
        );

        $customer = $openpay->customers->add($customerData);

        return $customer->id;
    }



    public function getUser(){
        Openpay::setProductionMode(false);
        $openpay = Openpay::getInstance(env('Openpay_ID'),env('Openpay_Key'), 'MX');

        $user =  Auth::user();

        $customer = $openpay->customers->get($user->pay_user);

        return Response::json(array('status' => '200', 'data' => $customer));
    }

    public function addCard(Request $req)
    {

        Openpay::setProductionMode(false);
        $openpay = Openpay::getInstance(env('Openpay_ID'),env('Openpay_Key'), 'MX');
        $user =  Auth::user();

        $cardData = array(
            'holder_name' => $req->name,
            'card_number' => $req->card,
            'cvv2' => $req->cvv,
            'expiration_month' => $req->month,
            'expiration_year' => $req->year,
            'address' => null);

        $customer = $openpay->customers->get($user->pay_user);
        $card = $customer->cards->add($cardData);


        return Response::json(array('status' => '200', 'data' => $card));
    }

    public function deleteCard()
    {
        Openpay::setProductionMode(false);
        $openpay = Openpay::getInstance(env('Openpay_ID'),env('Openpay_Key'), 'MX');
        $user =  Auth::user();

        $customer = $openpay->customers->get($user->pay_user);
        $card = $customer->cards->get('kwdpauw06rdberkkmdqc');
        $card->delete();


        return Response::json(array('status' => '200', 'data' => $card));
    }

    public function addCharger(){

        Openpay::setProductionMode(false);
        $openpay = Openpay::getInstance(env('Openpay_ID'),env('Openpay_Key'), 'MX');
        $user =  Auth::user();

        $chargeData = array(
            'source_id' => 'ke98fqufiriw2veuomw5',
            'method' => 'card',
            'amount' => 100,
            'description' => 'Cargo inicial a mi cuenta',
            'order_id' => 'ORDEN-00070');

        $customer = $openpay->customers->get($user->pay_user);
        $charge = $customer->charges->create($chargeData);

    }

    public function getCards()
    {

        Openpay::setProductionMode(false);
        $openpay = Openpay::getInstance(env('Openpay_ID'),env('Openpay_Key'), 'MX');


        $findData = array(
            'creation[gte]' => '',
            'creation[lte]' => '',
            'offset' => 0,
            'limit' => 30);

        $user =  Auth::user();

        $customer = $openpay->customers->get($user->pay_user);
        $cards = $customer->cards->getList($findData);


        $cards_array = array();
            for ($i=0; $i < count($cards); $i++) {
                $card = $cards[$i]->card_number;
                $aux = array(
                    'id_card' => $cards[$i]->id,
                    'card_number'=> $card ,
                    'bank_name' => $cards[$i]->bank_name,
                    'brand' => $cards[$i]->brand,
                    'type' => $cards[$i]->type,
                    'customer_id' => $cards[$i]->customer_id,
                );

                $cards_array[] = $aux;
            }

        return Response::json(array('status' => '200', 'data' => $cards_array));
    }


    public function createPlan($data){
        Openpay::setProductionMode(false);
        $openpay = Openpay::getInstance(env('Openpay_ID'),env('Openpay_Key'), 'MX');

        $planDataRequest = array(
            'amount' => $data['price'],
            'status_after_retry' => 'unpaid',
            'retry_times' => 6,
            'name' => $data['name'],
            'repeat_unit' => 'month',
            'trial_days' => '0',
            'repeat_every' => '1',
            'currency' => 'MXN');

        $plan = $openpay->plans->add($planDataRequest);

        return array("id_plane" => $plan->id);

    }

    public function updatePlan($data){

        Openpay::setProductionMode(false);
        $openpay = Openpay::getInstance(env('Openpay_ID'),env('Openpay_Key'), 'MX');
        $plan = $openpay->plans->get($data['id_plane']);
        $plan->amount = $data['price'];
        $plan->name = $data['name'];
        $plan->save();

        return "ok";

    }

    public function cliente_plan() {
        $openpay = Openpay::getInstance('mzdtln0bmtms6o3kck8f', 'sk_e568c42a6c384b7ab02cd47d2e407cab');
        $user =  Auth::user();

        $subscriptionDataRequest = array(
            'plan_id' => 'psjubnktzpofhakixfkp',
            'card_id' => 'kokzmiiwephcdmq1h2qr');

        $customer = $openpay->customers->get($user->pay_user);
        $subscription = $customer->subscriptions->add($subscriptionDataRequest);
    }

    public function subscriptionTo($data){
        Openpay::setProductionMode(false);
        $openpay = Openpay::getInstance(env('Openpay_ID'),env('Openpay_Key'), 'MX');

        $subscriptionDataRequest = array(
            'plan_id' => $data['plan']['id_plane'],
            'card_id' => $data['credit_card'],
            // "period_end_date"=> '2022-12-18'
        );

        $user =  Auth::user();
        $customer = $openpay->customers->get($user->pay_user);

        $subscription = $customer->subscriptions->add($subscriptionDataRequest);
    }

    public function makeCapture(){

        Openpay::setProductionMode(false);
        $openpay = Openpay::getInstance(env('Openpay_ID'),env('Openpay_Key'), 'MX');

        $user =  Auth::user();

        $chargeData = array(
            'source_id' => 'tvyfwyfooqsmfnaprsuk',
            'method' => 'card',
            'amount' => 100,
            'description' => 'Cargo inicial a mi cuenta',
            'order_id' => 'ORDEN-00070');

        $customer = $openpay->customers->get($user->pay_user);
        $charge = $customer->charges->create($chargeData);
    }

}
