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

{!! Form::open(['method' => 'POST', 'action'=>['SettingController@update',$infor->id],'enctype'=>'multipart/form-data']) !!}
    <div class="form-row">
        <div class="form-group col-md-4">
        <img src="images/{{$infor->logo}}" alt="" srcset="" style="width: 150px; height: 150px">
          {!! Form::label('logo', 'Logo') !!}
          {!! Form::file('logo') !!}
        </div>
        <div class="form-group col-md-8">
            {!! Form::label('name', 'Tên câu lạc bộ') !!}
            {!! Form::text('name', $infor->name, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-row">
            <div class="form-group col-md-4">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', $infor->email, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('facebook', 'Facebook') !!}
                {!! Form::text('facebook', $infor->facebook, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                    {!! Form::label('phone', 'Số điện thoại') !!}
                    {!! Form::text('phone', $infor->phone, ['class'=>'form-control']) !!}
                </div>
        </div>
        <div class="form-group">
                {!! Form::label('address', 'Địa chỉ') !!}
                {!! Form::text('address', $infor->address, ['class'=>'form-control']) !!}
              </div>
              <div class="form-group">
                    {!! Form::label('intro', 'Giới thiệu về CLB') !!}
                    {!! Form::textarea('intro', $infor->intro, ['class'=>'form-control','id'=>'article-ckeditor']) !!}
                </div>
    {!! Form::hidden('_method', 'PUT') !!}
    {!! Form::submit('Sửa', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection