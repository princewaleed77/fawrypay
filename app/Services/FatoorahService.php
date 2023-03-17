<?php

namespace App\Services;

use http\Client;
use Illuminate\Http\Request;
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
        'content_type'=>'application/json',
        'authorization'=>'Bearer' .env('token')
    ];

}
 public function buildRequest($uri, $method, $data =[])
{
    $request = HTTP::withHeaders($this->headers)->get($this->base_url.$uri, $method, $this->headers);
    $response = json_decode($request->body());
    return $response;
}





}
