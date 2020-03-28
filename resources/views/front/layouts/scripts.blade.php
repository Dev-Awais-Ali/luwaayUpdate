     <script type="text/javascript">
  var mainurl = "{{url('/')}}";
  var gs      = {!! json_encode($gs) !!};
  var langg    = {!! json_encode($langg) !!};

</script>
     <script src="{{asset('assets/front/plugins/jquery-1.12.4.min.js')}}"></script>
    
     <script src="{{asset('assets/front/plugins/popper.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/bootstrap4/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/imagesloaded.pkgd.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/masonry.pkgd.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/isotope.pkgd.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/jquery.matchHeight-min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/slick/slick/slick.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/slick-animation.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/lightGallery-master/dist/js/lightgallery-all.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/sticky-sidebar/dist/sticky-sidebar.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/jquery.slimscroll.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/select2/dist/js/select2.full.min.js')}}"></script>
     <script src="{{asset('assets/front/plugins/gmap3.min.js')}}"></script>
     <script src="{{asset('assets/front/js/plugin.js')}}"></script>
    <!-- custom scripts-->
    @section('pagelevel_scripts')
    @show
    
    <script src="{{asset('assets/front/js/main.js')}}"></script>
    <script src="{{asset('assets/front/js/custom.js')}}"></script>
    <script src="{{asset('assets/front/js/toastr.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U&amp;region=GB"></script>
