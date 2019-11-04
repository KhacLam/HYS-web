@extends('admin.ad_layouts')
@section('content')
@if (Auth::user()->id != 1)
    <h1 class="text-center">Bạn không có quyền truy cập</h1>
@else
<h1 class="mb-3">Danh sách lời nhắn</h1>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên</th>
        <th scope="col">Email</th>
        <th scope="col">Chủ đề</th>
        <th scope="col">Lời nhắn</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
       @php
           $i=1
       @endphp
        @foreach ($mes as $item)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->subject}}</td>
            <td>
                <textarea name="" id="" rows="3" cols="50" class="form-control" readonly>{{$item->subject}}</textarea>
            </td>
            <td class="d-flex">
            <a href="mailto:{{$item->email}}" class="btn btn-primary" title="Trả lời"><i class="far fa-share-square"></i></a>
                {{-- {!! Form::open(['action'=>['AdminController@mesde',$item->id],'method'=>'POST']) !!}
                  {!! Form::hidden('_method', 'DELETE') !!}
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                {!! Form::close() !!} --}}
            </td>   
        </tr>
        @endforeach
    </tbody>
  </table>
@endif

@endsection