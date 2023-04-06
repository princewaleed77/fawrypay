<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Services\FatoorahService;
use Illuminate\Support\Facades\Http;
use React\Http\Client\Request as ClientRequest;


class ActivityController extends Controller
{

    public function pay()
    {

        $base_url = env('PAY_MOB_URL');
        $requestData = [
            'api' => env('PAY_MOB_API_KEY'),
            'username' => '77676767676767',
            'password' => 'password'
        ];
        $response = Http::post($base_url . 'auth/tokens', $requestData)->json();
        $auth_token = $response['token'];
        return $auth_token;
        //        return view('home', ['response'=>$response]);
    }


    public function send($data = [])

    {
        $auth_token = $this->pay();
        $data = [
            "auth_token" => $auth_token,
            'delivery_needed' => false, //'SMS', 'EML', or 'ALL'
            'amount_cents'       => 10,
            'currency' => 'EGP',
            'items'       => [],
            "shipping_data" => ['address' => 'jhjfjhgfhjdhgfdgdgdgfdgfsfds'],
            'shipping_details' => [],
        ];
        $response = Http::post(env('PAY_MOB_URL') . 'ecommerce/orders', $data)->json();
        //        dd($request);
        $orderId = $response['id'];
        $invoiceUrl = $response['url'];
        return 
        [
            'orderId'=>$orderId,
         'invoiceUrl'=>$invoiceUrl
        ];
     
    }

    public function accept()
    {
        $orderId = $this->send()['orderId'];
        $response = Http::post(env('PAY_MOB_URL') . 'acceptance/payment_keys', [
            'auth_token' => $this->pay()   ,
            'amount_cents' => 10,
            'expiration' => 3600,
            'order_id' =>$orderId ,
            'billing_data' => [
                "apartment" => "803",
                "email" => "claudette09@exa.com",
                "floor" => "42",
                "first_name" => "Clifford",
                "last_name" => "Nicolas",
                "street" => "Ethan Land",
                "building" => "8028",
                "phone_number" => "+86(8)9135210487",
                "shipping_method" => "PKG",
                "postal_code" => "01898",
                "city" => "Jaskolskiburgh",
                "country" => "CR",
                "state" => "Utah"
            ],
            'currency' => 'EGP',
            'integration_id' => 3517939, //your dashboard  payment integeration id from your settings
        ])->json();

        $checkOutToken = $response['token'];
        return  $checkOutToken;
    }

    public function checkOut()
    {
        // your ifram 
        //iFrame URL:https://accept.paymobsolutions.com/api/acceptance/iframes/{{your_iframe_id}}?payment_token={{payment_token_obtained_from_step_3}}
        $this->pay();
        $this->send();
        $checkOutToken = $this->accept();
        return redirect("https://accept.paymobsolutions.com/api/acceptance/iframes/740076?payment_token=$checkOutToken");
    }

}
