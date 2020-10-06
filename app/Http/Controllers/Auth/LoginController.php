<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function login(Request $request)
    {
        auth()->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);

        if (auth()->id()) {
            cart()->update([
                'user_id' => auth()->id()
            ]);
        }

        return  back();
    }

    public function logout(Request $request) {
        if (auth()->id()) {
            auth()->logout();
        }
        return back();
    }
}
