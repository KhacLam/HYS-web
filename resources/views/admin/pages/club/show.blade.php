@extends('admin.ad_layouts')
@section('content')
<a href="manage/setting/club" class="btn btn-success mb-3">Quay lại</a>
<h1>{{$club->club_name}}</h1>
{!!$club->introduce!!}
@endsection     