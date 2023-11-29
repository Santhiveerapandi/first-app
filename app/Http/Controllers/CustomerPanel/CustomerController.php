<?php

namespace App\Http\Controllers\CustomerPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        if(Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role == 'vendor') {
            return redirect()->route('vendor.dashboard');
        }
        return view('dashboard');
    }
}
