<?php

    namespace App\Http\Controllers\Procurement;

    use App\Facade\TenderRepository;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

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

        public function publishResults(Request $request)
        {
            $results = TenderRepository::awardTender($request->tender_id);
            if ($results) {
                Session::flash('status', 'Successfully published results for the tender');
            } else {
                Session::flash('status', 'Failed to publish results for the tender');
            }
            return redirect()->home();
        }
    }
