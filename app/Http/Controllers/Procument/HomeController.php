<?php

namespace App\Http\Controllers\Procument;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function tenders()
    {
        return view('procument.tender-bidders');
    }

    public function createTenders()
    {
        return view('procument.create-tender');
    }

    public function rejectedTenders()
    {
        return view('procument.rejected-bidders');
    }

    public function tenderEvaluation()
    {
        return view('procument.tender-evaluation');
    }
}
