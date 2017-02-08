@extends('app')

@section('js')
    var datatable = $("#data-table-command").DataTable();
@endsection

@section('content')
    <div class="block-header">
        <a class="btn btn-info btn-sm pull-right" href="{{ url('users') }}"> <i class="zmdi zmdi-arrow-back"></i> Back</a>
        <h2><i class="zmdi zmdi-file-text zmdi-hc-fw"></i> Track Activities</h2>
    </div>

    <div class="card">
        <div class="card-header">
        </div>

        <table id="data-table-command" class="uk-table uk-table-hover uk-table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Activity</th>
                    <th>Section</th>
                    <th>File ID</th>
                    <th>File Name</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Date</th>
                    <th>Activity</th>
                    <th>Section</th>
                    <th>File ID</th>
                    <th>File Name</th>
                </tr>
            </tfoot>
            <tbody>
            @foreach($tracks as $track)
                <tr>
                    <td>{{ $track->created_at }}</td>
                    <td>{{ $track->change }}</td>
                    <td>{{ $track->section }}</td>
                    <td>{{ $track->file_id }}</td>
                    <td>{{ $track->file_name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection