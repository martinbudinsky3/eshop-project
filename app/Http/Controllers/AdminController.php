<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



class AdminController extends Controller
{
    //
        public function index()
        {

        return redirect('https://stackoverflow.com/');



        }

        public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('role:ADMIN');
        }
}
