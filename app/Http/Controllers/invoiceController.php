<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facturapi\Facturapi;
use Illuminate\Support\Facades\Response;

class invoiceController extends Controller
{
    public function auth(Request $req)
    {
        // 03
        $user = $req->user;
        $data_invoice = $req->data;
        $description = json_decode($data_invoice['details']['data'],true)['description'];

        $facturapi  = new Facturapi("sk_test_G5gXqa2rRyeAoEdmO852yKDx3BJknvpj");
        
        $invoice = $facturapi->Invoices->create(array(
        "customer" => array(
            "legal_name" => $user['social_name'],
            "email" => $user['email_facture'],
            "tax_id" => $user['rfc']
        ),
        "items" => array(
            array(
                "product" => array(
                    "description" => $description,
                    "product_key" => "81112502",
                    "price" => $data_invoice['payed_mounth']
                ),
            ),
           
        ),
            "payment_form" => "03"
        ));

        $facturapi->Invoices->send_by_email($invoice->id);

        return Response::json(array('status' => '200', 'data' => $invoice));
    }
}
