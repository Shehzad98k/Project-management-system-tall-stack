<?php

namespace App\Http\Livewire\Frontend\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
 
class LogoutController extends Component
{
    public function render()
    {
        return view('frontend.auth.logout-controller');
    }

    public function logout()
    {
        Auth::logout();
        session()->regenerate();

        return to_route('login');
    }
}
