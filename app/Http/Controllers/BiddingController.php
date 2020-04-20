<?php

    namespace App\Http\Controllers;

    use App\Bidding;
    use App\Facade\BiddingRepository;
    use Illuminate\Http\Request;

    class BiddingController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Bidding $bidding
         *
         * @return \Illuminate\Http\Response
         */
        public function show(Bidding $bidding)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Bidding $bidding
         *
         * @return \Illuminate\Http\Response
         */
        public function edit(Bidding $bidding)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param \App\int                 $bidding
         *
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
            $results = BiddingRepository::setBidScore($id, $request->score);
            if ($results) {
                return redirect()->back()->with('status', 'Successfully evaluated a bidder');
            }
            return redirect()->back('fail', 'Failed to score a bidder');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Bidding $bidding
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy(Bidding $bidding)
        {
            //
        }
    }
