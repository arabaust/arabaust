@extends('app')
<?php use Admailer\Models\BaseModel; ?>

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
        var url = '{{ route('gallary.index') }}/' + rowId + '/delete';
        swal({
            title: "@lang('common.are_you_sure')",
            text: "@lang('gallary.delete_message')",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "@lang('gallary.confirm_delete')",
            closeOnConfirm: false,
           cancelButtonText: "@lang('common.cancle_delete')",

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
<?php 
$current_route = Request::route()->getName();

?>

    <div class="block-header">
        <h2><li class="zmdi zmdi-format-align-justify"></li>      
           @lang('gallary.page_title')
        </h2>
        <ul class="actions">
            <li>
                <a href="{{ route('gallary.index') }}/create" class="btn btn-icon command-add" data-toggle="tooltip" data-placement="bottom" data-original-title="@lang('gallary.create_page_title')"><span class="md mk md-add"></span></a>
            </li>
        </ul>
        
    </div>

    <div class="card">
        <div class="card-header">
        </div>

        <table id="data-table-command" class="uk-table uk-table-hover uk-table-striped">
            <thead>
                <tr>
                    <th>@lang('gallary.id')</th>
                    <th>@lang('gallary.title')</th>
                    <th>@lang('gallary.action')</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>@lang('gallary.id')</th>
                    <th>@lang('gallary.title')</th>


                </tr>
            </tfoot>
            <tbody>
            @foreach($gallary as $value)
              <tr>
                    <td>{{ $value['id'] }}</td>

                    <td>{{ $value['title'] }}</td>

                    <td class="td-spical">

                        
            
                        <a class="btn btn-icon command-edit" href="{{ route('gallary.index') }}/{{ $value->id }}/edit" data-row-id="{{ $value->id }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.edit') "><i class="md mk md-edit"></i></a>
                        <a class="btn btn-icon command-delete"  href="{{ route('gallary.index') }}" data-row-id="{{ $value->id }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.delete')"><i class="md mk md-delete"></i></a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection