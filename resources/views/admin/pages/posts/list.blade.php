@extends('admin.ad_layouts')
@section('content')
@if (Auth::user()->role_id == 3)
  <h1 class="text-center">Bạn không có quyền truy cập</h1>    
@else
<h1 class="mb-3">Danh sách bài viết</h1>
<p>Số bài viết <b>{{$numbers}}</b></p>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tiêu đề</th>
        <th scope="col">Số lượt xem</th>
        <th scope="col">Comment</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
       @php
           $i=1
       @endphp
        @foreach ($posts as $post)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->viewcount}}</td>
            <td>23</td>
            <td class="d-flex">
                {{-- <a href="manage/post/{{$post->id}}" class="btn btn-primary" title="Xem bài viết"><i class="fas fa-eye"></i></a> --}}
                <a href="{{route('single',['slug'=>$post->p_slug])}}" class="btn btn-primary" title="Xem bài viết"><i class="fas fa-eye"></i></a>
                <a href="manage/post/{{$post->id}}/edit" class="btn btn-success" title="Sửa bài viết"><i class="fas fa-edit"></i></a>
                {!! Form::open(['action'=>['AdPostController@destroy',$post->id],'method'=>'POST']) !!}
                  {!! Form::hidden('_method', 'DELETE') !!}
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                {!! Form::close() !!}
            </td>   
        </tr>
        @endforeach
    </tbody>
  </table>

  {{ $posts->links() }}
@endif
@endsection