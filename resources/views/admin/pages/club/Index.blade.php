@extends('admin.ad_layouts')
@section('content')
@if (Auth::user()->role_id == 3)
  <h1 class="text-center">Bạn không có quyền truy cập</h1>    
@else
<div class="d-flex justify-content-between">
    <h1>Thông tin các câu lạc bộ trực thuộc</h1>
    <a href="manage/setting/club/create" class="btn btn-primary">Thêm</a>
</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên</th>
        <th scope="col">Số thành viên</th>
        <th scope="col">Khu vực hoạt động</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
       @php
           $i=1
       @endphp
        @foreach ($club as $item)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$item->club_name}}</td>
            <td>{{$item->numberOfMem}}</td>
            <td>{{$item->area}}</td>
            <td class="d-flex">
                {{-- <a href="manage/setting/club/{{$item->id}}" class="btn btn-primary" title="Xem bài viết"><i class="fas fa-eye"></i></a> --}}
                <a href="manage/setting/club/{{$item->id}}/edit" class="btn btn-success" title="Sửa bài viết"><i class="fas fa-edit"></i></a>
                {!! Form::open(['action'=>['ClubController@destroy',$item->id],'method'=>'POST']) !!}
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