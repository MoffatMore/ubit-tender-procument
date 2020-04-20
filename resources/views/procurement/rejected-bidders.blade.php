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
                    <table id="example1" class="table table-striped table-borderless nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tender Name</th>
                            <th>Reference No</th>
                            <th>Organisation Name</th>
                            <th>Documents</th>
                            <th>Qualification</th>
                            <th>Status</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($tenders as $tender)
                            @foreach($tender->bids as $bid)
                                <tr>
                                    <td>{{ $tender->id }}</td>
                                    <td>{{ $tender->name }}</td>
                                    <td>{{ $tender->reference_no }}</td>
                                    <td>{{ $bid->user->organisation->name }}</td>
                                    <td>
                                       @if ($bid->docs === 0)
                                            <i class="fa fa-times fa-2x text-danger"></i>
                                       @else
                                            <i class="fa fa-check fa-2x text-success" ></i>
                                       @endif
                                    </td>
                                    <td>
                                        @if ($bid->qualification === 0)
                                            <i class="fa fa-times fa-2x text-danger"></i>
                                        @else
                                            <i class="fa fa-check fa-2x text-success" ></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($bid->status === 0)
                                            <i class="fa fa-times fa-2x text-danger"></i>
                                        @else
                                            <i class="fa fa-check fa-2x text-success" ></i>
                                        @endif
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
