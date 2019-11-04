@extends('admin.ad_layouts')
@section('content')
@if (Auth::user()->role_id == 3)
    <H1>Bạn không có quyền truy cập</H1>
@else
<h1>Tạo bài viết</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['method' => 'POST', 'action'=>'AdPostController@store','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Tiêu đề') !!}
        {!! Form::text('title', '', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Nội dung') !!}
        {!! Form::textarea('content', '', ['class'=>'form-control','id'=>'article-ckeditor']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Thể loại') !!}
        <select name="category" class="form-control">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Ảnh') !!}
        {!! Form::file('image') !!}
    </div>
    {!! Form::submit('Tạo', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}
@endif

@endsection