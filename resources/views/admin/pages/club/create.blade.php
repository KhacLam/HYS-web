@extends('admin.ad_layouts')
@section('content')
<a href="manage/setting/club" class="btn btn-success">Quay lại</a>

<h1>Tạo clb</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['method' => 'POST', 'action'=>'ClubController@store','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Tên') !!}
        {!! Form::text('name', '', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('area', 'Khu vực') !!}
        {!! Form::text('area', '', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('num', 'Số lượng thành viên') !!}
        {!! Form::number('num', '', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Nội dung') !!}
        {!! Form::textarea('content', '', ['class'=>'form-control','id'=>'article-ckeditor']) !!}
    </div>
    {!! Form::submit('Thêm', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection