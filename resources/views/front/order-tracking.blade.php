@include('front.layouts.app')
@section('page_content')
    <div class="ps-page--simple">
      <div class="ps-breadcrumb">
        <div class="container">
          <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="shop-default.html">Shop</a></li>
            <li> Order Tracking</li>
          </ul>
        </div>
      </div>
      <div class="ps-order-tracking">
        <div class="container">
          <div class="ps-section__header">
            <h3>Order Tracking</h3>
            <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to youon your receipt and in the confirmation email you should have received.</p>
          </div>
          <div class="ps-section__content">
            <form class="ps-form--order-tracking" action="index.html" method="get">
              <div class="form-group">
                <label>Order ID</label>
                <input class="form-control" type="text" placeholder="Found in your order confimation email">
              </div>
              <div class="form-group">
                <label>Billing Email</label>
                <input class="form-control" type="text" placeholder="">
              </div>
              <div class="form-group">
                <button class="ps-btn ps-btn--fullwidth">Track Your Order</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection  

    <!-- custom scripts-->
@section('pagelevel_scripts')    
  
@endsection    
  