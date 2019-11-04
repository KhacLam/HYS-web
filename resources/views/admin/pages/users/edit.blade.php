@extends('admin.ad_layouts')
@section('content')
<a href="manage/users" class="btn btn-success">Quay lại</a>

<h1>Sửa quyền truy cập</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- {{$role->role_name}} --}}

{!! Form::open(['method' => 'POST', 'action'=>['UserController@update', $user->id],'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('role', 'Vai trò') !!}
        <select name="role" class="form-control">
            @foreach ($roles as $role)
                <option value="{{$role->role_id}}">{{$role->role_name}}</option>
            @endforeach
        </select>
    </div>
    {!! Form::hidden('_method', 'PUT') !!}
    {!! Form::submit('Sửa vai trò', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection