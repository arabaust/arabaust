@extends('app')

@section('js')
    
     var datatable = $("#data-table-command").DataTable( {
        'oLanguage': {
              "sUrl": (window.location.pathname.split( '/' )[1] == 'ar' ? '{{ asset('/files/dataTable.json') }}' : '')
            },
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value="">@lang('common.all')</option></select>')
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

    $("#data-table-command").on("click", ".command-delete", function(e){
        e.preventDefault();
        var that = $(this);
        var rowId = $(this).data('row-id');
        var url = '{{ route('clients.index') }}/' + rowId + '/delete';
        swal({
            title: "@lang('common.are_you_sure')",
            text: "@lang('clients.delete_message')",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "@lang('clients.confirm_delete')",
            closeOnConfirm: false
        }, function(){
            $.post(url, {
                _token: '{{ csrf_token() }}'
            }, function() {
                var Row = that.closest('tr');
                datatable.row(Row).remove().draw();
                swal("@lang('common.deleted')", "@lang('common.delete_success')", "success");
            });
        });
    });

@endsection

@section('content')
    <div class="block-header">
        <h2><li class="md md-people"></li> @lang('clients.page_title')</h2>

        <ul class="actions">
            <li>
                <a href="{{ route('clients.index') }}/create" class="btn btn-icon command-add" data-toggle="tooltip" data-placement="bottom" data-original-title="@lang('clients.create_page_title')"><span class="md mk md-add"></span></a>
            </li>
        </ul>

    </div>

    <div class="card">
        <div class="card-header">
        </div>

        <table id="data-table-command" class="uk-table uk-table-hover uk-table-striped">
            <thead>
                <tr>
                    <th>@lang('clients.id')</th>
                    <th>@lang('clients.full_name')</th>
                    <th width="220">@lang('clients.email')</th>
                    <th>@lang('clients.status')</th>
                    <th>@lang('clients.action')</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>@lang('clients.id')</th>
                    <th>@lang('clients.full_name')</th>
                    <th>@lang('clients.email')</th>
                    <th>@lang('clients.status')</th>
                </tr>
            </tfoot>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client['id'] }}</td>
                    <td>{{ $client['first_name'] }} {{ $client['last_name'] }}</td>
                    <td>{{ $client['email'] }}</td>
                    <!-- <td>{{ $client['country'] }}</td> -->
                    <td><?= ($client->status == 1) ? @trans('common.active'): @trans('common.inactive') ?></td>
                    <td class="td-spical">

                        <a class="btn btn-icon command-edit" href="clients/{{ $client->id }}/edit" data-row-id="{{ $client->id }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.edit') {{$client->first_name}}"><i class="md mk md-edit"></i></a>
                        
                        <a class="btn btn-icon command-delete" data-row-id="{{ $client->id }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.delete') {{ $client->first_name}}"><i class="md mk md-delete"></i></a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection