@extends('admin.ad_layouts')
@section('content')
<a href="manage/categories" class="btn btn-success">Quay lại</a>
<h1>Sửa danh mục</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['method' => 'POST', 'action'=>['CategoryController@update', $cate->id]]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Tên thể loại') !!}
        {!! Form::text('name', $cate->name, ['class'=>'form-control']) !!}
    </div>
    {!! Form::hidden('_method', 'PUT') !!}
    {!! Form::submit('Sửa', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection