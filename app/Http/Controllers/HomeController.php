<?php

    namespace App\Http\Controllers;


    class HomeController extends Controller
    {
        //
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index()
        {
            return view('home');
        }

        public function download($file_name)
        {
            $file_path = public_path('docs/' . $file_name);
            return response()->download($file_path);
        }

    }
