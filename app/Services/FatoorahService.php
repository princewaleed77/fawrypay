<?php

namespace App\Services;

use GuzzleHttp\Psr7\Header;
use http\Message\Body;
use Illuminate\Http\Client\Request;
//use http\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client;

class FatoorahService
{

    private $request;
    private $headers;
    private $base_url;
    private $response;

    public function __construct($base_url, $headers)
    {

        $this->base_url = $base_url;
        $this->headers = $headers;

    }

    public function buildRequest($uri, $data=[])

    {
        $this->headers = [
            'accept'=>'application/json',
            'api_token' =>  env('PAY_MOB_API_KEY')
        ];
        
        $response = Http::withHeaders($this->headers)->post($this->base_url.$uri, $data);
        // dd($response);

        return $response->body();
    }

    public function sendData($uri, $data = [])
    {

        $response = $this->buildRequest($this->base_url.$uri, $data);
        // $request = HTTP::withHeaders($this->headers)->post( $this->base_url.$uri, $data);
       
        return $response;
    }
}
