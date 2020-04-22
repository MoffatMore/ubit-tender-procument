<?php

    namespace App\Http\Controllers\Bidder;

    use App\Facade\BiddingRepository;
    use App\Http\Controllers\Controller;
    use App\Tender;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Storage;

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

        public function showTender(Tender $tender)
        {
            $tender = $tender->load(['user', 'user.organisation']);
            return view('tender.show', compact('tender'));
        }

        public function submitTender(Request $request)
        {
            if ($request->file()) {
                $files = array();
                foreach ($request->file() as $file) {
                    Storage::put($file->getClientOriginalName(), file_get_contents($file));
                    $files[] = $file->getClientOriginalName();
                }
                if (count($request->file()) === intval($request->doc_requirements)) {
                    BiddingRepository::bid([
                        'user_id' => Auth::user()->id,
                        'tender_id' => $request->tender_id,
                        'status' => 'approved',
                        'score' => 0,
                        'attachments' => implode(",", $files),
                        'qualification' => true,
                    ]);
                    Session::flash('status', 'Successfully place a bid for tender');
                } else {
                    BiddingRepository::bid([
                        'user_id' => Auth::user()->id,
                        'tender_id' => $request->tender_id,
                        'status' => 'rejected',
                        'attachments' => implode(",", $files),
                        'qualification' => false,
                        'score' => 0,
                    ]);
                    Session::flash('status', 'Successfully place a bid for tender');
                }

                return redirect()->route('bidder.tenders');
            }

        }

    }
