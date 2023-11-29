<?php

namespace App\Http\Controllers\VendorPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        return view('vendor.dashboard');
    }
}
