@extends('front.layouts.app')
<style type="text/css">
  .page-item.active .page-link {
    width: 33px !important;
    height: 32px !important;

    z-index: 1 !important;
    color: #fff !important;
    background-color: #fcb800 !important;
    border-color: #fcb800 !important;
   }
  .pagination{
        font-size: medium !important;
  } 
  .ps-list--categories li a {
    font-weight: 400;
  }
</style>

@section('page_content')


    <div class="ps-page--single ps-page--vendor">
      <section class="ps-store-list">
        <div class="container">
          <aside class="ps-block--store-banner">
            <div class="ps-block__content bg--cover" data-background="{{Storage::disk('public')->url($store->img)}}">
              <h3><a href="{{route('vendor.store.detail',['store_name'=>$store->shop_name])}}">{{$store->shop_name}}</a></h3>{{-- <a class="ps-block__inquiry" href="#"><i class="fa fa-question"></i> Inquiry</a> --}}
              <input type="hidden" id="user_id" value={{$store->id}}>
            </div>
            <div class="ps-block__user">
              <div class="ps-block__user-avatar"><img src="{{Storage::disk('public')->url($store->vendor_img)}}" alt="">
                <select class="ps-rating" data-read-only="true">
                  <option value="1">1</option>
                  <option value="1">2</option>
                  <option value="1">3</option>
                  <option value="1">4</option>
                  <option value="2">5</option>
                </select>
              </div>
              <div class="ps-block__user-content">
                <p><i class="icon-map-marker"></i>{{$store->shop_address}}</p>
                <p><i class="icon-envelope"></i>  {{$store->email}}</p>
              </div>
            </div>
          </aside>
          <div class="ps-section__wrapper">
            <div class="ps-section__left">
              <aside class="widget widget--vendor">
                <h3 class="widget-title">Product Search</h3>
                <div class="form-group--icon">
                  <form action="{{route('get.filtered.products')}}" method="get">

                    <input type="hidden" name="Store_name" value="{{$store->shop_name}}"> 
                    <input class="form-control" type="text" name="search" id="search" placeholder="Search..."><i class="icon-magnifier"></i>
                  </form>
                </div>
              </aside>
              <aside class="widget widget--vendor">
                <h3 class="widget-title">Store Categories</h3>
                @foreach($categories as $category)
                  <ul class="ps-list--categories">
                    <li class="current-menu-item menu-item-has-children"><a href="{{route('get.searched.products',['store_name'=>$store->shop_name,'cat_slug'=>$category->slug])}}">{{$category->name}}</a>
                   
                      @if($category->subs)
                      @foreach($category->subs as $sub)
                        <span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                        <ul class="sub-menu">
                          <li class="current-menu-item menu-item-has-children"><a href="{{route('get.searched.products',['store_name'=>$store->shop_name,'cat_slug'=>$category->slug,'sub_cat'=>$sub->slug])}}">{{$sub->name}}</a>
                            @if($sub->childs)
                            @foreach($sub->childs as $child)
                                <span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                  <li class="current-menu-item "><a href="{{route('get.searched.products',['store_name'=>$store->shop_name,'cat_slug'=>$category->slug,'sub_cat'=>$sub->slug,'child_cat'=>$child->slug])}}">{{$child->name}}</a>
                                  </li>
                                </ul>
                            @endforeach
                            @endif    
                          </li>
                        </ul>
                      @endforeach  
                      @endif  
                    </li>
                  </ul>
                @endforeach          
              </aside>
{{--               <aside class="widget widget--vendor widget--open-time">
                <h3 class="widget-title"><i class="icon-clock3"></i> Store Hours</h3>
                <ul>
                  <li><strong>Monday:</strong><span>8:00 am - 6:00 pm</span></li>
                  <li><strong>Monday:</strong><span>8:00 am - 6:00 pm</span></li>
                  <li><strong>Monday:</strong><span>8:00 am - 6:00 pm</span></li>
                  <li><strong>Monday:</strong><span>8:00 am - 6:00 pm</span></li>
                  <li><strong>Monday:</strong><span>8:00 am - 6:00 pm</span></li>
                </ul>
              </aside> --}}
            </div>
            <div class="ps-section__right">
{{--               <nav class="ps-store-link">
                <ul>
                  <li class="active"><a href="{{route('vendor.store.detail',['id'=>$store->id])}}">Products</a></li>
                  <li><a href="store-detail-info.html">About</a></li>
                  <li><a href="store-detail.html">Policies</a></li>
                  <li><a href="store-detail.html">Reviews(0)</a></li>
                </ul>
              </nav> --}}
              <div class="ps-shopping ps-tab-root">
                <div class="ps-shopping__header">
                      @if($token==1 && $products->total()>0)
                       <p style="font-weight: 400;font-size: large;">All Products</p>                        
                      @elseif($products->total()>0)
                       <p><strong>{{$products->total()}}</strong> Products found</p>
                      @else
                       <p style="font-weight: 400;font-size: x-large;"> No Product found </p>                    
                     @endif
{{--                   <div class="ps-shopping__actions">
                    <div class="ps-shopping__view">
                      <p>View</p>
                      <ul class="ps-tab-list">
                        <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                        <li><a href="#tab-2"><i class="icon-list4"></i></a></li>
                      </ul>
                    </div>
                  </div> --}}
                </div>
                <div class="ps-tabs">
                  @if($token==2)
                     @include('front.includes.filter-data.vendor-filter-data')
                  @else
                    <div class="ps-tab active" id="tab-1">
                      <div class="ps-shopping-product">
                        <div class="row">
                          @if($products->total()>0)
                            @foreach($products as $product)
                              <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                <div class="ps-product">
                                  <div class="ps-product__thumbnail"><a href="#"><img src="{{asset('assets/images/thumbnails/'.$product->thumbnail)}}" alt=""/></a>
                                    <ul class="ps-product__actions">
                                      <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                      <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                                      <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                      <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                  </div>
                                  <div class="ps-product__container"><a class="ps-product__vendor" href="#"></a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">{{$product->name}}</a>
                                      <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                          <option value="1">1</option>
                                          <option value="1">2</option>
                                          <option value="1">3</option>
                                          <option value="1">4</option>
                                          <option value="2">5</option>
                                        </select>{{-- <span>02</span> --}}
                                      </div>
                                      @if($product->previous_price>0)
                                      <p class="ps-product__price sale">${{$product->price}} <del>${{$product->previous_price}}</del></p>
                                      @else
                                      <p class="ps-product__price">{{$product->price}}</p>
                                      @endif
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">{{$product->name}}</a>
                                      @if($product->previous_price>0)
                                      <p class="ps-product__price sale">${{$product->price}} <del>${{$product->previous_price}} </del></p>
                                      @else
                                      <p class="ps-product__price">${{$product->price}}</p>
                                      @endif                                  
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endforeach 
                          @endif 
                        </div>
                      </div>
                      <div class="ps-pagination">
                        <ul class="pagination">
                          <li > {{$products->links()}}</li>
                        </ul>
                      </div>
                    </div>
                  @endif
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>
@endsection    
    <!-- custom scripts-->
