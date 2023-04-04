<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Services\FatoorahService;
use React\Http\Client\Request as ClientRequest;


class ActivityController extends Controller
{
    private $fatoorah;
    public function __construct(FatoorahService $fatoorah)
    {
        $this->fatoorah = $fatoorah;
    }

    public function index()
    {
        $activities = Activity::all();
        return view('admin.home', [
            'activities' => $activities
        ]);
    }



    public function pay( )
    {

        $data =[
            'NotificationOption' => 'Lnk', //'SMS', 'EML', or 'ALL'
            'InvoiceAmount'=>'100',
            'CurrencyIso'=>'EGP'

        ];
        $response = $this->fatoorah->buildRequest('/v2/InitiatePayment',$data);

        return $response;
//        return view('home', ['response'=>$response]);
    }


    public function send($uri,$data=[])

    {
        $data = [
            'NotificationOption' => 'Lnk', //'SMS', 'EML', or 'ALL'
            'InvoiceValue'       => 10,
            'CustomerName'       => 'fnamelname',
            'CurrencyIso'=>'EGP',
            "CallBackUrl"=> "https://google.com",
            "ErrorUrl"=>"https://youtube.com",

];
        // $fatoorah = new FatoorahService(ClientRequest $client_request);
        $request = $this->fatoorah->sendData('v2/SendPayment', $data);

        return json_decode($request) ;
//        return redirect()->route('users.pay')->with($invoice);
    }


}
