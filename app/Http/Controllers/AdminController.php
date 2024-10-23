<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin');
    }

    public function adminLogin(Request $request)
    {

        $adminData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $request->session()->regenerate();
        if (Auth::attempt(['username' => $adminData['username'], 'password' => $adminData['password']])) {
            return redirect('menuAdmin')->with('success', 'You are logged in.');
        } else {
            return redirect('loginAdmin')->with('error', 'You are not an admin!');
            /* return back()->withErrors([
            'failed' => 'wrong username or password']);*/
        }
    }

    public function adminLogout(Request $request) {

        //logout admin:
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('offres')->with('success', 'You are logged out.');
    }

    public function compte() {
        return view('compte');
    }

    public function ennaNumbers() {
        return view('ennaNumbers');
    }

}
