<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Services\PaymobServices;
use Illuminate\Support\Facades\Http;
use React\Http\Client\Request as ClientRequest;


class ActivityController extends Controller
{
    public $paymobServices;

    public function __construct(PaymobServices $paymobServices)
    {
        $this->paymobServices = $paymobServices;
    }

    public function getToken()
    {

        $requestData = [
            'api' => env('PAY_MOB_API_KEY'),
            'username' => '01062013832',
            'password' => 'N0w@y1nnn'
        ];
        $response = $this->paymobServices->buildRequest('auth/tokens', $requestData);
//        $auth_token = $response['token'];
//        return $response;
        return $response['token'];
    }


    public function sendPayment()

    {

        $auth_token = $this->getToken();
        $data = [
            "auth_token" => $auth_token,
            'delivery_needed' => false, //'SMS', 'EML', or 'ALL'
            'amount_cents' => 10,
            'currency' => 'EGP',
            'items' => [],
            'shipping_data' => ['' => ''],
            'shipping_details' => ['' => ''],
        ];
        $response = $this->paymobServices->sendRequest('ecommerce/orders', $data);
//        $response = Http::post(env('PAY_MOB_URL') . 'ecommerce/orders', $data)->json();
        $orderId = $response['id'];
        $invoiceUrl = $response['url'];
        return
            [
                'orderId' => $orderId,
                'invoiceUrl' => $invoiceUrl,
            ];

    }

    public function getPaymentToken()
    {
        $integrationId = env('INTEGRATION_ID');
        $orderId = $this->sendPayment()['orderId'];
        $data =
            [
                'auth_token' => $this->getToken(),
                'amount_cents' => 10,
                'expiration' => 3600,
                'order_id' => $orderId,
                'billing_data' => [
                    "apartment" => "803",
                    "email" => "claudette09@exa.com",
                    "floor" => "42",
                    "first_name" => "Clifford",
                    "last_name" => "Nicolas",
                    "phone_number" => "+86(8)9135210487",
                    "country" => "EGYPT",
                    "city" => "Cairo",
                    "state" => "Nasr City",
                    "street" => "Ethan Land",
                    "building" => "8028",
                    "shipping_method" => "PKG",
                    "postal_code" => "01898",
                ],
                'currency' => 'EGP',
                'integration_id' => $integrationId, //your dashboard  payment integeration id {paymob account} from your settings
            ];
        $response = $this->paymobServices->getPaymentToken('acceptance/payment_keys', $data);

        return $response['token'];

    }

    public function checkOut()
    {
        $this->getToken();
        $this->sendPayment();
        $checkOutToken = $this->getPaymentToken();
        return $this->paymobServices->getFrameId(env('IFRAME_ID'), $checkOutToken);
    }

}
