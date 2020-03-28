@extends('front.layouts.app')
@section('pagelevel_css')

@endsection
@section('page_content')
    
    <div class="ps-breadcrumb">
      <div class="ps-container">
        <ul class="breadcrumb">
          {{-- <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="shop-default.html">Consumer Electrics</a></li> --}}
          {{-- <li><a href="shop-default.html">Refrigerators</a></li>
          <li>Marshall Kilburn Portable Wireless Speaker</li> --}}
        </ul>
      </div>
    </div> 
    <div class="ps-page--product">
      <div class="ps-container">
        <div class="ps-page__container">
          <div class="ps-page__left">
            <div class="ps-product--detail ps-product--fullwidth">
              <div class="ps-product__header">
                <div class="ps-product__thumbnail" data-vertical="true">
                  <figure>
                    <div class="ps-wrapper">
                      <div class="ps-product__gallery" data-arrow="true">
                        <div class="item"><a href=""><img src="{{asset('assets/images/products/'.$productt->photo)}}" alt=""></a></div>
                        <div class="item"><a href=""><img src="{{asset('assets/images/products/'.$productt->thumbnail)}}" alt=""></a></div>
                      </div>
                    </div>
                  </figure>
                  <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                    <div class="item"><img src="{{asset('assets/images/products/'.$productt->photo)}}" alt=""></div>
                    <div class="item"><img src="{{asset('assets/images/products/'.$productt->thumbnail)}}" alt=""></div>
                  </div>
                </div>
                <div class="ps-product__info">
                  <h1>{{$productt->name}}</h1>
                  <div class="ps-product__meta">
                    <p>Brand:<a href="shop-default.html">{{$productt->category->name}}</a></p>
                    <div class="ps-product__rating">
                        <div class="ratings">
                          <div class="empty-stars"></div>
                          <div class="full-stars" style="width:{{App\Models\Rating::ratings($productt->id)}}%"></div>
                        </div>
                    </div>
                      @if($productt->type == 'Physical')
                        @if($productt->emptyStock())
                          <p>
                            <i class="icofont-close-circled"></i>
                            {{ $langg->lang78 }}
                          </p>
                        @else
                          <p>
                            <i class="icofont-check-circled"></i>
                            {{ $gs->show_stock == 0 ? '' : $productt->stock }} {{ $langg->lang79 }}
                          </p>
                        @endif
                      @endif
                      <p>{{count($productt->ratings)}} {{ $langg->lang80 }}</p>
                      @if($productt->product_condition != 0)
                           <div class="{{ $productt->product_condition == 2 ? 'mybadge' : 'mybadge1' }}">
                            {{ $productt->product_condition == 2 ? 'New' : 'Used' }}
                           </div>
                      @endif
                    </div>
                  <h4 class="ps-product__price">{{ $productt->showPrice() }} – <del>{{ $productt->showPreviousPrice() }}</del></h4>
                   @if($productt->youtube != null)
                      <a href="{{ $productt->youtube }}" class="video-play-btn mfp-iframe">
                        <i class="fas fa-play"></i>
                      </a>
                    @endif
                  <div class="ps-product__desc">
                    <p>Sold By:<a href="shop-default.html"><strong>{{$productt->user->name}}</strong></a></p>
                    <ul class="ps-list--dot">
                      @if($productt->type == 'License')

                      @if($productt->platform != null)
                      <li>
                        <p>{{ $langg->lang82 }}: <b>{{ $productt->platform }}</b></p>
                      </li>
                      @endif

                      @if($productt->region != null)
                      <li>
                        <p>{{ $langg->lang83 }}: <b>{{ $productt->region }}</b></p>
                      </li>
                      @endif

                      @if($productt->licence_type != null)
                      <li>
                        <p>{{ $langg->lang84 }}: <b>{{ $productt->licence_type }}</b></p>
                      </li>
                      @endif

                      @endif
                    </ul>
                    </div>
                  <div class="product-size">
                    @if(!empty($productt->size))
                      <p class="title">{{ $langg->lang88 }} :</p>
                      <ul style="list-style: none;">
                        @php
                        $is_first = true;
                        @endphp
                        @foreach($productt->size as $key => $data1)
                        <li class="{{ $is_first ? 'active' : '' }}">
                          <span class="box">{{ $data1 }}
                            <input type="hidden" class="size" value="{{ $data1 }}">
                            <input type="hidden" class="size_qty" value="{{ $productt->size_qty[$key] }}">
                            <input type="hidden" class="size_key" value="{{$key}}">
                            <input type="hidden" class="size_price"
                              value="{{ round($productt->size_price[$key] * $curr->value,2) }}">
                          </span>
                        </li>
                        @php
                        $is_first = false;
                        @endphp
                        @endforeach
                      <li>
                    </ul>
                    @endif
                  </div>
                  <div class="ps-product__variations">
                    @if(!empty($productt->color))
                      @php
                      $is_first = true;
                      @endphp
                      @foreach($productt->color as $key => $data1)
                      <div class="ps-variant ps-variant--color" data-color="{{ $productt->color[$key] }}" style="background-color:{{$productt->color[$key]}}"></div>
                      @php
                      $is_first = false;
                      @endphp
                      @endforeach
                    @endif
                     @if(!empty($productt->size))

                  <input type="hidden" id="stock" value="{{ $productt->size_qty[0] }}">
                  @else
                  @php
                  $stck = (string)$productt->stock;
                  @endphp
                  @if($stck != null)
                  <input type="hidden" id="stock" value="{{ $stck }}">
                  @elseif($productt->type != 'Physical')
                  <input type="hidden" id="stock" value="0">
                  @else
                  <input type="hidden" id="stock" value="">
                  @endif

                  @endif
                  <input type="hidden" id="product_price" value="{{ round($productt->vendorPrice() * $curr->value,2) }}">

                  <input type="hidden" id="product_id" value="{{ $productt->id }}">
                  <input type="hidden" id="curr_pos" value="{{ $gs->currency_format }}">
                  <input type="hidden" id="curr_sign" value="{{ $curr->sign }}">
                  </div>

                  <div class="info-meta-3">
                    <ul class="meta-list" style="list-style: none;padding: 0;">
                      @if($productt->product_type != "affiliate")
                      <li class="d-block count {{ $productt->type == 'Physical' ? '' : 'd-none' }}">
                        <div class="qty">
                          <figure>
                            <figcaption>Quantity</figcaption>
                            <div class="form-group--number">
                              <button class="up qtplus"><i class="fa fa-plus"></i></button>
                              <button class="down qtminus"><i class="fa fa-minus"></i></button>
                              <input class="form-control qttotal" name="qty" class="qttotal" id="qty" type="text" value="1">
                            </div>
                          </figure>
                        </div>
                      </li>
                      @endif

                      @if (!empty($productt->attributes))
                        @php
                          $attrArr = json_decode($productt->attributes, true);
                        @endphp
                      @endif
                      @if (!empty($attrArr))
                        <div class="product-attributes my-4">
                          <div class="row">
                          @foreach ($attrArr as $attrKey => $attrVal)
                            @if (array_key_exists("details_status",$attrVal) && $attrVal['details_status'] == 1)

                          <div class="col-lg-6">
                              <div class="form-group mb-2">
                                <strong for="" class="text-capitalize">{{ str_replace("_", " ", $attrKey) }} :</strong>
                                <div class="">
                                @foreach ($attrVal['values'] as $optionKey => $optionVal)
                                  <div class="custom-control custom-radio">
                                    <input type="hidden" class="keys" value="">
                                    <input type="hidden" class="values" value="">
                                    <input type="radio" id="{{$attrKey}}{{ $optionKey }}" name="{{ $attrKey }}" class="custom-control-input product-attr"  data-key="{{ $attrKey }}" data-price = "{{ $attrVal['prices'][$optionKey] * $curr->value }}" value="{{ $optionVal }}" {{ $loop->first ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="{{$attrKey}}{{ $optionKey }}">{{ $optionVal }}

                                    @if (!empty($attrVal['prices'][$optionKey]))
                                      +
                                      {{$curr->sign}} {{$attrVal['prices'][$optionKey] * $curr->value}}
                                    @endif
                                    </label>
                                  </div>
                                @endforeach
                                </div>
                              </div>
                          </div>
                            @endif
                          @endforeach
                          </div>
                        </div>
                      @endif

                      @if($productt->product_type == "affiliate")

                      <li class="addtocart">
                        <a class="ps-btn" href="{{ route('affiliate.product', $productt->slug) }}" target="_blank"><i
                            class="icofont-cart"></i> {{ $langg->lang251 }}</a>
                      </li>
                      @else
                      @if($productt->emptyStock())
                      <li class="addtocart">
                        <a href="javascript:;" class="cart-out-of-stock">
                          <i class="icofont-close-circled"></i>
                          {{ $langg->lang78 }}</a>
                      </li>
                      @else
                        <a class="ps-btn" id="addcrt" style="margin-top: 10px;" href="javascript:;" id="addcrt"><i class="icofont-cart"></i>{{ $langg->lang90 }}</a>

                        <a class="ps-btn" style="margin-top: 10px;" href="{{ route('product.cart.quickadd',$productt->id) }}"><i
                            class="icofont-cart"></i>{{ $langg->lang251 }}</a>
                      @endif

                      @endif

                      @if(Auth::guard('web')->check())
                      <li class="favorite">
                        <a class="ps-btn" href="javascript:;" class="add-to-wish"
                          data-href="{{ route('user-wishlist-add',$productt->id) }}"><i class="icofont-heart-alt"></i></a>
                      </li>
                      @else
                      <li class="favorite">
                        <a href="javascript:;" data-toggle="modal" data-target="#comment-log-reg"><i
                            class="icofont-heart-alt"></i></a>
                      </li>
                      @endif
                      <li class="compare">
                        <a href="javascript:;" class="add-to-compare"
                          data-href="{{ route('product.compare.add',$productt->id) }}"><i class="icofont-exchange"></i></a>
                      </li>
                    </ul>
                  </div>
                  <script async src="https://static.addtoany.com/menu/page.js"></script>


                  @if($productt->ship != null)
                    <p class="estimate-time">{{ $langg->lang86 }}: <b> {{ $productt->ship }}</b></p>
                  @endif
                  @if( $productt->sku != null )
                  <p class="p-sku">
                    {{ $langg->lang77 }}: <span class="idno">{{ $productt->sku }}</span>
                  </p>
                  @endif
                  <div class="ps-product__specification"><a class="report" href="#">Report Abuse</a>
                    <p><strong>SKU:</strong> SF1133569600-1</p>
                    <p class="categories"><strong> Categories:</strong><a href="#">Consumer Electronics</a>,<a href="#"> Refrigerator</a>,<a href="#">Babies & Moms</a></p>
                    <p class="tags"><strong> Tags</strong><a href="#">sofa</a>,<a href="#">technologies</a>,<a href="#">wireless</a></p>
                  </div>
                  <div class="ps-product__sharing"><a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></div>
                </div>
              </div>
              <div class="ps-product__content ps-tab-root">
                <ul class="ps-tab-list">
                  <li class="active"><a href="#tab-1">Description</a></li>
                  <li><a href="#tab-4">Reviews ({{count($productt->ratings)}})</a></li>

                </ul>
                <div class="ps-tabs">
                  <div class="ps-tab active" id="tab-1">
                    <div class="ps-document">
                      {{$productt->detail}}
                    </div>
                  </div>
                  <div class="ps-tab" id="tab-4">
                    <div class="row">
                      <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                        {{-- <div class="heading-area">
                          <h4 class="title">
                            {{ $langg->lang96 }}
                          </h4>
                          <div class="reating-area">
                            <div class="stars"><span id="star-rating">{{App\Models\Rating::rating($productt->id)}}</span> <i
                                class="fa fa-star"></i></div>
                          </div>
                        </div>
                        <div id="replay-area">
                          <div id="reviews-section">
                            @if(count($productt->ratings) > 0)
                            <ul class="all-replay">
                              @foreach($productt->ratings as $review)
                              <li>
                                <div class="single-review">
                                  <div class="left-area">
                                    <img
                                      src="{{ $review->user->photo ? asset('assets/images/users/'.$review->user->photo):asset('assets/images/noimage.png') }}"
                                      alt="">
                                    <h5 class="name">{{ $review->user->name }}</h5>
                                    <p class="date">
                                      {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$review->review_date)->diffForHumans() }}
                                    </p>
                                  </div>
                                  <div class="right-area">
                                    <div class="header-area">
                                      <div class="stars-area">
                                        <ul class="stars">
                                          <div class="ratings">
                                            <div class="empty-stars"></div>
                                            <div class="full-stars" style="width:{{$review->rating*20}}%"></div>
                                          </div>
                                        </ul>
                                      </div>
                                    </div>
                                    <div class="review-body">
                                      <p>
                                        {{$review->review}}
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                              </li>
                            </ul>
                            @else
                            <p>{{ $langg->lang97 }}</p>
                            @endif
                          </div>
                      </div> --}}
                        <!--Section: Block Content-->
                        <section class="dark-grey-text mb-5">

                          <!-- Section heading -->
                          <h3 class="font-weight-bold text-center mb-5">Product Reviews</h3>
                          @if(count($productt->ratings) > 0)
                          @foreach($productt->ratings as $review)
                            <div class="media mb-3">
                              <img class=" reviewimg card-img-100 rounded-circle z-depth-1-half d-flex mr-3" src="{{ $review->user->photo ? asset('assets/images/users/'.$review->user->photo):asset('assets/images/noimage.png') }}" alt="">
                              <div class="media-body">
                                <a>
                                  <h5 class="user-name font-weight-bold">{{ $review->user->name }}</h5>
                                </a>
                                <!-- Rating -->
                                <ul class="rating mb-2">
                                  <div class="ratings ratingdiv" >
                                    <div class="empty-stars"></div>
                                    <div class="full-stars" style="width:{{$review->rating*20}}%"></div>
                                  </div>
                                </ul>
                                <div class="card-data">
                                  <ul class="list-unstyled mb-1">
                                    <li class="comment-date font-small grey-text">
                                      <i class="fa fa-clock-o"></i> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$review->review_date)->diffForHumans() }}</li>
                                  </ul>
                                </div>
                                <p class="dark-grey-text article">{{$review->review}}</p>
                              </div>
                            </div>
                            @endforeach
                            @else
                            <p>{{ $langg->lang97 }}</p>
                            @endif
                        </section>
                        <!--Section: Block Content-->
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                        @if(Auth::guard('web')->check())
                          <div class="review-area">
                            <h4 class="title">{{ $langg->lang98 }}</h4>
                            <div class="star-area">
                              <ul class="star-list">
                                <li class="stars" data-val="1">
                                  <i class="fas fa-star"></i>
                                </li>
                                <li class="stars" data-val="2">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                </li>
                                <li class="stars" data-val="3">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                </li>
                                <li class="stars" data-val="4">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                </li>
                                <li class="stars active" data-val="5">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="write-comment-area">
                            <div class="gocover"
                              style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>
                            <form id="reviewform" action="{{route('front.review.submit')}}"
                              data-href="{{ route('front.reviews',$productt->id) }}" method="POST">
                              @include('includes.admin.form-both')
                              {{ csrf_field() }}
                              <input type="hidden" id="rating" name="rating" value="5">
                              <input type="hidden" name="user_id" value="{{Auth::guard('web')->user()->id}}">
                              <input type="hidden" name="product_id" value="{{$productt->id}}">
                              <div class="row">
                                <div class="col-lg-12">
                                  <textarea name="review" placeholder="{{ $langg->lang99 }}" required=""></textarea>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <button class="submit-btn" type="submit">{{ $langg->lang100 }}</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          @else
                          <div class="row">
                            <div class="col-lg-12">
                              <br>
                              <h5 class="text-center"><a href="{{route('user.login')}}"
                                  class="btn login-btn mr-1">{{ $langg->lang101 }}</a> {{ $langg->lang102 }}</h5>
                              <br>
                            </div>
                          </div>
                          @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ps-page__right">
            <aside class="widget widget_product widget_features">
              <p><i class="icon-network"></i> Shipping worldwide</p>
              <p><i class="icon-3d-rotate"></i> Free 7-day return if eligible, so easy</p>
              <p><i class="icon-receipt"></i> Supplier give bills for this product.</p>
              <p><i class="icon-credit-card"></i> Pay online or when receiving goods</p>
            </aside>
            <aside class="widget widget_ads"><a href="#"><img src="img/ads/product-ads.png" alt=""></a></aside>
            {{-- <aside class="widget widget_same-brand">
              <h3>Same Brand</h3>
              <div class="widget__content">
                <div class="ps-product">
                  <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{('assets/img/products/shop/5.jpg')}}" alt=""></a>
                    <div class="ps-product__badge">-37%</div>
                    <ul class="ps-product__actions">
                      <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                      <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                      <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                      <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </aside> --}}
          </div>
        </div>
        {{-- <div class="ps-section--default">
          <div class="ps-section__header">
            <h3>Related products</h3>
          </div>
          <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
              <div class="ps-product">
                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{('assets/img/products/shop/11.jpg')}}" alt=""></a>
                  <ul class="ps-product__actions">
                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a></li>
                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                  </ul>
                </div>
                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Robert's Store</a>
                  <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Men’s Sports Runnning Swim Board Shorts</a>
                    <div class="ps-product__rating">
                                  <select class="ps-rating" data-read-only="true">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                  </select><span>01</span>
                    </div>
                    <p class="ps-product__price">$13.43</p>
                  </div>
                  <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Men’s Sports Runnning Swim Board Shorts</a>
                    <p class="ps-product__price">$13.43</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
@endsection    
    <!-- custom scripts-->
@section('pagelevel_scripts')    
 <script>
   $(document).ready(function(){
      $('.up').click(function(){
      var value= $('#qty').val();
      value= ++value;
      $('#qty').val(value);
    })
      $('.down').click(function(){
      var value= $('#qty').val();
      if(value !=0 && value > 0){
        value= --value;
      $('#qty').val(value);
      }
    })
   })
    
 </script>
@endsection    
