<?php

    namespace App\Http\Controllers;

    use App\Facade\UserRepository;
    use App\Message;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

    class MessageController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            //
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Response
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
         * @return Response
         */
        public function store(Request $request)
        {
            $results = UserRepository::sendQuery($request->all());
            if ($results) {
                return redirect()->back()->with('status', 'Successfully sent a query');
            }
            return redirect()->back()->with('fail', 'Failed to send a  query');

        }

        /**
         * Display the specified resource.
         *
         * @param \App\Message $message
         *
         * @return Response
         */
        public function show(Message $message)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Message $message
         *
         * @return Response
         */
        public function edit(Message $message)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param Request      $request
         * @param \App\Message $message
         *
         * @return Response
         */
        public function update(Request $request, Message $message)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Message $message
         *
         * @return Response
         */
        public function destroy(Message $message)
        {
            //
        }
    }
