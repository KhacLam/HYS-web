@extends('admin.ad_layouts')
@section('content')
<a href="manage/post" class="btn btn-success">Quay lại</a>
<h1>{{$post->title}}</h1>
<small>Thể loại: {{$category->name}}</small>
<hr>
<div class="s-content">
    {!!$post->content!!}
</div>

@endsection