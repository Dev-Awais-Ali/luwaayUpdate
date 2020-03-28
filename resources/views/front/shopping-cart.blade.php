@extends('front.layouts.app')
@section('page_content')
    <div class="ps-page--simple">
      <div class="ps-breadcrumb">
        <div class="container">
          <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="shop-default.html">Shop</a></li>
            <li>Whishlist</li>
          </ul>
        </div>
      </div>
      <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
          <div class="ps-section__header">
            <h1>Shopping Cart</h1>
          </div>
          <div class="ps-section__content">
            <div class="table-responsive">
              <table class="table ps-table--shopping-cart">
                @include('includes.form-success')
                <thead>
                  <tr>
                    <th>PRODUCT NAME</th>
                    <th>DETAILS</th>
                    <th>UNIT PRICE</th>
                    <th>SUB TOTAL</th>
                    <th><i class="icofont-close-squared-alt"></i></th>
                  </tr>
                </thead>
                <tbody>
                  @if(Session::has('cart'))
                    @foreach($products as $product)
                    <tr>
                      <td>
                        <div class="ps-product--cart">
                          <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('assets/front/img/products/electronic/1.jpg')}}" alt=""></a></div>
                          <div class="ps-product__content"><a href="{{ route('front.product', $product['item']['slug']) }}">{{strlen($product['item']['name']) > 35 ? substr($product['item']['name'],0,35).'...' : $product['item']['name']}}</a>
                            <p>Sold By:<strong> YOUNG SHOP</strong></p>
                          </div>
                        </div>
                      </td>
                      <td>
                      @if(!empty($product['size']))
                      <b>{{ $langg->lang312 }}</b>: {{ $product['item']['measure'] }}{{$product['size']}} <br>
                      @endif
                      @if(!empty($product['color']))
                      <div class="d-flex mt-2">
                      <b>{{ $langg->lang313 }}</b>:  <span id="color-bar" style="border: 10px solid #{{$product['color'] == "" ? "white" : $product['color']}};"></span>
                      </div>
                      @endif

                          @if(!empty($product['keys']))

                          @foreach( array_combine(explode(',', $product['keys']), explode(',', $product['values']))  as $key => $value)

                              <b>{{ ucwords(str_replace('_', ' ', $key))  }} : </b> {{ $value }} <br>
                          @endforeach

                          @endif

                        </td>
                        <td class="unit-price quantity" style="text-align: center;">
                          <p class="product-unit-price" style="font-weight: bold;">
                            {{ App\Models\Product::convertPrice($product['item']['price']) }}                        
                          </p>
                          @if($product['item']['type'] == 'Physical')
                            <div class="qty">
                                <ul>
                                <input type="hidden" id="prodidd" class="prodid" value="{{$product['item']['id']}}">  
                                <input type="hidden" class="itemid" value="{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}">     
                                <input type="hidden" class="size_qty" value="{{$product['size_qty']}}">     
                                <input type="hidden" class="size_price" value="{{$product['item']['price']}}">   
                                  <li>
                                    <div class="form-group--number">
                                    <button class="up qtplus1 adding"><i class="fa fa-plus"></i></button>
                                    <button class="down qtminus1 reducing"><i class="fa fa-minus"></i></button>
                                    <input class="form-control qttotal" id="qty{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}" type="text" value="{{$product['qty']}}">
                                  </div>
                                  </li>
                                  
                                </ul>
                            </div>
                          @endif
                        </td>
                        @if($product['size_qty'])
                        <input type="hidden" id="stock{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}" value="{{$product['size_qty']}}">
                        @elseif($product['item']['type'] != 'Physical') 
                        <input type="hidden" id="stock{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}" value="1">
                        @else
                        <input type="hidden" id="stock{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}" value="{{$product['stock']}}">
                        @endif

                        <td class="total-price">
                          <p id="prc{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}">
                            {{ App\Models\Product::convertPrice($product['price']) }}                 
                          </p>
                        </td>
                        <td>
                          <span class="removecart cart-remove" data-class="cremove{{ $product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values']) }}" data-href="{{ route('product.cart.remove',$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])) }}"><i class="icofont-ui-delete"></i> </span>
                        </td>
                      <td>
                        
                        <a href="{{ route('product.cart.remove',$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])) }}"><i class="icon-cross"></i></a></td>
                      </tr>
                    @endforeach
                    @else
                    <tr>
                      <td>
                        <span>NO item found</span>
                      </td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
            <div class="ps-section__cart-actions"><a class="ps-btn" href="{{url('/')}}"><i class="icon-arrow-left"></i> Back to Shop</a></div>
          </div>
          @if(Session::has('cart'))
          <div class="ps-section__footer">
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <figure>
                  <figcaption>Coupon Discount</figcaption>
                  <form id="coupon-form" class="coupon">
                    <input type="text" placeholder="{{ $langg->lang133 }}" id="code" required="" autocomplete="off">
                    <input type="hidden" class="form-control" id="grandtotal" value="{{ Session::has('cart') ? App\Models\Product::convertPrice($mainTotal) : '0.00' }}">
                    <button type="submit" class="ps-btn ps-btn--outline">{{ $langg->lang134 }}</button>
                  </form>
                </figure>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <div class="ps-block--shopping-total">
                  <div class="ps-block__header">
                    <p>Subtotal <span class="cart-total"> {{ Session::has('cart') ? App\Models\Product::convertPrice($totalPrice) : '0.00' }}</span></p>
                  </div>
                  <div class="ps-block__content">
                    <ul class="order-list">
                      <li>
                        <p>
                          {{ $langg->lang128 }}
                        
                        <span style="float: right;">
                          <b class="cart-total">{{ Session::has('cart') ? App\Models\Product::convertPrice($totalPrice) : '0.00' }}</b>
                        </span>
                        </p>
                      </li>
                      <li>
                        <p>
                          {{ $langg->lang129 }}
                        <span style="float: right;">
                          <b class="discount">{{ App\Models\Product::convertPrice(0)}}</b>
                          <input type="hidden" id="d-val" value="{{ App\Models\Product::convertPrice(0)}}">
                        </span>
                        </p>
                      </li>
                      <li>
                        <p>
                          {{ $langg->lang130 }}
                        <span style="float: right;">
                          <b>{{$tx}}%</b>
                        </span>
                        </p>
                      </li>
                    </ul>
                    <hr>
                    <div class="total-price">
                      <p>
                          {{ $langg->lang131 }}
                      <span class="main-total" style="float: right;"><b>{{ Session::has('cart') ? App\Models\Product::convertPrice($mainTotal) : '0.00' }}</b></span>
                      </p>
                  </div>
                </div><a class="ps-btn ps-btn--fullwidth" href="{{ route('front.checkout') }}">Proceed to checkout</a>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
@endsection    
    <!-- custom scripts-->
@section('pagelevel_scripts')    
 <script>
   $(document).ready(function(){
      $('.up').click(function(){
      var value= $('.qttotal').val();
      value= ++value;
      $('.qttotal').val(value);
    })
      // $('.down').click(function(){
      // var value= $('.qttotal').val();
      // if(value !=0 && value > 0){
      //   value= --value;
      // $('.qttotal').val(value);
      // }
    // })
   })
    
 </script>
@endsection    