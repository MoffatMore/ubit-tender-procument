@extends('layouts.default')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Evaluate Bidders</li>
        </ol>
    </nav>
@endsection

@section('content')

<div class="row">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="accordion" id="accordionExample">
            <input type="hidden" name="_token" value="{{ @csrf_token() }}">
            @foreach($tenders as $tender)
                <div class="card">
                    <div class="card-header" id="heading{{ $tender->id }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $tender->id }}" aria-expanded="true" aria-controls="collapseOne">
                                Tender: {{ $tender->name }}
                            </button>
                        </h5>
                    </div>

                    <div id="collapse{{ $tender->id }}" class="collapse" aria-labelledby="heading{{ $tender->id }}"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-borderless nowrap" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reference No</th>
                                        <th>Organisation Name</th>
                                        <th>Documents</th>
                                        <th>Qualification</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($tender->bids as $bid)
                                        @if ($bid->status === 'approved')
                                            <tr>
                                                <td>{{ $tender->id }}</td>
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
                                                    <i class="fa fa-check fa-2x text-success" ></i>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info btn-sm  text-center text-white" href="">
                                                        <i class="fa fa-award"></i> Evauate</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
