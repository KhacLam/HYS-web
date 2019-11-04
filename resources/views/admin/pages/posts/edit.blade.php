@extends('admin.ad_layouts')
@section('content')
<a href="manage/post" class="btn btn-success">Quay lại</a>

<h1>Sửa bài viết</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['method' => 'POST', 'action'=>['AdPostController@update', $post->id],'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Tiêu đề') !!}
        {!! Form::text('title', $post->title, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Nội dung') !!}
        {!! Form::textarea('content', $post->content, ['class'=>'form-control','id'=>'article-ckeditor']) !!}
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
    {!! Form::hidden('_method', 'PUT') !!}
    {!! Form::submit('Sửa', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection