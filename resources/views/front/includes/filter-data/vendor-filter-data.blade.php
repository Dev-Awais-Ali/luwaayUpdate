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
