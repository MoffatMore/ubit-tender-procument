<?php

    namespace App\Http\Controllers\Procurement;

    use App\Http\Controllers\Controller;

    class HomeController extends Controller
    {
        //
        public function __construct()
        {
            $this->middleware(['auth']);
        }

        public function index()
        {
            return view('home');
        }

        public function tenders()
        {
            return view('procurement.tender-bidders');
        }

        public function createTenders()
        {
            return view('procurement.create-tender');
        }

        public function rejectedTenders()
        {
            return view('procurement.rejected-bidders');
        }

        public function tenderEvaluation()
        {
            return view('procurement.tender-evaluation');
        }

        public function setBidScore($id, $score)
        {

        }
    }
