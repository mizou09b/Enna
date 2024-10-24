<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EnnaNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function adminLogin(Request $request)
    {

        $adminData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $request->session()->regenerate();
        if (Auth::attempt(['username' => $adminData['username'], 'password' => $adminData['password']])) {
            return redirect(route('menuAdmin'))->with('success', 'You are logged in.');
        } else {
            return redirect(route('login'))->with('error', 'You are not an admin!');
        }
    }

    public function adminLogout(Request $request) {

        //logout admin:
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('offers'))->with('success', 'You are logged out.');
    }


    public function ennaNumbers() {
        return view('admin.ennaNumbers');
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
        return redirect(route('homepage'));
    }

    public function ennaNumbersDataAndEVents () {

        $ennaNumbers = EnnaNumber::orderBy('created_at', 'desc')->get();
         // Get all events ordered by created_at in descending order
         $events = Event::orderBy('created_at', 'desc')->get();
         return view('users.homepage', compact('events', 'ennaNumbers'));
     }

}
