@extends('portal.layout.main')


@section('content')
<div class="container-fluid mainImg-block">
  <div class="imgBlock">
    <img src="/img/O6VMJU0.jpg" />
  </div><!--imgBlock-->
  <div class="container">
  <div class="mainNews_block">

<div class="row ">
 <div class="container mainProdact_block ">
   <div class="title"><h1>Products</h1></div>
   <div class="centerProdact_Block">
    <div class="prodact_Form">
      <div class="form-group col-lg-4">
        <label for="exampleSelect1">Sort By:</label>
        <select class="form-control" id="exampleSelect1">
          <option>text</option>
          <option>text</option>
          <option>text</option>
          <option>text</option>
          <option>text</option>
        </select>
      </div>

      <div class="form-group col-lg-4">
        <label for="exampleSelect1">Show:</label>
        <select class="form-control" id="exampleSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div><!--prodact_Form-->

    <div class="row product-mainBlock">
     
          @foreach($products as $product)
         <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="product-thumb">
            <div class="image">
              <a href="#"><img src="{{asset('/files/products/' . $product->id . '/' . $product->image)}}" /></a>
            </div><!--image-->

            <div class="caption">
              <h4><a href="#">{{$product[App::getLocale().'_product_name']}}</a></h4>
              <p>{{$product[App::getLocale().'_description']}}
</p>
              <p class="price"> {{$product->price}}</p>
              </div>
              <div class="button-group">
                <button type="button" onclick="cart.add('10', '1');"><i class="fa fa-shopping-cart"></i>

                 <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button>
                 <button type="button" data-toggle="tooltip" title="" onclick="wishlist.add('10');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></button>
                 <button type="button" data-toggle="tooltip" title="" onclick="compare.add('10');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></button>
               </div>

             </div><!--product-thumb-->

         </div><!--product-layout-->
         @endforeach
       </div><!--product-mainBlock-->
     </div><!--centerProdact_Block-->
   </div><!--mainProdact_block-->
  </div>     
@endsection