@extends('front.layouts.app')
@section('page_content')
    <div class="ps-breadcrumb">
      <div class="ps-container">
        <ul class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li>Shop</li>
        </ul>
      </div>
    </div>
    <div class="ps-page--shop" id="shop-sidebar">
      <div class="container">
        <div class="ps-layout--shop">
          <div class="ps-layout__left">
            <aside class="widget widget_shop">
              <h4 class="widget-title">Categories</h4>
                <ul class="ps-list--categories">
                  
                  @php
                $i=1;
                @endphp
                @foreach($categories as $category)

                <li class="current-menu-item   {{count($category->subs) > 0 ? 'menu-item-has-children':''}} {{ $i >= 15 ? 'rx-child' : '' }}">
                  @if(count($category->subs) > 0)
                  <span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                  @endif
                @if(count($category->subs) > 0)
                    
                  <div class="link-area">
                    <span><a href="{{ route('front.category',$category->slug) }}"><img src="{{ asset('assets/images/categories/'.$category->photo) }} " height="20px"  alt="">{{ $category->name }}</a></span>
                    
                  </div>

                @else
                  <a href="{{ route('front.category',$category->slug) }}"><img src="{{ asset('assets/images/categories/'.$category->photo) }}" height="20px"> {{ $category->name }}</a>

                @endif
                  @if(count($category->subs) > 0)

                  @php
                  $ck = 0;
                  foreach($category->subs as $subcat) {
                    if(count($subcat->childs) > 0) {
                      $ck = 1;
                      break;
                    }
                  }
                  @endphp
                  <ul class="sub-menu {{ $ck == 1 ? 'categories_mega_menu' : 'categories_mega_menu column_1' }}">
                    @foreach($category->subs as $subcat)
                      <li class="current-menu-item">
                        <a href="{{ route('front.subcat',['slug1' => $subcat->category->slug, 'slug2' => $subcat->slug]) }}">{{$subcat->name}}</a>
                        @if(count($subcat->childs) > 0)
                          <div class="categorie_sub_menu">
                            <ul>
                              @foreach($subcat->childs as $childcat)
                              <li class="current-menu-item"><a href="{{ route('front.childcat',['slug1' => $childcat->subcategory->category->slug, 'slug2' => $childcat->subcategory->slug, 'slug3' => $childcat->slug]) }}">{{$childcat->name}}</a></li>
                              @endforeach
                            </ul>
                          </div>
                        @endif
                      </li>
                    @endforeach
                  </ul>

                  @endif

                  </li>

                  @php
                  $i++;
                  @endphp

                  @if($i == 15)
                            <li>
                            <a href="{{ route('front.categories') }}"><i class="fas fa-plus"></i> {{ $langg->lang15 }} </a>
                            </li>
                            @break
                  @endif


                  @endforeach
                          </ul>
            </aside>
            <aside class="widget widget_shop">
              <figure>
                <h4 class="widget-title">By Price</h4>
                <div class="ps-slider" data-default-min="13" data-default-max="1000" data-max="1000" data-step="100" data-unit="$"></div>
                <p class="ps-slider__meta">Price:<span class="ps-slider__value ps-slider__min min"></span>-<span class="ps-slider__value ps-slider__max max"></span></p>
                <form action="{{route('front.category')}}" method="get" id="formm">
                  <input type="hidden" name="cat" value="{{$cat=\Request::segment(2)}}">
                  <input type="hidden" name="min" id="min">
                  <input type="hidden" name="max" id="max">
                  <button type="button" class="btn btn-default fbtn" style="background-color: black;color: white;margin-top: 10px;">Submit</button>
                </form>
              </figure>
              <figure>
                <h4 class="widget-title">By Price</h4>
                <div class="ps-checkbox">
                  <input class="form-control" type="checkbox" id="review-1" name="review">
                  <label for="review-1"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i></span><small>(13)</small></label>
                </div>
                <div class="ps-checkbox">
                  <input class="form-control" type="checkbox" id="review-2" name="review">
                  <label for="review-2"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i></span><small>(13)</small></label>
                </div>
                <div class="ps-checkbox">
                  <input class="form-control" type="checkbox" id="review-3" name="review">
                  <label for="review-3"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><small>(5)</small></label>
                </div>
                <div class="ps-checkbox">
                  <input class="form-control" type="checkbox" id="review-4" name="review">
                  <label for="review-4"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><small>(5)</small></label>
                </div>
                <div class="ps-checkbox">
                  <input class="form-control" type="checkbox" id="review-5" name="review">
                  <label for="review-5"><span><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><small>(1)</small></label>
                </div>
              </figure>
            </aside>
          </div>
          <div class="ps-layout__right">
            <div class="ps-shopping ps-tab-root">
              <div class="ps-shopping__header">
                <p>{{count($prods)}} results Found</p>
              </div>
              <div class="ps-tabs">
                <div class="ps-tab active" id="tab-1">
                  <div class="ps-shopping-product">
                    @if(count($prods)>0)
                    <div class="row">
                        @foreach ($prods as $key => $prod)
                      <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                        <div class="ps-product">
                          <div class="ps-product__thumbnail"><a href="{{ route('front.product', $prod->slug) }}"><img src="{{ $prod->photo ? asset('assets/images/thumbnails/'.$prod->thumbnail):asset('assets/images/noimage.png') }}" alt=""></a>
                          </div>
                          <div class="ps-product__container"><a class="ps-product__vendor" href="{{ route('front.product', $prod->slug) }}">{{ $prod->showName() }}</a>
                            <div class="stars">
                                <div class="ratings">
                                    <div class="empty-stars"></div>
                                    <div class="full-stars" style="width:{{App\Models\Rating::ratings($prod->id)}}%"></div>
                                </div>
                            </div>
                            @if(!empty($prod->features))
                          <div class="sell-area">
                            @foreach($prod->features as $key => $data1)
                            <span class="sale" style="background-color:{{ $prod->colors[$key] }}">{{ $prod->features[$key] }}</span>
                            @endforeach
                          </div>
                        @endif
                            <div class="ps-product__content">
                              <p class="ps-product__price">{{ $prod->setCurrency() }} <del><small>{{ $prod->showPreviousPrice() }}</small></del></p>
                            </div>
                            <div>
                              @if($prod->product_type == "affiliate")
                                <span class="add-to-cart-btn affilate-btn"
                                  data-href="{{ route('affiliate.product', $prod->slug) }}"><i class="icofont-cart"></i>
                                  {{ $langg->lang251 }}
                                </span>
                              @else
                                @if($prod->emptyStock())
                                <span class="add-to-cart-btn cart-out-of-stock">
                                  <i class="icofont-close-circled"></i> {{ $langg->lang78 }}
                                </span>
                                @else
                                <span style="cursor: pointer; color: blue" class="add-to-cart add-to-cart-btn" data-href="{{ route('product.cart.add',$prod->id) }}">
                                  <i class="icofont-cart"></i> {{ $langg->lang56 }}
                                </span>
                                <span style="cursor: pointer; color: blue" class="add-to-cart-quick add-to-cart-btn"
                                  data-href="{{ route('product.cart.quickadd',$prod->id) }}">
                                  <i class="icofont-cart"></i> {{ $langg->lang251 }}
                                </span>
                                @endif
                              @endif
                            </div>
                            <div class="ps-product__content hover">
                              <p class="ps-product__price">{{ $prod->setCurrency() }} <del><small>{{ $prod->showPreviousPrice() }}</small></del></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      <div class="col-lg-12">
                        <div class="page-center mt-5">
                          {!! $prods->appends(['search' => request()->input('search')])->links() !!}
                        </div>
                      </div>
                    @else
                      <div class="col-lg-12">
                        <div class="page-center">
                           <h4 class="text-center">{{ $langg->lang60 }}</h4>
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
      </div>
    </div>
