<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Feeds;
use App\Models\Number;
use App\Models\NumberType;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feed = Feeds::make('http://www.infomoney.com.br/imoveis/rss');

        $lastNumberAvailable = Number::with('numberType')->where('type_id', 1)->orderBy('id', 'desc')->first();
        $lastNumberSold = Number::with('numberType')->where('type_id', 2)->orderBy('id', 'desc')->first();
        $lastNumberRented = Number::with('numberType')->where('type_id', 3)->orderBy('id', 'desc')->first();
        
        $data = array(
            'title'     => $feed->get_title(),
            'permalink' => $feed->get_permalink(),
            'items'     => $feed->get_items(),
            'availableNumber' => $lastNumberAvailable ? $lastNumberAvailable->value : '-',
            'soldNumber' => $lastNumberSold ? $lastNumberSold->value : '-',
            'rentedNumber' => $lastNumberRented ? $lastNumberRented->value : '-' 
        );

        return view('dashboard', $data);
    }
}