@extends('app')
<?php use Admailer\Models\User; ?>
@section('js')
   var datatable = $("#data-table-command").DataTable( {
    'oLanguage': {
          "sUrl": (window.location.pathname.split( '/' )[1] == 'ar' ? '{{ asset('/files/dataTable.json') }}' : '')
        }
        } );
    $('.command-add').on('click', function(e) {
        e.preventDefault()
        window.location.href = '{{ route('roles.index') }}/create' ;
    });

    $("#data-table-command").on("click", ".command-delete", function(e){
        e.preventDefault();
        var that = $(this);
        var rowId = $(this).data('row-id');
        var url = '{{ route('roles.index') }}/' + rowId + '/delete';
        swal({
            title: "@lang('common.are_you_sure')",
            text: "@lang('roles.delete_message')",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "@lang('roles.confirm_delete')",
            closeOnConfirm: false
        }, function(){
            $.post(url, {
                _token: '{{ csrf_token() }}'
            }, function() {
                var Row = that.closest('tr');
                datatable.row( Row ).remove().draw();
                swal("@lang('common.deleted')", "@lang('common.delete_success')", "success");
            });            
        });
    });
   
@endsection

@section('content')
    <div class="block-header">
        <h2><i class="md md-lock"></i> @lang('roles.page_title')</h2>

        <ul class="actions">
            <li>
                <a href="{{ route('roles.index') }}/create" class="btn btn-icon command-add" data-toggle="tooltip" data-placement="bottom" data-original-title="@lang('roles.create_page_title')"><span class="md mk md-add"></span></a>
            </li>
        </ul>

    </div>

    <div class="card">
        <div class="card-header">
        </div>

        <table id="data-table-command" class="uk-table uk-table-hover uk-table-striped">
            <thead>
                <tr>
                    <th>@lang('roles.id')</th>
                    <th>@lang('roles.position')</th>
                    <th>@lang('roles.status')</th>
                    <th>@lang('roles.action')</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>@lang('roles.id')</th>
                    <th>@lang('roles.position')</th>
                    <th>@lang('roles.status')</th>
                    <th>@lang('roles.action')</th>
                </tr>
            </tfoot>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <?php $count = User::where('role_id', '=', $role->id)->count(); ?>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->role_title }}</td>
                    <td><?= ($role->status == 1) ? @trans('common.active'): @trans('common.inactive') ?></td>
                    <td>
                        <a class="btn btn-icon command-edit" href="roles/{{ $role->id }}/edit" data-row-id="{{ $role->id }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.edit') {{ $role->role_title }}"><i class="md mk md-edit"></i></a>
                        
                        @if($count != 0)
                        <span class="btn btn-icon command-disabeld" data-toggle="tooltip" data-placement="top" data-original-title="@lang('roles.delete_tooltip')"><i class="md mk md-delete"></i></span>
                        @else
                        <a class="btn btn-icon command-delete" data-row-id="{{ $role->id }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.delete') {{ $role->role_title }}"><i class="md mk md-delete"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>
@endsection