@extends('admin.ad_layouts')
@section('content')
<a href="manage/categories" class="btn btn-success">Quay lại</a>
    <h1>Tạo danh mục</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['method' => 'POST', 'action'=>'CategoryController@store','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Tên thể loại') !!}
        {!! Form::text('name', '', ['class'=>'form-control']) !!}
    </div>
    {!! Form::submit('Tạo', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection