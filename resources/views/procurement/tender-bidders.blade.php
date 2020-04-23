@extends('layouts.default')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tenders</li>
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
                        <table id="example" class="table table-striped table-borderless nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tender Name</th>
                                <th>Reference No</th>
                                <th>Opening Date</th>
                                <th>Closing Date</th>
                                <th>Bids</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($tenders as $tender)
                                <tr>
                                    <td>{{ $tender->id }}</td>
                                    <td>{{ $tender->name }}</td>
                                    <td>{{ $tender->reference_no }}</td>
                                    <td>{{ $tender->start_time }}</td>
                                    <td>{{ $tender->end_time }}</td>
                                    <td>
                                        {{ $tender->bids === null ? 0 : $tender->bids->count() }}
                                    </td>
                                    <td>
                                        @if ($tender->end_time < now())
                                            <a class="btn btn-info btn-sm  text-center text-white"
                                               href="{{ route('procurement.tender-evaluation') }}"><i
                                                        class="fa fa-award"></i> Evauate</a>
                                        @else
                                        <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#model{{ $tender->id }}">
                                                <i class="fa fa-pencil-alt"></i> Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="model{{ $tender->id }}" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('procurement.tender.update',['tender'=> $tender->id]) }}" method="POST" enctype="multipart/form-data"
                                                              id="form">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="form-group {{ $errors->has('org_name') ? 'has-error' : '' }}">
                                                                                <label for="venue">Organisation Name</label>
                                                                                <input type="text" id="org_name" name="org_name" class="form-control"
                                                                                       value="{{ Auth::user()->organisation->name }}" required readonly>
                                                                                <input type="hidden" id="org_name" name="org_id" class="form-control"
                                                                                       value="{{ Auth::user()->organisation->id }}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group {{ $errors->has('tender_name') ? 'has-error' : '' }}">
                                                                                <label for="venue">Tender Name</label>
                                                                                <input type="text" id="tender_name" name="tender_name" class="form-control"
                                                                                       value="{{ $tender->name }}" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="form-group {{ $errors->has('reference_no') ? 'has-error' : '' }}">
                                                                                <label for="venue">Tender Reference Number</label>
                                                                                <input type="text" id="reference_no" name="reference_no" class="form-control"
                                                                                       value="{{ $tender->reference_no }}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group {{ $errors->has('proc_dept') ? 'has-error' : '' }}">
                                                                                <label for="venue">Procuring Department</label>
                                                                                <input type="text" id="proc_dept" name="proc_dept" class="form-control"
                                                                                       value="{{ $tender->proc_dept }}" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                                                                                <label for="venue">Opening Date</label>
                                                                                <input type="text" id="start_time" name="start_time" class="form-control datetime"
                                                                                       value="{{ $tender->start_time }}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                                                                                <label for="venue">Cosing Date</label>
                                                                                <input type="text" id="end_time" name="end_time" class="form-control datetime"
                                                                                       value="{{ $tender->end_time }}" required>
                                                                                @if($errors->has('end_time'))
                                                                                    <em class="invalid-feedback">
                                                                                        {{ $errors->first('end_time') }}
                                                                                    </em>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12"><div class="form-group {{ $errors->has('requirements') ? 'has-error' : '' }}">
                                                                                <label for="requirements">Tender Requirements</label>
                                                                                <textarea type="text" id="requirements" name="requirements"
                                                                                          class="form-control" required cols="1" rows="10" wrap="on"
                                                                                          style="text-align: left; padding: -10px;">{{ old('requirements') }}
    1. Company Certificate
    2. Tax Clearance
    3. Banc Acc
    4. Trading licence
    5. PPADB
    6. Quatation
                                </textarea>
                                                                                @if($errors->has('requirements'))
                                                                                    <em class="invalid-feedback">
                                                                                        {{ $errors->first('requirements') }}
                                                                                    </em>
                                                                                @endif
                                                                            </div></div>
                                                                    </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa fa-share-square"></i> Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Button trigger modal -->
                                            <button class="delete btn btn-danger btn-sm text-center text-white"
                                                    data-toggle="modal" data-target="#modelDelete{{ $tender->id }}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modelDelete{{ $tender->id }}" tabindex="-1" role="dialog"
                                                 aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST"
                                                              action="{{ route('procurement.tender.destroy',['tender'=>$tender->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Tender</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-danger" role="alert">
                                                                <strong>Are you sure you want to delete this tender?</strong>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close
                                                            </button>

                                                                <button type="submit" class="btn btn-primary">Save</button>

                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
