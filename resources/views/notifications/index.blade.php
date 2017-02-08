@extends('app')

@section('js')

    var datatable = $("#data-table-command").DataTable();
        
    $('.command-delete').on('click', function(e) {
        e.preventDefault();
        var that = $(this);
        var rowId = $(this).data('row-id');
        var url = '{{ url('notifications') }}/' + rowId + '/delete';
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this notification!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function(){
            $.post(url, {
                _token: '{{ csrf_token() }}'
            }, function() {
                var Row = that.closest('tr');
                datatable.row( Row ).remove().draw();
                swal("Deleted!", "The notification has been deleted.", "success");
            });            
        });
    });

@endsection

@section('content')
    <div class="block-header">
        <h2><li class="md md-notifications"></li>Notifications</h2>

        <ul class="actions">
            <li>
                <a href="{{ url('notifications') }}/create" class="btn btn-icon command-add" data-toggle="tooltip" data-placement="bottom" data-original-title="Add Notification"><span class="md mk md-add"></span></a>
            </li>
        </ul>

    </div>

    <div class="card">
        <div class="card-header">
        </div>

        <table id="data-table-command" class="uk-table uk-table-hover uk-table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <!-- <th>Positions</th> -->
                <th>Status</th>
                <th>Commands</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notifications as $notification)
                <tr>
                    <td>{{ $notification->id }}</td>
                    <td>{{ $notification->name }}</td>
                    <td><?= ($notification->status == 1) ? 'Sent': 'Not Sent' ?></td>
                    <td>
                        @if($notification->status == '0')
                        <a class="btn btn-icon command-edit" href="notifications/{{ $notification->id }}/edit" data-row-id="{{ $notification->id }}" data-toggle="tooltip" data-placement="top" data-original-title="Edit {{ $notification->name }}"><i class="md mk md-edit"></i></a>
                        <a href="notifications/{{ $notification->id }}/send" class="btn btn-icon command-email" data-row-id="{{ $notification->id }}" data-toggle="tooltip" data-placement="top" data-original-title="Send Notification"><i class="zmdi mk zmdi-email zmdi-hc-fw"></i></a>
                        @else
                        <a class="btn btn-icon command-show" href="notifications/{{ $notification->id }}/view/{{ $notification->role[0]->role_title }}" data-row-id="{{ $notification->id }}" data-toggle="tooltip" data-placement="top" data-original-title="Show {{ $notification->name }}"><i class="glyphicon mk glyphicon-eye-open"></i></a>

                        @endif

                        <a class="btn btn-icon command-delete" data-row-id="{{ $notification->id }}" data-toggle="tooltip" data-placement="top" data-original-title="Delete {{ $notification->name }}"><i class="md mk md-delete"></i></a>
                       
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection