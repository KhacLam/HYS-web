<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>HYS</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <base href="{{asset('')}}">

  <!-- Favicons -->
  <link href="frontend/img/favicon.png" rel="icon">
  <link href="frontend/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS File -->
  <link href="frontend/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5d737678ab6f1000123c821f&product=inline-share-buttons" async="async"></script>

  <!-- Libraries CSS Files -->
  <link href="frontend/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="frontend/lib/animate/animate.min.css" rel="stylesheet">
  <link href="frontend/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="frontend/css/jquery.fancybox.min.css" rel="stylesheet">
  <link href="frontend/css/mystyle.css" rel="stylesheet">
  <link href="frontend/css/style.css" rel="stylesheet">

</head>

<body>
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Tìm kiếm bài viết</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form action="search" method="post" class="form-a">
      <div class="row">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="col-md-12 mb-2">
          <div class="form-group">
            <label for="Type">Từ khóa</label>
            <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword" name="keyword">
          </div>
        </div>
        {{-- <div class="col-md-12 mb-2">
          <div class="form-group">
            <label for="Type">Thể loại</label>
            <select class="form-control form-control-lg form-control-a" id="Type" name="category">
              <option value="">Tất cả</option>
              @foreach ($cate as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
          </div>
        </div> --}}
        <div class="col-md-12">
          <button type="submit" class="btn btn-b">Tìm kiếm</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  <!--/ Form Search End /-->

  {{-- nav bar --}}
      @include('frontend.inc.top')
  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg ">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="">Hanoi<span class="color-b">Young Startup</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="">Trang chủ</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
              Bài viết
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($cate as $cate_item)
                    <a class="dropdown-item" href="{{route('catesingle',['slug'=>$cate_item->slug,'id'=>$cate_item->id])}}">{{$cate_item->name}}</a>                    
                @endforeach
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="library">Thư viện</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about">Giới thiệu</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="contact">Liên hệ</a>
          </li>
          
          <li class="nav-item">
            @if (Auth::check())
            @if (Auth::user()->role_id == 1 | Auth::user()->role_id == 2)
              <a class="nav-link" href="manage">Quản lý</a>
            @endif
            @endif
          </li>

        </ul>
      </div>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
    </div>
  </nav>
  <!--/ Nav End /-->    

  @include('frontend.inc.nav')

  @yield('content')


  {{-- footer --}}
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Hanoi Young Startup</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                sed aute irure.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                  <li class="color-a">
                      <span class="color-text-a">Địa chỉ: {{$infor->address}}</li>
                <li class="color-a">
                <span class="color-text-a">SDT: <a href="tel:{{$infor->phone}}">{{$infor->phone}}</a></li>
                <li class="color-a">
                  <span class="color-text-a">Email: <a href="mailto:{{$infor->email}}">{{$infor->email}}</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Các CLB trực thuộc</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  @foreach ($clb as $item)
                    <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="{{route('clubsingle',['slug'=>$item->club_slug])}}">{{$item->club_name}}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Tìm chúng tôi tại</h3>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.765790494659!2d105.81490411482423!3d21.00202348601286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac9ad580bb81%3A0x3202ffa69af61534!2zMTEgTmfDtSA3MiAtIE5ndXnhu4VuIFRyw6NpLCBUaMaw4bujbmcgxJDDrG5oLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1568256689998!5m2!1sen!2s" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="{{$infor->facebook}}">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">Hanoi Young Startup</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="frontend/lib/jquery/jquery.min.js"></script>
  <script src="frontend/lib/jquery/jquery-migrate.min.js"></script>
  <script src="frontend/lib/popper/popper.min.js"></script>
  <script src="frontend/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="frontend/lib/easing/easing.min.js"></script>
  <script src="frontend/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="frontend/lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="frontend/js/jquery.fancybox.min.js"></script>
  <script src="frontend/contactform/contactform.js"></script>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

  <!-- Template Main Javascript File -->
  <script src="frontend/js/main.js"></script>
  <script src="frontend/js/script.js"></script>

</body>
</html>
