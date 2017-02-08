@extends('app')
<?php use Admailer\Models\BaseModel; ?>
@section('js')
    var datatable = $("#data-table-command").DataTable();

    $('.command-delete').on('click', function(e) {
        e.preventDefault();
        var that = $(this);
        var rowId = $(this).data('row-id');
        var url = '{{ url('dashboard') }}/' + rowId + '/delete';
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this franchisse user!",
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
                swal("Deleted!", "The franchisse user has been deleted.", "success");
            });
        });
    });
@endsection

@section('content')

    <div class="block-header">
        <h2><i class="md md-home"></i> @lang('dashboard.page_title')</h2>
        <div class="container">
        <div class="row">&nbsp</div>

        <!-- counters  -->
        <div class="row">
            @if(isAllowed('clients'))
            <div class="col-sm-6 col-md-3">
                <div class="mini-charts-item bgm-lightgreen">
                    <div class="clearfix">
                        <div class="chart stats-bar"><canvas style="display: inline-block; width: 68px; height: 35px; vertical-align: top;" width="68" height="35"></canvas></div>
                        <a href="{{ route('clients.index') }}">
                            <div class="count">
                                <small>@lang('menu.clients')</small>
                                <h2>{{$clients_count}}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            
            @if(isAllowed('contactus'))
            <div class="col-sm-6 col-md-3">
                <div class="mini-charts-item bgm-orange">
                    <div class="clearfix">
                        <div class="chart stats-bar"><canvas style="display: inline-block; width: 68px; height: 35px; vertical-align: top;" width="68" height="35"></canvas></div>
                        <a href="{{ route('contact_us.index') }}">
                            <div class="count">
                                <small>@lang('menu.contact')</small>
                                <h2>{{$contact_count}}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endif
          
            @if(isAllowed('products'))
            <div class="col-sm-6 col-md-3">
                <div class="mini-charts-item bgm-lime">
                    <div class="clearfix">
                        <div class="chart stats-bar"><canvas style="display: inline-block; width: 68px; height: 35px; vertical-align: top;" width="68" height="35"></canvas></div>
                        <a href="{{ route('products.index') }}">
                            <div class="count">
                                <small>@lang('menu.products')</small>
                                <h2>{{$products_count}}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endif
           
           
        </div>
        <!-- end counters  -->
                    
        <!-- lists -->
        <div class="row">
            @if (isAllowed('clients') && $clients_count > 0)
                <div class="col-sm-6">
                    <div class="card-header">
                        <h2> @lang('dashboard.Users')</h2>
                    </div>
                    
                    <div class="card-body m-t-0">
                        <table class="table table-inner table-vmiddle">
                            <thead>
                                <tr>
                                    <th>@lang('dashboard.id')</th>
                                    <th>@lang('dashboard.fullname')</th>
                                    <th>@lang('dashboard.status')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td class="f-500 c-cyan"><a class="" href="clients/{{ $client->id }}/edit">{{$client->id}}</a></td>
                                    <td class="f-500 c-cyan"><a class="" href="clients/{{ $client->id }}/edit">
                                        {{$client->first_name}} {{$client->last_name}}</a></td>
                                    <td><?= ($client->status == 1) ? @trans('common.active'): @trans('common.inactive') ?></td>
                                </tr>
                                @endforeach
                                <?php
                                $clientsCount = count($clients);
                                if($clientsCount > 0)
                                {
                                    $diffClients = 5 - $clientsCount;
                                    if($diffClients > 0)
                                    {
                                        for($i = 1; $i<=$diffClients; $i++)
                                        {
                                        ?>
                                        <tr>
                                            <td class="f-500 c-cyan">&nbsp</td>
                                            <td class="f-500 c-cyan">&nbsp</td>
                                            <td>&nbsp</td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                }
                                ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
              

                @if (isAllowed('contactus') && $contact_count > 0)
                <div class="col-sm-6">
                    <div class="card-header">
                        <h2> @lang('dashboard.contacts')</h2>
                    </div>
                    
                    <div class="c ard-body m-t-0">
                        <table class="table table-inner table-vmiddle">
                            <thead>
                                <tr>
                                    <th>@lang('dashboard.id')</th>
                                    <th>@lang('dashboard.title')</th>
                                    <th>@lang('dashboard.status')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($ContactUs as $cont)
                                <tr>
                                    <td class="f-500 c-cyan"><a class="" href="contact_us/{{ $cont->id }}/show">{{$cont->id}}</a>
                                    </td>
                                    <td class="f-500 c-cyan">
                                    
                                    <a class="" href="contact_us/{{ $cont->id }}/show">
                                        {{$cont->title}} </a></td>
                                    <td>
                                    <?= ($cont->status == 1) ? @trans('common.active'): @trans('common.inactive') ?>
                                    </td>
                                </tr>
                                @endforeach
                                <?php
                               
                                if($contact_count > 0)
                                {
                                    $diffCont = 5 - $contact_count;
                                    if($diffCont > 0)
                                    {
                                        for($i = 1; $i<=$diffCont; $i++)
                                        {
                                        ?>
                                        <tr>
                                            <td class="f-500 c-cyan">&nbsp</td>
                                            <td class="f-500 c-cyan">&nbsp</td>
                                            <td>&nbsp</td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                }
                                ?>   
                            </tbody>
                        </table>
                    </div>
                </div> 
                @endif
            
                
               
                @if (isAllowed('products') && $products_count > 0)
                <div class="col-sm-6">
                    <div class="card-header">
                        <h2> @lang('dashboard.products')</h2>
                    </div>
                    
                    <div class="c ard-body m-t-0">
                        <table class="table table-inner table-vmiddle">
                            <thead>
                                <tr>
                                    <th>@lang('dashboard.id')</th>
                                    <th>@lang('dashboard.title')</th>
                                    <th>@lang('dashboard.status')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="f-500 c-cyan"><a class="" href="product/{{ $product->id }}/edit">{{$product->id}}</a>
                                    </td>
                                    <td class="f-500 c-cyan">
                                        {{ $product[App::getLocale().'_name'] }}
                                    </td>
                                    <td>
                                    <?= ($product->status == 1) ? @trans('common.active'): @trans('common.inactive') ?>
                                    </td>
                                </tr>
                                @endforeach
                                <?php
                               
                                if($products_count > 0)
                                {
                                    $diffPro = 5 - $products_count;
                                    if($diffPro > 0)
                                    {
                                        for($i = 1; $i<=$diffPro; $i++)
                                        {
                                        ?>
                                        <tr>
                                            <td class="f-500 c-cyan">&nbsp</td>
                                            <td class="f-500 c-cyan">&nbsp</td>
                                            <td>&nbsp</td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                }
                                ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
              
               
            </div>   
         <!-- end lists -->
        </div>
    </div>

@endsection