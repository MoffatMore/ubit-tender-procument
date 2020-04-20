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
                                <th>Organisation Name</th>
                                <th>Tender Name</th>
                                <th>Reference No</th>
                                <th>Opening Date</th>
                                <th>Closing Date</th>
                                <th>Requirements</th>
                                <th>Procuring Department</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>UB</td>
                                <td>Construction</td>
                                <td>TF-332-WS</td>
                                <td>20/01/2020</td>
                                <td>24/10/2020</td>
                                <td>x</td>
                                <td>UB CS</td>
                                <td>
                                    <a class="btn btn-info btn-sm  text-center text-white" href=""><i
                                                class="fa fa-award"></i> Evauate</a>
                                    <a class="btn btn-warning btn-sm  text-center text-white" data-toggle="modal"
                                       data-target="#editClientFileModal"><i class="fa
                                    fa-pencil-alt"></i> Edit</a>
                                    <button class="delete btn btn-danger btn-sm text-center text-white" id=""
                                            data-id=''>
                                        <i class="fa fa-trash"></i>Delete
                                    </button>
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
