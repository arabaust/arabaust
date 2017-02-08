@extends('app')
<?php use Admailer\Models\Franchisees; ?>
@section('js')

     var datatable = $("#data-table-command").DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
    
    $('.command-delete').on('click', function(e) {
        e.preventDefault();
        var that = $(this);
        var rowId = $(this).data('row-id');
        var url = '{{ url('reports') }}/' + rowId + '/delete';
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this user!",
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
                datatable.row(Row).remove().draw();
                swal("Deleted!", "The user has been deleted.", "success");
            });
        });
    });

   
@endsection

@section('content')
    <div class="block-header">
        <h2><li class="zmdi zmdi-layers"></li> iPad Track Activities</h2>
    </div>

    <div class="card">
        <div class="card-header">
        </div>
        
        <table id="data-table-command" class="uk-table uk-table-hover uk-table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Activity</th>
                    <th>Franchisee User</th>
                    <th>Email</th>
                    <th>Franchisee</th>
                    <th>Country</th>
                    <th>Note</th>
                    <th>Commands</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Date</th>
                    <th>Activity</th>
                    <th>Franchisee User</th>
                    <th>Email</th>
                    <th>Franchisee</th>
                    <th>Country</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($reports as $report)
                    <tr>
                        <?php $franchisee = Franchisees::select('franchisee')->where('id', $report->client->franchisee_id)->first(); ?>
                        <td>{{ $report->created_at }}</td>
                        <td>{{ $report->change }} </td>
                        <td>{{ $report->client->first_name }} {{ $report->client->last_name }} </td>
                        <td>{{ $report->client->email }}</td>
                        <td><?= $franchisee->franchisee ?></td>
                        <td>{{ $report->client->country }}</td>
                        <td>
                            @if($report->change == 'Sign Up')
                                User ID: <a href="clients/{{$report->client->id}}/edit">{{$report->client->id}}</a>
                            @endif

                            @if($report->change == 'Print Form' || $report->change == 'Download Form')
                                Form ID: <a href="files/forms/{{ $report->form_id }}/{{ $report->form->pdf }}" target="_blank">{{ $report->form_id }}</a>
                            @endif
                        </td>
                        <td>
                            @if($report->read == '0')
                            <a href="reports/{{ $report->id }}/read" class="btn btn-icon command-email" data-row-id="{{ $report->id }}" data-toggle="tooltip" data-placement="top" data-original-title="Mark as Read"><i class="zmdi mk zmdi-email zmdi-hc-fw"></i></a>
                            @else
                            <a href="reports/{{ $report->id }}/unread" class="btn btn-icon command-email" data-row-id="{{ $report->id }}" data-toggle="tooltip" data-placement="top" data-original-title="Mark as Unread"><i class="zmdi mk zmdi-email-open zmdi-hc-fw"></i></a>
                            @endif
                            <a class="btn btn-icon command-delete" data-row-id="{{ $report->id }}" data-toggle="tooltip" data-placement="top" data-original-title="Delete {{ $report->client->username }}"><i class="md mk md-delete"></i></a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection