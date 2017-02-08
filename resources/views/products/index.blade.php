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
        var url = '{{ route('products.index') }}/' + rowId + '/delete';
        swal({
            title: "@lang('common.are_you_sure')",
            text: "@lang('products.delete_message')",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "@lang('products.confirm_delete')",
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
           @lang('products.page_title')
        </h2>
        <ul class="actions">
            <li>
                <a href="{{ route('products.index') }}/create" class="btn btn-icon command-add" data-toggle="tooltip" data-placement="bottom" data-original-title="@lang('products.create_page_title')"><span class="md mk md-add"></span></a>
            </li>
        </ul>
        
    </div>

    <div class="card">
        <div class="card-header">
        </div>

        <table id="data-table-command" class="uk-table uk-table-hover uk-table-striped">
            <thead>
                <tr>
                    <th>@lang('products.id')</th>
                    <th>@lang('products.product_name')</th>
                    <th>@lang('products.status')</th>
                    <th>@lang('products.action')</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>@lang('products.id')</th>
                    <th>@lang('products.product_name')</th>
                    <th>@lang('products.status')</th>


                </tr>
            </tfoot>
            <tbody>
            @foreach($products as $product)
              <tr>
                    <td>{{ $product['id'] }}</td>

                    <td>{{ $product[App::getLocale().'_name'] }}</td>

                    <td><?= ($product->status == 1) ? @trans('common.active'): @trans('common.inactive') ?></td>
                    <td class="td-spical">

                        
            
                        <a class="btn btn-icon command-edit" href="{{ route('products.index') }}/{{ $product->id }}/edit" data-row-id="{{ $product->id }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.edit') {{ $product[App::getLocale().'_product_name'] }}"><i class="md mk md-edit"></i></a>
                        <a class="btn btn-icon command-delete"  href="{{ route('products.index') }}" data-row-id="{{ $product->id }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.delete') {{ $product[App::getLocale().'_product_name'] }}"><i class="md mk md-delete"></i></a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection