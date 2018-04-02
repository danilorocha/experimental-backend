<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Number;

class NumberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    
    public function index() {
        $numbers = NumberType::get();

        return view('home', $numbers);
    }
}