@extends('layouts.default')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bid Tender</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ @csrf_token() }}">
                    <div class="table-responsive">
                        <table id="example1" class="table table-hover table-borderless nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Organisation Name</th>
                                <th>Tender Name</th>
                                <th>Reference No</th>
                                <th>Opening Date</th>
                                <th>Closing Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @inject('tenders','App\Repository\TenderRepositoryInterface')
                            @foreach ($tenders->availableTenders() as $tender)
                                <tr>
                                    <td>{{ $tender->id }}</td>
                                    <td>{{ $tender->user->organisation->name }}</td>
                                    <td>{{ $tender->name }}</td>
                                    <td>{{ $tender->reference_no }}</td>
                                    <td>{{ $tender->start_time }}</td>
                                    <td>{{ $tender->end_time }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm  text-center text-white" href=""><i
                                                    class="fa fa-eye"></i> view</a>
                                        <a class="btn btn-primary btn-sm  text-center text-white" data-toggle="modal"
                                           data-target="#editClientFileModal"><i class="fa
                                    fa-question"></i> enquire</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
