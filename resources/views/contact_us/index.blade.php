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
        var url = '{{ route('contact_us.index') }}/' + rowId + '/destroy';
        swal({
            title: "@lang('common.are_you_sure')",
            text: "@lang('contact_us.are_you_sure')",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "@lang('contact_us.confirm_delete')",
            closeOnConfirm: false ,
            cancelButtonText: "@lang('pages.cancle_delete')",

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
        <h2>
        <li class="zmdi zmdi-edit"></li> @lang('contact_us.page_title')
        </h2>

        <ul class="actions">
            <li>
            </li>
        </ul>

    </div>

    <div class="card">
        <div class="card-header">
        </div>
    
        <table id="data-table-command" class="uk-table uk-table-hover uk-table-striped" cellspacing="0" >
            <thead>
                <tr>
                    <th>@lang('contact_us.id')</th>
                    <th>@lang('contact_us.title')</th>
                    <th>@lang('contact_us.email')</th>
                    <th>@lang('contact_us.phone')</th>
                    <th>@lang('contact_us.sent')</th>
                    <th>@lang('contact_us.action')</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>@lang('contact_us.id')</th>
                    <th>@lang('contact_us.title')</th>
                    <th>@lang('contact_us.email')</th>
                    <th>@lang('contact_us.phone')</th>
                    <th>@lang('contact_us.sent')</th>
                    <th>@lang('contact_us.action')</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($contcts as $cont)
                    <tr>
                        <td>{{ $cont['id'] }}</td>
                        <td>{{ $cont['title'] }}</td>
                        <td>
                            <a href="mailto:{{ $cont['email'] }}">
                            {{ $cont['email'] }}
                            </a>
                        </td>
                        <td>{{ $cont['phone'] }}</td>
                        <td>{{ $cont['created_at'] }}</td>
                        <td style="width:40%;">
                            <a 
                            class="btn btn-icon command-edit" 
                            href="contact_us/{{ $cont['id'] }}/show" 
                            data-row-id="{{ $cont['id'] }}" data-toggle="tooltip" 
                            data-placement="top" 
                            data-original-title="@lang('common.show') {{ $cont['title'] }}">
                            <i class="md mk md-info"></i>
                            </a>
                            <a 
                            class="btn btn-icon command-delete" 
                            data-row-id="{{ $cont['id'] }}" 
                            data-toggle="tooltip" 
                            data-placement="top" data-original-title="@lang('common.delete') {{ $cont['title'] }}"><i 
                            class="md mk md-delete"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection