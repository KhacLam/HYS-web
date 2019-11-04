@extends('frontend.layout')
@section('content')
  <!--/ Intro Single star /-->
  @foreach ($club as $item)
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="title-single-box">
          <h1 class="title-single">{{$item->club_name}}</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ News Single Star /-->
  <section class="news-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
          <div class="post-content color-text-a">
                {!!$item->introduction!!}
          </div>
          <div class="post-footer">
          <div class="sharethis-inline-share-buttons"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ News Single End /-->
  @endforeach
@endsection

