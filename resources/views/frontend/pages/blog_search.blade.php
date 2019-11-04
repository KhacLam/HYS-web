@extends('frontend.layout')
@section('content')
    <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
          <h1 class="title-single">Kết quả cho: {{$keyword}}</h1>
            {{-- <span class="color-text-a">Grid News</span> --}}
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="">Home</a>
              </li>
              <li class="breadcrumb-item">
                    <a href="#">Bài viết</a>
                </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ News Grid Star /-->
  <section class="news-grid">
    <div class="container">
      <div class="noidung row">
        @foreach ($post_s as $item)
            <div class="col-md-4 blog-item">
                <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                    <img src="images/{{$item->p_image}}" alt="" class="img-b img-fluid">
                </div>
                <div class="card-overlay">
                    <div class="card-header-b">
                    <div class="card-category-b">
                        {{-- <a href="#" class="category-b">{{$item->name}}</a> --}}
                    </div>
                    <div class="card-title-b">
                        <h2 class="title-2">
                        <a href="{{route('postsingle',['slug'=>$item->p_slug])}}">{{$item->title}}</a>
                        </h2>
                    </div>
                    <div class="card-date">
                        <span class="date-b">{{$item->created_at->format('d/m/Y')}}</span>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
      </div>
      <div class="row">
        <div class="col-sm-12">
          </nav>
          {{$post_s->links()}}
        </div>
      </div>
    </div>
  </section>
  <!--/ News Grid End /-->
@endsection