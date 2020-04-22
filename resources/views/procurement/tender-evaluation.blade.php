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
                @php
                    $index = 0;
                @endphp
                @foreach($tenders as $tender)
                    @if ($tender->end_time < now())
                        <div class="card">
                            <div class="card-header" id="heading{{ $tender->id }}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse{{ $tender->id }}" aria-expanded="true"
                                            aria-controls="collapseOne">
                                        Tender: {{ $tender->name }}
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse{{ $tender->id }}" class="collapse {{ $index === 0 ? 'show' : ''}}"
                                 aria-labelledby="heading{{ $tender->id }}"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-borderless nowrap"
                                               style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Reference No</th>
                                                <th>Organisation Name</th>
                                                <th>Documents</th>
                                                <th>Qualification</th>
                                                <th>Status</th>
                                                <th>Score</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($tender->bids as $bid)
                                                @if ($bid->status === 'approved')
                                                    <tr>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal{{ $bid->id }}" tabindex="-1"
                                                             role="dialog"
                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form name="score"
                                                                      action="{{ route('bids.update',['bid'=> $bid->id]) }}"
                                                                      method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Bidder: {{ $bid->user->organisation->name }}
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <div class="alert alert-info alert-dismissible fade show"
                                                                                 role="alert">
                                                                                <strong>
                                                                                    <a href="{{ route('procurement.tender.show',
                                                                            ['tender'=>'hie.txt']) }}">A simple primary
                                                                                        alert—check it out!</a>
                                                                                </strong>
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="alert"
                                                                                        aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                            <span class="input-group-text"
                                                                                  id="inputGroup-sizing-default">
                                                                                Score
                                                                            </span>
                                                                                </div>
                                                                                <input type="text" class="form-control"
                                                                                       aria-label="Sizing example input"
                                                                                       aria-describedby="inputGroup-sizing-default"
                                                                                       name="score">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                            <button type="submit" class="btn btn-primary">
                                                                                Save changes
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <td>{{ $tender->id }}</td>
                                                        <td>{{ $tender->reference_no }}</td>
                                                        <td>{{ $bid->user->organisation->name }}</td>
                                                        <td>
                                                            @if (null === $bid->attachments)
                                                                <i class="fa fa-times fa-2x text-danger"></i>
                                                            @else
                                                                <i class="fa fa-check fa-2x text-success"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($bid->qualification === 0)
                                                                <i class="fa fa-times fa-2x text-danger"></i>
                                                            @else
                                                                <i class="fa fa-check fa-2x text-success"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <i class="fa fa-check fa-2x text-success"></i>
                                                        </td>
                                                        <td>
                                                            {{ $bid->score ?? 0 }}
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-info btn-sm  text-center text-white"
                                                                    data-toggle="modal" data-target="#exampleModal{{ $bid->id }}">
                                                                <i class="fa fa-award"></i> Evaluate
                                                            </button>
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
                    @else
                        @if ($index < 1)
                            <div class="alert alert-info text-center" role="alert">
                                No Tenders to evaluate at the moment!
                            </div>
                            @break
                        @endif
                    @endif
                    @php
                        ++$index;
                    @endphp
                @endforeach
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
