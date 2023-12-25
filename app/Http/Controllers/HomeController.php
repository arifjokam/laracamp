<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class HomeController extends Controller
{
    public function dashboard()
    {
        switch (FacadesAuth::user()->is_admin) {
            case 'true':
                return \redirect(\route('admin.dashboard'));
                break;
            
            default:
                return \redirect(\route('user.dashboard'));
                break;
        }
    }
}