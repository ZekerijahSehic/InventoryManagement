<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    public function create()
    {
        return view('login.login');
    }
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user)
        {
            return back()->withErrors([
                'email' => 'Email not registered.'
            ]);
        }

        if (auth()->attempt($credentials))
        {
            return redirect('/products')->with('success', 'Welcome');
        }

        return back()->withErrors([
            'password' => 'Password incorrect.'
        ]);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
