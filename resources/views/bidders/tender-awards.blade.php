@extends('layouts.default')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bids & Awards</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div id="accordianId" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="card-header" role="tab" id="section2HeaderId">
                <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section2ContentId" aria-expanded="true"
                       aria-controls="section2ContentId">
                        <i class="fa fa-award"></i> Tender Awards
                    </a>
                </h5>
            </div>
            <div id="section2ContentId" class="collapse in" role="tabpanel" aria-labelledby="section2HeaderId">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Organisation Name</th>
                                <th>Tender Name</th>
                                <th>Reference No</th>
                            </tr>
                            </thead>
                            <tbody>
                            @inject('awards','App\Repository\UserRepositoryInterface')
                            @foreach ($awards->myTenderAwards() as $award)
                                <tr>
                                    <td>{{ $award->id }}</td>
                                    <td>{{ $award->tender->user->organisation->name }}</td>
                                    <td>{{ $award->tender->name }}</td>
                                    <td>{{ $award->tender->reference_no }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="section1HeaderId">
                <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true"
                       aria-controls="section1ContentId">
                        <i class="fa fa-folder"></i> Tender Bids
                    </a>
                </h5>
            </div>
            <div id="section1ContentId" class="collapse show" role="tabpanel" aria-labelledby="section1HeaderId">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
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
                            @inject('bids','App\Repository\BiddingRepositoryInterface')
                            @foreach ($bids->getMyBids() as $bid)
                                <tr>
                                    <td>{{ $bid->id }}</td>
                                    <td>{{ $bid->tender->user->organisation->name }}</td>
                                    <td>{{ $bid->tender->name }}</td>
                                    <td>{{ $bid->tender->reference_no }}</td>
                                    <td>{{ $bid->tender->start_time }}</td>
                                    <td>{{ $bid->tender->end_time }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
