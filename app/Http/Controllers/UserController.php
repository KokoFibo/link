<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user($code)
    {
        // dd(auth()->user()->id);
        // $data = User::find(auth()->user()->id);
        $data = User::where('code', $code)->first();
        return view('link', [
            'data' => $data
        ]);
    }
}
