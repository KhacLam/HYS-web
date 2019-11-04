@extends('admin.ad_layouts')
@section('content')
@if (Auth::user()->id != 1)
    <h1 class="text-center">Bạn không có quyền truy cập</h1>
@else
<h1 class="mb-3">Danh sách người dùng</h1>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên tài khoản</th>
        <th scope="col">Vai trò</th>
        <th scope="col">Email</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
       @php
           $i=1
       @endphp
        @foreach ($users as $user)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->role_name}}</td>
            <td>{{$user->email}}</td>
            <td class="d-flex">
                <a href="manage/users/{{$user->id}}" class="btn btn-primary" title="Xem người dùng"><i class="fas fa-eye"></i></a>
                @if (Auth::user()->id == 1)
                <a href="manage/users/{{$user->id}}/edit" class="btn btn-success" title="Sửa người dùng"><i class="fas fa-edit"></i></a>
                @endif
                {!! Form::open(['action'=>['UserController@destroy',$user->id],'method'=>'POST']) !!}
                  {!! Form::hidden('_method', 'DELETE') !!}
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                {!! Form::close() !!}
            </td>   
        </tr>
        @endforeach
    </tbody>
  </table>
@endif

@endsection