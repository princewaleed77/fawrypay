<?php

namespace App\Services;


use http\Client;
use http\Url;
use Illuminate\Support\Facades\Http;


class PaymobServices
{

    private $headers;
    private $base_url;
    private $client;

    public function __construct(Http $client)
    {
        $this->headers = ['Content_Type' => 'application/json'];
        $this->base_url = env('pay_mob_url');
        $this->client = $client;

    }

    public function buildRequest($uri, $data)
    {

        return $request = Http::withHeaders($this->headers)
            ->post($this->base_url . $uri, $data)
            ->json();
    }

    public function sendRequest($uri, $data)
    {
        return $response = $this->buildRequest($this->base_url . $uri, $data);
    }

    public function getPaymentToken($uri = '', $data = [])
    {
//        $integrationId = env('INTEGRATION_ID');
        return $paymentToken = $this->buildRequest($this->base_url . $uri, $data);

    }

    public function getFrameId($frameId, $paymentToken)
    {
        return redirect("https://accept.paymobsolutions.com/api/acceptance/iframes/$frameId?payment_token=$paymentToken");
    }


}
