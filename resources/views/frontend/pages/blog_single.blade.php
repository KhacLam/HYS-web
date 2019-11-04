@extends('frontend.layout')
@section('content')
  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="title-single-box">
          <h1 class="title-single">{{$post[0]->title}}</h1>
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
          <div class="post-information">
            <ul class="list-inline text-center color-a">
              <li class="list-inline-item mr-2">
                <strong>Tác giả: </strong>
                <span class="color-text-a">{{$post[0]->name}}</span>
              </li>
              <li class="list-inline-item mr-2">
                <strong>Thể loại: </strong>
              <span class="color-text-a">{{$category->name}}</span>
              </li>
            </ul>
          </div>
          <div class="post-content color-text-a">
                {!!$post[0]->content!!}
          </div>
          <div class="post-footer">
          <div class="sharethis-inline-share-buttons"></div>
          </div>
        </div>
        @if (Auth::check())
        <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
          <div class="title-box-d">
            <h3 class="title-d">Comments ({{$totalComment}})</h3>
          </div>
          <div class="box-comments">
            <ul class="list-comments">
              @foreach ($comment as $item)
              <li>
                <div class="comment-details">
                <h4 class="comment-author">{{$item->name}}</h4>
                  {{-- <span>{{$item->created_at}}</span> --}}
                  <p class="comment-description">
                    {{$item->content}}
                  </p>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="form-comments">
            <div class="title-box-d">
              <h3 class="title-d"> Leave a Reply</h3>
            </div>
            {{-- form bình luận --}}
            <form class="form-a" action="comment/{{$p_id}}" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="row">
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <label for="textMessage">Nhập nội dung bình luận</label>
                    <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45"
                      rows="8" required></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-a">Gửi</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        @else
        <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
          <h3 class="text-center">Bạn cần đăng nhập để có thể bình luận</h3>
        </div>
        @endif
      </div>
    </div>
  </section>
  <!--/ News Single End /-->

@endsection