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
        var url = '{{ route('users.index') }}/' + rowId + '/delete';
        swal({
            title: "@lang('common.are_you_sure')",
            text: "@lang('users.delete_message')",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "@lang('users.confirm_delete')",
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
        <h2><li class="md md-people"></li> @lang('users.page_title')</h2>

        <ul class="actions">
            <li>
                <a href="{{ route('users.index') }}/create" class="btn btn-icon command-add" href="users/create" data-toggle="tooltip" data-placement="bottom" data-original-title="@lang('users.create_page_title')"><i class="md mk md-add"></i></a>
            </li>
        </ul>

    </div>

    <div class="card">
        <div class="card-header">
        </div>
    
        <table id="data-table-command" class="uk-table uk-table-hover uk-table-striped" cellspacing="0" >
            <thead>
                <tr>
                    <th>@lang('users.id')</th>
                    <th>@lang('users.username')</th>
                    <th width="220px">@lang('users.work_email')</th>
                    <th>@lang('users.full_name')</th>
                    <th>@lang('users.position')</th>
                    <th>@lang('users.status')</th>
                    <th>@lang('users.action')</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>@lang('users.id')</th>
                    <th>@lang('users.username')</th>
                    <th>@lang('users.work_email')</th>
                    <th>@lang('users.full_name')</th>
                    <th>@lang('users.position')</th>
                    <th>@lang('users.status')</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->role->role_title }}</td>
                        <td><?= ($user->status == 1) ? @trans('common.active'): @trans('common.inactive') ?></td>
                        <td class="td-spical">
                            <a class="btn btn-icon command-edit" href="users/{{ $user->id }}/edit" data-row-id="{{ $user->id }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.edit') {{ $user->username }}"><i class="md mk md-edit"></i></a>

                            @if($user->role->role_title == 'Admin' AND $user->username == 'master.admin')
                            <span class="btn btn-icon command-disabeld" data-toggle="tooltip" data-placement="top" data-original-title="@lang('users.delete_tooltip')"><i class="md mk md-delete"></i></span>
                            @else
                            <a class="btn btn-icon command-delete" data-row-id="{{ $user->id }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.delete') {{ $user->username }}"><i class="md mk md-delete"></i></a>

                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection