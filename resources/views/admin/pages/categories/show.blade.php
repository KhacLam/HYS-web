@extends('admin.ad_layouts')
@section('content')
<div class="d-flex justify-content-between align-item-center mb-3">
        <h1 class="">Danh sách bài viết</h1>
        <a href="manage/categories/create" class="btn btn-success"><i class="fas fa-plus fa-fw"></i>Thêm danh mục</a>
</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên thể loại</th>
        <th scope="col">Ngày tạo</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
       @php
           $i=1
       @endphp
        @foreach ($categories as $category)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at}}</td>
            <td class="d-flex">
                <a href="manage/categories/{{$category->id}}/edit" class="btn btn-success" title="Sửa"><i class="fas fa-edit"></i></a>
                {!! Form::open(['action'=>['CategoryController@destroy',$category->id],'method'=>'POST']) !!}
                  {!! Form::hidden('_method', 'DELETE') !!}
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                {!! Form::close() !!}
            </td>   
        </tr>
        @endforeach
    </tbody>
  </table>
<ul>
    
</ul>
@endsection