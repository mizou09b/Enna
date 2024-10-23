<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EnnaNumber;
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

    public function ennaNumbersForm(Request $request) {

        $ennaNumbers = $request->validate([
            'Aerodromes_Internationaux' => 'numeric',
            'Aerodromes_Nationaux' => 'numeric',
            'Movements_Aerodromes' => 'numeric',
            'Survols' => 'numeric'
        ]);

        $ennaNumbers['user_id'] = Auth::id();
        EnnaNumber::create($ennaNumbers);
        return redirect('/');
    }

    public function ennaNumbersDataAndEVents () {

        $ennaNumbers = EnnaNumber::orderBy('created_at', 'desc')->get();
         // Get all events ordered by created_at in descending order
         $events = Event::orderBy('created_at', 'desc')->get();
         return view('homepage', compact('events', 'ennaNumbers'));
     }

}
