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

                                <!-- Modal -->
                                <div class="modal fade" id="modelId" tabindex="-1" role="dialog"
                                     aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="POST" action="{{ route('message.store') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        Source: {{ $tender->user->organisation->name }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="user_id"
                                                           value="{{ Auth::user()->id }}">
                                                    <input type="hidden" class="form-control" name="tender_id"
                                                           value="{{ $tender->id }}">
                                                    <div class="form-group">
                                                    <textarea name="message" id="" cols="30" rows="10"
                                                              class="form-control"></textarea>
                                                        <small id="helpId" class="text-muted">Enter query</small>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-envelope"></i> Send
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <tr>
                                    <td>{{ $tender->id }}</td>
                                    <td>{{ $tender->user->organisation->name }}</td>
                                    <td>{{ $tender->name }}</td>
                                    <td>{{ $tender->reference_no }}</td>
                                    <td>{{ $tender->start_time }}</td>
                                    <td>{{ $tender->end_time }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm  text-center text-white"
                                           href="{{ route('bidder.show-tender',[ 'tender' => $tender->id]) }}"><i
                                                    class="fa fa-folder-open"></i> open</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#modelId">
                                            <i class="fa fa-question"></i> enquire
                                        </button>
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
