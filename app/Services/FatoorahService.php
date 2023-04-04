<?php

namespace App\Services;

use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class FatoorahService
{

    private $client;
    private $headers;
    private $base_url;

    public function __construct(Http $client)
    {
        $this->client = $client;
        $this->base_url = env('FATOORAH_BASE_URL');
        $this->headers = [
            'Content_Type' => 'application/json',
            'authorization' => 'Bearer' . env('API_TOKEN')
        ];
    }

    public function buildRequest($uri, $data = [])

    {
        $response = Http::withHeaders($this->headers)->post($this->base_url . $uri , $this->headers);
        $response = json_decode($response->getBody(), true);
        // dd($response);
        return $response;
    }

    public function sendData($uri, $data = [])
    {
        
        $response = $this->buildRequest($this->base_url.$uri, $data);
        // $request = HTTP::withHeaders($this->headers)->post( $this->base_url.$uri, $data);
        return $response;
    }


}
