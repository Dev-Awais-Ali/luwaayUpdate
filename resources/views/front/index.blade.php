
@extends('front.layouts.app')

@section('pagelevel_css')

<link rel="stylesheet" href="{{asset('assets/front/css/furniture.css')}}">
@endsection

@section('page_content')
<div id="homepage-1">  
  <div class="ps-home-banner">
    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
      @if($ps->slider == 1)

        @if(count($sliders))
        @foreach($sliders as $data)
      <div class="ps-banner--furniture" data-background="{{asset('assets/front/img/slider/home-8/1.jpg')}}"><img src="{{asset('assets/images/sliders/'.$data->photo)}}" style="width: 100%;height: 400px" alt="">
        <div class="ps-banner__content">
          <h4 style="font-size: {{$data->subtitle_size}}px; color: {{$data->subtitle_color}}" class="subtitle{{$data->id}}" data-animation="animated {{$data->subtitle_anime}}">{{$data->subtitle_text}}</h4>
          <h3 style="font-size: {{$data->title_size}}px; color: {{$data->title_color}}" class="title title{{$data->id}}" data-animation="animated {{$data->title_anime}}">{{$data->title_text}}</h3><br/> <p style="font-size: {{$data->details_size}}px; color: {{$data->details_color}}"  class="text text{{$data->id}}" data-animation="animated {{$data->details_anime}}">{{$data->details_text}}</p><a class="ps-btn" href="{{$data->link}}"><span>{{ $langg->lang25 }} <i class="fas fa-chevron-right"></i></span></a>
        </div>
      </div>
      @endforeach
      @endif
      @endif
    </div>
  </div>
  <div class="ps-site-features">
    <div class="ps-container">
      <div class="row ps-block--site-features">
          <div class="col-sm-6 col-md-3">
              <div class="card">
                  <div class="card-img-top card-img-top-200 img-hover-zoom">
                      <img class="img-fluid" src="{{asset('assets/front/images/burger1.jpg')}}" alt="Carousel 1">
                      <div class="centered">Food & Recipe</div>
                  </div>
              </div>
          </div>
          <div class="col-sm-6 col-md-3">
              <div class="card">
                  <div class="card-img-top card-img-top-200 img-hover-zoom">
                      <img class="img-fluid" src="{{asset('assets/front/images/restaurant.jpg')}}" alt="Carousel 1">
                      <div class="centered">Pro Services</div>
                  </div>
              </div>
          </div> 
          <div class="col-sm-6 col-md-3">
              <div class="card">
                  <div class="card-img-top card-img-top-200 img-hover-zoom">
                      <img class="img-fluid" src="{{asset('assets/front/images/12.jpg')}}" alt="Carousel 1">
                      <div class="centered">Grocery</div>
                  </div>
              </div>
          </div> 
          <div class="col-sm-6 col-md-3">
              <div class="card">
                  <div class="card-img-top card-img-top-200 img-hover-zoom">
                      <img class="img-fluid" src="{{asset('assets/front/images/burger1.jpg')}}" alt="Carousel 1">
                      <div class="centered">Restaurant</div>
                  </div>
              </div>
          </div>                            
      </div>
    </div>
  </div>
  <div class="ps-section--furniture ps-home-shop-by-room ">
    <div class="container">  
      <div class="ps-section__header">
        <h3>Shop By Category</h3>
       </div>
      <div class="ps-section__content">
        <div class="row">
          @foreach($categories as $category)
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
              <div class="ps-block--category-room">
                <div class="ps-block__thumbnail"><a href="shop-default.html"><img src="{{asset('assets/front/images/categories/'.$category->image)}}" height="auto" alt=""></a></div>
                <div class="ps-block__content"><a href="{{ route('front.category',$category->slug) }}">{{$category->name}}</a></div>
              </div>
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="ps-product-list ps-clothings">
    <div class="ps-container-fluid">
      <div class="ps-section__header">
        <h3>Consumer Electronics</h3>
        <ul class="ps-section__links">
          <li><a href="shop-grid.html">New Arrivals</a></li>
          <li><a href="shop-grid.html">Best seller</a></li>
          <li><a href="shop-grid.html">Must Popular</a></li>
          <li><a href="shop-grid.html">View All</a></li>
        </ul>
      </div>
    </div>  
    <div class="ps-container">  
      <div class="ps-section__content">
        <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
          @foreach($feature_products as $feature_product)
          <div class="ps-product">
            <div class="ps-product__thumbnail"><a href="{{route('front.product',$feature_product->slug)}}"><img src="{{asset('assets/front/images/products/'.$feature_product->thumbnail)}}" alt=""></a>
              <div class="ps-product__badge hot">hot</div>
              
            </div>
            <div class="ps-product__container"><a class="ps-product__vendor" href="#">{{$feature_product->user->name}}</a>
              <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">{{$feature_product->name}}</a>
                <div class="ps-product__rating">
                  <div class="stars">
                    <div class="ratings">
                        <div class="empty-stars"></div>
                        <div class="full-stars" style="width:{{App\Models\Rating::ratings($feature_product->id)}}%"></div>
                    </div>
                  </div>
                </div>
                <p class="ps-product__price">${{$feature_product->price}}</p>
              </div>
              <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('front.product',$feature_product->slug)}}">{{$feature_product->name}}</a>
                <p class="ps-product__price">${{$feature_product->price}}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="ps-product-list ps-clothings">
    <div class="ps-container-fluid">
      <div class="ps-section__header">
        <h3>Best Seller</h3>
      </div>
    </div>  
    <div class="ps-container">  
      <div class="ps-section__content">
        <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
          @foreach($best_products as $feature_product)
          <div class="ps-product">
            <div class="ps-product__thumbnail"><a href="{{route('front.product',$feature_product->slug)}}"><img src="{{asset('assets/front/images/products/'.$feature_product->thumbnail)}}" alt=""></a>
              <div class="ps-product__badge hot">hot</div>
              
            </div>
            <div class="ps-product__container"><a class="ps-product__vendor" href="#">{{$feature_product->user->name}}</a>
              <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">{{$feature_product->name}}</a>
                <div class="ps-product__rating">
                  <div class="stars">
                    <div class="ratings">
                        <div class="empty-stars"></div>
                        <div class="full-stars" style="width:{{App\Models\Rating::ratings($feature_product->id)}}%"></div>
                    </div>
                  </div>
                </div>
                <p class="ps-product__price">${{$feature_product->price}}</p>
              </div>
              <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('front.product',$feature_product->slug)}}">{{$feature_product->name}}</a>
                <p class="ps-product__price">${{$feature_product->price}}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @if($ps->partners == 1)
    <div class="ps-best-sale-brands ps-section--furniture">
      <div class="container">
        <div class="ps-section__header">
          <h3>Partners</h3>
        </div>
        <div class="ps-section__content">
          <ul class="ps-image-list">
            @foreach($partners as $partner)
              <li><a href="{{$partner->link}}"><img src="{{asset('assets/images/partner/'.$partner->photo)}}" alt=""></a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  @endif
@if($ps->service == 1) 
  @foreach($services->chunk(4) as $chunk)
      <div class="ps-site-features">
      <div class="ps-container">
        <div class="row ps-block--site-features">
          @foreach($chunk as $service)
            <div class="col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-img-top card-img-top-200 img-hover-zoom">
                        <img class="img-fluid" src="{{ asset('assets/images/services/'.$service->photo) }}" alt="Carousel 1">
                        <div class="centered">{{ $service->title }}
                          
                        </div>
                    </div>
                </div>
            </div> 
          @endforeach                         
        </div>
      </div>
    </div> 
    @endforeach
  @endif
</div>
@endsection

@section('pagelevel_scripts')
  <script>
        $(window).on('load',function() {

            setTimeout(function(){

                $('#extraData').load('{{route('front.extraIndex')}}');

            }, 500);
        });

  </script>
@endsection