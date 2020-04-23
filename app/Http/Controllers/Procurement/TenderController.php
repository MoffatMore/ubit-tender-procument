<?php

    namespace App\Http\Controllers\Procurement;

    use App\Facade\TenderRepository;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreTenderRequest;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

    class TenderController extends Controller
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
         * @param Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store(StoreTenderRequest $request)
        {
            $results = TenderRepository::publishTender($request);
            if ($results) {
                $request->session()->flash('status', 'Successfully published a tender');
            }
            return redirect()->route('home');
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $pathToFile = storage_path() . '/app/' . $id;
            return response()->download($pathToFile);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param Request $request
         * @param int     $id
         *
         * @return RedirectResponse
         */
        public function update(Request $request, $id)
        {
            $results = TenderRepository::update($id,$request->all());
            if ($results){
                Session::flash('status', 'Successfully edited a tender');
            }else{
                Session::flash('status', 'Failed to edit a tender');
            }

            return redirect()->back();
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $results = TenderRepository::delete($id);
            if ($results){
                Session::flash('status', 'Successfully edited a tender');
            }else{
                Session::flash('status', 'Failed to edit a tender');
            }

            return redirect()->back();
        }
    }
