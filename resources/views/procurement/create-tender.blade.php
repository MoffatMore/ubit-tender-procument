@extends('layouts.default')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Tender</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col col-md-10  col-lg-10 col-sm-6 offset-0 ml-5">
            <div class="card">
                <div class="card-header">Invitation to tender IT Equipment
                </div>

                <div class="card-body">
                    <form action="{{ route('procurement.tender.store') }}" method="POST" enctype="multipart/form-data"
                          id="form">
                        @csrf
                        <div class="form-group {{ $errors->has('org_name') ? 'has-error' : '' }}">
                            <label for="venue">Organisation Name</label>
                            <input type="text" id="org_name" name="org_name" class="form-control"
                                   value="{{ Auth::user()->organisation->name }}" required readonly>
                            <input type="hidden" id="org_name" name="org_id" class="form-control"
                                   value="{{ Auth::user()->organisation->id }}" required>
                        </div>
                        <div class="form-group {{ $errors->has('tender_name') ? 'has-error' : '' }}">
                            <label for="venue">Tender Name</label>
                            <input type="text" id="tender_name" name="tender_name" class="form-control"
                                   value="{{ old('tender_name') }}" required>
                            @if($errors->has('tender_name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('tender_name') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('reference_no') ? 'has-error' : '' }}">
                            <label for="venue">Tender Reference Number</label>
                            <input type="text" id="reference_no" name="reference_no" class="form-control"
                                   value="{{ Str::referenceNumber() }}" required>
                            @if($errors->has('reference_no'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('reference_no') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('requirements') ? 'has-error' : '' }}">
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
                        </div>
                        <div class="form-group {{ $errors->has('proc_dept') ? 'has-error' : '' }}">
                            <label for="venue">Procuring Department</label>
                            <input type="text" id="proc_dept" name="proc_dept" class="form-control"
                                   value="{{ old('proc_dept') }}" required>
                            @if($errors->has('proc_dept'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('proc_dept') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                            <label for="venue">Opening Date</label>
                            <input type="text" id="start_time" name="start_time" class="form-control datetime"
                                   value="{{ old('start_time') }}" required>
                            @if($errors->has('start_time'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('start_time') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                            <label for="venue">Cosing Date</label>
                            <input type="text" id="end_time" name="end_time" class="form-control datetime"
                                   value="{{ old('end_time') }}" required>
                            @if($errors->has('end_time'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('end_time') }}
                                </em>
                            @endif
                        </div>
                        <div>
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-share-square"></i> Publish Tender Notice
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
