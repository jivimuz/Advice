<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return view('auth/login');
    }

    public function login(Request $request)
    {
        $DataUser = User::where('username', $request->username)->orWhere('email', $request->username)->first();
        if (!$DataUser) {
            return response()->json(['error' => 'Unknown Username / Email'], 401);
        }
        if (!$DataUser->is_active) {
            return response()->json(['error' => "User isn't active, please chat admin to activate."], 401);
        }
        $credentials = [
            'email' => $DataUser->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login Success'], 200);
        }

        return response()->json(['error' => 'Please insert the right Username/Password!!'], 401);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
