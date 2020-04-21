<?php
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
                            <tbody>
                            <tr>
                                <td># {{ $tender->id }}</td>
                                <td>Organisation Name {{ $tender->user->organisation->name }}</td>
                                <td>Tender Name{{ $tender->name }}</td>
                                <td>Reference No{{ $tender->reference_no }}</td>
                                <td>Opening Date{{ $tender->start_time }}</td>
                                <td>Closing Date{{ $tender->end_time }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm  text-center text-white" href=""><i
                                                class="fa fa-send"></i> Apply</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
@endsection