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
                    @if ($tender->end_time < now() && $tender->status !== 'evaluated')
                        @php
                            ++$index;
                        @endphp
                        <div class="card">
                            <div class="card-header" id="heading{{ $tender->id }}">
                                <h5 class="mb-2">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse{{ $tender->id }}" aria-expanded="true"
                                            aria-controls="collapseOne">
                                        Tender: {{ $tender->name }}
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse{{ $tender->id }}" class="collapse show"
                                 aria-labelledby="heading{{ $tender->id }}"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="{{ $tender->id }}" class="table table-striped table-borderless nowrap"
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
                                                @if ($bid->status === 'approved' )
                                                    <tr>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal{{ $bid->id }}"
                                                             tabindex="-1"
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
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                Bidder: {{ $bid->user->organisation->name }}
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5>List of Attachments</h5>
                                                                            <div class="alert alert-light fade show"
                                                                                 role="alert">
                                                                                <ul>
                                                                                    @foreach (explode(',',$bid->attachments) as $attachment)
                                                                                        <li>
                                                                                            <strong>
                                                                                                <a href="{{ route('procurement.tender.show',
                                                                            ['tender'=>$attachment]) }}">{{ $attachment }}</a>
                                                                                            </strong>
                                                                                        </li>

                                                                                    @endforeach
                                                                                </ul>
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
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">
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
                                                        <td>{{ $tender->status }}</td>
                                                        <td>
                                                            {{ $bid->score ?? 0 }}
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-info btn-sm  text-center text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#exampleModal{{ $bid->id }}">
                                                                <i class="fa fa-award"></i> Evaluate
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary"
                                                        data-toggle="modal"
                                                        data-target="#model{{ $tender->id }}">
                                                    <i class="fa fa-share-square"></i> Publish Results
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="model{{ $tender->id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form method="POST"
                                                              action="{{ route('procurement.publish-results') }}">
                                                            @csrf
                                                            <input type="hidden" name="tender_id"
                                                                   value="{{ $tender->id }}">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Publish Results for
                                                                        Tender: {{ $tender->name }}</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Publishing the results for this tender will award a
                                                                    bidder with highest score.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Close
                                                                    </button>
                                                                    <button type="submit" class="btn btn-success">
                                                                        Publish
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                $(".alert").alert();
                                            </script>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($tender->end_time < now() && $tender->status === 'evaluated')
                        
                        <div class="card">
                            <div class="card-header" id="heading{{ $tender->id }}">
                                <h5 class="mb-2">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse{{ $tender->id }}" aria-expanded="true"
                                            aria-controls="collapseOne">
                                        Tender: {{ $tender->name }}
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse{{ $tender->id }}" class="collapse show"
                                 aria-labelledby="heading{{ $tender->id }}"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="{{ $tender->id }}" class="table table-striped table-borderless nowrap"
                                               style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Reference No</th>
                                                <th>Organisation Name</th>
                                                <th>Status</th>
                                                <th>Score</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @inject('awards','App\Repository\BiddingRepositoryInterface')
                                            @if ($awards->getHighestBid($tender->id) !== null)
                                                @php
                                                $award = $awards->getHighestBid($tender->id);
                                                @endphp
                                                <tr>
                                                    <td>{{ $tender->id }}</td>
                                                    <td>{{ $tender->reference_no }}</td>
                                                    <td>{{ $award->user->organisation->name }}</td>
                                                    <td>{{ $tender->status }}</td>
                                                    <td>
                                                        {{ $award->score ?? 0 }}
                                                    </td>
                                                </tr>
                                            @endif
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endif
                    <script type="application/javascript">
                            $(document).ready(function () {
                                let groupColumn = 0;
                                $('#{{ $tender->id }}').DataTable({
                                    responsive: {
                                        details: {
                                            display: $.fn.dataTable.Responsive.display.modal({
                                                header: function (row) {
                                                    var data = row.data();
                                                    return 'Tender Details for ' + data[0];
                                                }
                                            })
                                            , renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                                                tableClass: 'table'
                                            })
                                        }
                                    }
                                    , "columnDefs": [{
                                        "visible": false
                                        , "targets": groupColumn
                                    }]
                                    , "displayLength": 10
                                    ,
                                });
                            });

                        </script>
                @endforeach
                @if ($index < 1)
                    <div class="alert alert-info text-center" role="alert">
                        No Tenders to evaluate at the moment!
                    </div>
                @endif
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
