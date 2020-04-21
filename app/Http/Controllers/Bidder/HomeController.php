<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }

    public function awards()
    {
        return view('bidders.tender-awards');
    }

    public function tenders()
    {
        return view('bidders.bid-tender');
    }
}
