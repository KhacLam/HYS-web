@extends('frontend.layout')
@section('content')
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Thư viện</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Thư viện
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <div class="container lib">
    <ul class="nav nav-pills justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="pill" href="#home">Ảnh</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu1">Video</a>
        </li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane container active" id="home">
            <div class="lib-list d-flex flex-wrap">
              @foreach ($lib as $item)
                  @if ($item->status == 1)
                      @if ($item->img == 1)
                        <div class="lib-item">
                        <a href="images/{{$item->link}}" data-fancybox="images" data-caption="{{$item->desribe}}" class="">
                              <img src="images/{{$item->link}}" alt="" class="img-fluid"/>
                          </a>
                      </div>
                      @endif
                  @endif
              @endforeach
            </div>
        </div>
        <div class="tab-pane container fade" id="menu1">
            <div class="row">
          @foreach ($lib as $item)
                @if ($item->status == 1)
                @if ($item->img == 0)
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <a data-fancybox="video" href="{{$item->link}}" class="">
                    <img src="images/{{$item->thumb}}" alt="" class="img-fluid">
                </a>
              </div>
              @endif
                @endif
              @endforeach
            </div>
        </div>
      </div>
  </div>
@endsection