@endsection    
    <!-- custom scripts-->
@section('pagelevel_scripts')    
 <script>
  $(document).ready(function(){

    $('.fbtn').on('click',function(){
    var min =$('.min').html();
    var max =$('.max').html();
    $('#min').val(min.substring(1,min.length));
    $('#max').val(max.substring(1,max.length));    
    $('#formm').submit();
   });
  })
 </script>
 <script>

  $(document).ready(function() {

    // when dynamic attribute changes
    $(".attribute-input, #sortby").on('change', function() {
      $("#ajaxLoader").show();
      filter();
    });

    // when price changed & clicked in search button
    $(".filter-btn").on('click', function(e) {
      e.preventDefault();
      $("#ajaxLoader").show();
      filter();
    });
  });

  function filter() {
    let filterlink = '';

    if ($("#prod_name").val() != '') {
      if (filterlink == '') {
        filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?search='+$("#prod_name").val();
      } else {
        filterlink += '&search='+$("#prod_name").val();
      }
    }

    $(".attribute-input").each(function() {
      if ($(this).is(':checked')) {
        if (filterlink == '') {
          filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?'+$(this).attr('name')+'='+$(this).val();
        } else {
          filterlink += '&'+$(this).attr('name')+'='+$(this).val();
        }
      }
    });

    if ($("#sortby").val() != '') {
      if (filterlink == '') {
        filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?'+$("#sortby").attr('name')+'='+$("#sortby").val();
      } else {
        filterlink += '&'+$("#sortby").attr('name')+'='+$("#sortby").val();
      }
    }

    if ($("#min_price").val() != '') {
      if (filterlink == '') {
        filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?'+$("#min_price").attr('name')+'='+$("#min_price").val();
      } else {
        filterlink += '&'+$("#min_price").attr('name')+'='+$("#min_price").val();
      }
    }

    if ($("#max_price").val() != '') {
      if (filterlink == '') {
        filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?'+$("#max_price").attr('name')+'='+$("#max_price").val();
      } else {
        filterlink += '&'+$("#max_price").attr('name')+'='+$("#max_price").val();
      }
    }

    // console.log(filterlink);
    console.log(encodeURI(filterlink));
    $("#ajaxContent").load(encodeURI(filterlink), function(data) {
      // add query string to pagination
      addToPagination();
      $("#ajaxLoader").fadeOut(1000);
    });
  }

  // append parameters to pagination links
  function addToPagination() {
    // add to attributes in pagination links
    $('ul.pagination li a').each(function() {
      let url = $(this).attr('href');
      let queryString = '?' + url.split('?')[1]; // "?page=1234...."

      let urlParams = new URLSearchParams(queryString);
      let page = urlParams.get('page'); // value of 'page' parameter

      let fullUrl = '{{route('front.category', [Request::route('category'),Request::route('subcategory'),Request::route('childcategory')])}}?page='+page+'&search='+'{{request()->input('search')}}';

      $(".attribute-input").each(function() {
        if ($(this).is(':checked')) {
          fullUrl += '&'+encodeURI($(this).attr('name'))+'='+encodeURI($(this).val());
        }
      });

      if ($("#sortby").val() != '') {
        fullUrl += '&sort='+encodeURI($("#sortby").val());
      }

      if ($("#min_price").val() != '') {
        fullUrl += '&min='+encodeURI($("#min_price").val());
      }

      if ($("#max_price").val() != '') {
        fullUrl += '&max='+encodeURI($("#max_price").val());
      }

      $(this).attr('href', fullUrl);
    });
  }

  $(document).on('click', '.categori-item-area .pagination li a', function (event) {
    event.preventDefault();
    if ($(this).attr('href') != '#' && $(this).attr('href')) {
      $('#preloader').show();
      $('#ajaxContent').load($(this).attr('href'), function (response, status, xhr) {
        if (status == "success") {
          $('#preloader').fadeOut();
          $("html,body").animate({
            scrollTop: 0
          }, 1);

          addToPagination();
        }
      });
    }
  });

</script>
@endsection        
