@extends('admin.ad_layouts')
@section('content')
    <a href="manage/users" class="btn btn-success mb-2">Quay lại</a>
    <table class="user-table">
        <tr>
            <td>Tên tài khoản</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <td>Vai trò</td>
            <td>
                @if ($user->role_id == 1)
                    Quản trị viên
                @elseif($user->role_id == 2)
                    Tác giả
                @else
                    Người xem
                @endif
            </td>
        </tr>
    </table>

    @if ($user->role_id == 1 | $user->role_id == 2)
        <h3 class="mt-3">Các bài viết đã đăng</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên bài viết</th>
                <th scope="col">Thời gian đăng</th>
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
                        <td>{{$post->created_at->format('d-m-Y')}}</td>
                        <td>
                                <a href="manage/post/{{$post->id}}" class="btn btn-primary" title="Xem bài viết"><i class="fas fa-eye"></i></a>
                                <a href="manage/post/{{$post->id}}/edit" class="btn btn-success" title="Sửa bài viết"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    @endif
@endsection