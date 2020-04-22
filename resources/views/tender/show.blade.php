@extends('layouts.default')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('bidder.tenders') }}">Bid Tender</a></li>
            <li class="breadcrumb-item active" aria-current="page"> {{ $tender->name }} </li>
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
                        <table id="example1" class="table table-striped table-bordered nowrap"
                               style="width:100%; padding: 10px;" title="Details for tender">
                            <tbody>
                            <tr>
                                <td><em>Organisation Name</em>: {{ $tender->user->organisation->name }}</td>
                            </tr>
                            <tr>
                                <td><em>Tender Name</em>: {{ $tender->name }}</td>
                            </tr>
                            <tr>
                                <td><em>Reference No</em>: {{ $tender->reference_no }}</td>
                            </tr>
                            <tr>
                                <td><em>Opening Date</em>: {{ $tender->start_time }}</td>
                            </tr>
                            <tr>
                                <td><em>Closing Date</em>: {{ $tender->end_time }}</td>
                            </tr>
                            <tr>
                                <td><em>Procuring Department</em>: {{ $tender->proc_dept }}</td>
                            </tr>
                            <tr>
                                <td><em>Requirements</em>:</td>
                            </tr>
                            <tr>
                                <td>
                                    @php
                                        $index = 1;
                                    @endphp
                                    @foreach(preg_split('/\d/', $tender->requirements) as $doc)
                                        @if($doc !== '')
                                            <em>{{ $index . '. '. $doc }} </em><br>
                                            @php
                                                $index++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <td>
                                <a class="btn btn-info btn-sm  text-center text-white" href=""
                                   data-toggle="modal" data-target="#modelId">
                                    <i class="fa fa-file-signature"></i> Open Application Form</a>
                            </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tender: {{ $tender->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('bidder.submit-tender') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Please fill the information below</h4>
                            <p>You need to provide necessary information to be awarded a tender</p>
                            <p class="mb-0"></p>
                        </div>
                        @php
                            $index = 0;
                        @endphp
                        @foreach(preg_split('/\d/', $tender->requirements) as $doc)
                            @if ($index % 2 === 0)
                                <div class="row ml-2">
                                    <div class="col-md-6">
                                        @if($doc !== '')
                                            <div class="form-group">
                                                <label for="{{ $index }}"> {{ $doc }}</label>
                                                <input type="file" name="{{ Str::snake($doc) }}" id=""
                                                       class="form-control" placeholder=""
                                                       aria-describedby="helpId">
                                                <small id="helpId" class="text-muted text-danger">Required *</small>
                                            </div>
                                            @php
                                                $index++;
                                            @endphp
                                        @endif
                                    </div>
                                    @else
                                        <div class="col-md-6">
                                            @if($doc !== '')
                                                <div class="form-group">
                                                    <label for="{{ $index }}"> {{ $doc }}</label>
                                                    <input type="file" name="{{ Str::snake($doc) }}" id=""
                                                           class="form-control" placeholder=""
                                                           aria-describedby="helpId">
                                                    <small id="helpId" class="text-muted text-danger">Required *</small>
                                                </div>
                                                @php
                                                    $index++;
                                                @endphp
                                            @endif
                                        </div>
                                </div>
                            @endif

                        @endforeach
                        <div class="modal-footer">
                            <input type="hidden" value="{{ $index }}" name="doc_requirements">
                            <input type="hidden" value="{{ $tender->id }}" name="tender_id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection