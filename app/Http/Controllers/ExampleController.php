<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'name_default' => '名前の初期値',
        ];

        return view('example', $data);
    }

    public function send(Request $request)
    {
        Log::debug('name:' . $request['name']);
        Log::debug('message:' . $request['message']);

        return redirect('example');
    }
}