@section('pagelevel_scripts')  
{{-- <script type="text/javascript">

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
<script type="text/javascript">
$('#search').on('keyup',function(event){
if (event.keyCode === 13) { 
var value=$(this).val();
var user_id=$('#user_id').val();

if($('#tab-2').hasClass('active')){
    $('#tab-2').removeClass('active');
    $('.tab-col').remove();
}

$.ajax({
type : 'get',
url:"{{url('get-searched-product')}}",
data:{'search':value,'user_id':user_id},


success:function(data){
              if(data){
                $('#tab-1').removeClass('active');
                $.each(data,function(key,value){

                    $('#tab-2').addClass('active');
                    $("#tab-2-row").append(' <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 tab-col"><div class="ps-product"><div class="ps-product__thumbnail"><a href="product-default.html"><img src="/assets/images/thumbnails/'+value.thumbnail+'" alt=""/></a><ul class="ps-product__actions"><li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li><li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li><li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li><li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li></ul></div><div class="ps-product__container"><a class="ps-product__vendor" href="#"></a><div class="ps-product__content"><a class="ps-product__title" href="product-default.html"></a><div class="ps-product__rating"> <select class="ps-rating" data-read-only="true"><option value="1">1</option><option value="1">2</option><option value="1">3</option><option value="1">4</option><option value="2">5</option> </select><span>02</span></div><p class="ps-product__price sale">$990.99 <del>$1050.50 </del></p></div><div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Anderson Composites – Custom Hood</a><p class="ps-product__price sale">$990.99 <del>$1050.50 </del></p></div></div></div></div>');
                      console.log(value.thumbnail); 
                 });
               }  
}
});
}
})
</script>

 --}}
 
@endsection        
 