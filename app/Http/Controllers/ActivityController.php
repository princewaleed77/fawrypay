<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Services\FatoorahService;
use Illuminate\Http\Request;


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

    public function show($id)
    {
        // $activity = Activity::findOrFail($id);
        //        return response()->json($activity);
        $post = $this->fatoorah->buildRequest('posts/' . $id);
        return view('welcome', compact('post'));
    }


    public function pay()
    {
        $response = $this->fatoorah->buildRequest('posts');

        return view('home', ['response' => $response]);
    }


    public function addPost()

    {
        $activities = Activity::all();

        $request = $this->fatoorah->sendData('posts', ['activities'=>$activities]);
        return $request->json();
//        return redirect()->route('users.pay')->with($activities);
    }


}
