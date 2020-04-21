@extends('layouts.default')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 offset-1">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    @if (Auth::user()->hasRole('procurer'))
        @include('procurement.dashboard')
    @elseif(Auth::user()->hasRole('bidder'))
        @include('bidders.dashboard')
    @endif

@endsection
