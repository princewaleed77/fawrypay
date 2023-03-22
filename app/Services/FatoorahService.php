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
        $this->base_url = env('base_url');
        $this->headers = [
            'content_type' => 'application/json',
            'authorization' => 'Bearer' . env('token')
        ];
    }

    public function buildRequest($uri, $data = [])

    {
        $request = HTTP::withHeaders($this->headers)->get($this->base_url . $uri);
        $response = json_decode($request->body());
        return $response;
    }
    
    public function sendData($uri, $data = [])
    {
        $request = Http::withHeaders($this->headers)->post($this->base_url . $uri, $data);
        return $request;
    }
}
