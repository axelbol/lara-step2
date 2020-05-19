<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterStep2Controller extends Controller
{
    use RegistersUsers;

    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        $countries = Country::all();
        return view('auth.registerstep2', compact('countries'));
    }

    public function postForm(Request $request)
    {
        auth()->user()->update($request->only(['biography', 'country_id']));
        return redirect()->route('home');
    }
}
