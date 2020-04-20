@extends('layouts.default')

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
                    <table id="example" class="table table-striped table-borderless nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tender Name</th>
                            <th>Reference No</th>
                            <th>Organisation Name</th>
                            <th>Documents</th>
                            <th>Qualification</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($tenders as $tender)
                            @foreach($tender->bids as $bid)
                                <tr>
                                    <td>{{ $tender->id }}</td>
                                    <td>{{ $tender->name }}</td>
                                    <td>{{ $tender->reference_no }}</td>
                                    <td>{{ $tender->user->organisation->name }}</td>
                                    <td>{{ $tender->requirements }}</td>
                                    <td>{{ $bid->qualification }}</td>
                                    <td>{{ $tender->status }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm  text-center text-white" href=""><i
                                                class="fa fa-award"></i> Evauate</a>
                                        <a class="btn btn-warning btn-sm  text-center text-white" data-toggle="modal"
                                           data-target="#editClientFileModal"><i class="fa
                                    fa-pencil-alt"></i> Edit</a>
                                        <button class="delete btn btn-danger btn-sm text-center text-white" id=""
                                                data-id=''>
                                            <i class="fa fa-trash"></i>Delete</button>
                                    </td>
                                </tr>
                            @endforeach
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
