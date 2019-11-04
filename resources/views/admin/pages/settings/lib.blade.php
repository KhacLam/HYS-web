@extends('admin.ad_layouts')
@section('content')
<div class="d-flex justify-content-between">
        <h1>Thư viện ảnh/video</h1>
        <a href="" class="btn btn-success d-block" data-toggle="modal" data-target="#myModal">Thêm +</a>
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- modal --}}
<div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Thêm ảnh/video</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                    {!! Form::open(['method' => 'POST', 'action'=>'LibController@store','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('describe', 'Mô tả ngắn') !!}
                        {!! Form::text('describe', '', ['class'=>'form-control']) !!}
                    </div>
                    <hr>
                    <div class="form-group">
                        {!! Form::label('image', 'Ảnh') !!}
                        {!! Form::file('image') !!}
                    </div>
                    <hr>
                    <div class="form-group">
                        {!! Form::label('video', 'Video') !!}
                        {!! Form::text('video', '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                            {!! Form::label('thumb', 'Ảnh thumb') !!}
                            {!! Form::file('thumb') !!}
                        </div>
                    {!! Form::submit('Thêm', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>

{{-- main content --}}
    <div class="row mb-3">
        @foreach ($lib as $item)
            @if ($item->status == 1)
                <div class="col-md-2 text-center mb-3">
                    @if ($item->img == 1)
                        <a href="images/{{$item->link}}" data-fancybox="images" data-caption="{{$item->desribe}}">
                            <img src="images/{{$item->link}}" alt="" style="width: 150px;height: 150px ;border: 2px solid blue"/>
                            <div class="d-flex mt-2 justify-content-center">
                                <a href="manage/setting/lib/hide/{{$item->id}}" class="btn btn-success" title="Ẩn">
                                    <i class="fas fa-eye-slash"></i>
                                </a>  
                                {!! Form::open(['action'=>['LibController@destroy',$item->id],'method'=>'POST']) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                {!! Form::close() !!}
                            </div>
                        </a>
                    @else
                        <a data-fancybox href="{{$item->link}}" style="width: 150px;height: 150px;position: relative; ">
                            <span style="position: absolute; top: 40%; right: 45%;color: white"><i class="fas fa-play"></i></span>
                            <img src="images/{{$item->thumb}}" alt="" style="width: 150px;height: 150px;border: 2px solid blue"/>
                        </a>
                        <div class="d-flex mt-2 justify-content-center">
                            <a href="manage/setting/lib/hide/{{$item->id}}" class="btn btn-success" title="Ẩn">
                                <i class="fas fa-eye-slash"></i>
                            </a>   
                            {!! Form::open(['action'=>['LibController@destroy',$item->id],'method'=>'POST']) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                {!! Form::close() !!}
                        </div>
                    @endif
                </div>
            @else
            <div class="col-md-2 text-center">
                @if ($item->img == 1)
                        <a href="images/{{$item->link}}" data-fancybox="images" data-caption="{{$item->desribe}}">
                            <img src="images/{{$item->link}}" alt="" style="width: 150px;height: 150px"/>
                            <div class="d-flex mt-2 justify-content-center">
                                <a href="manage/setting/lib/show/{{$item->id}}" class="btn btn-success" title="Ẩn">
                                    <i class="fas fa-eye"></i>
                                </a>   
                                {!! Form::open(['action'=>['LibController@destroy',$item->id],'method'=>'POST']) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                {!! Form::close() !!}
                            </div>
                        </a>
                    
                @else
                    <a data-fancybox href="{{$item->link}}" style="width: 150px;height: 150px;position: relative; ">
                        <span style="position: absolute; top: 40%; right: 45%;color: white"><i class="fas fa-play"></i></span>
                        <img src="images/{{$item->thumb}}" alt="" style="width: 150px;height: 150px;"/>
                    </a>
                    <div class="d-flex mt-2 justify-content-center">
                        <a href="manage/setting/lib/show/{{$item->id}}" class="btn btn-success" title="Ẩn">
                            <i class="fas fa-eye"></i>
                        </a>   
                        {!! Form::open(['action'=>['LibController@destroy',$item->id],'method'=>'POST']) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                {!! Form::close() !!}
                    </div>
                @endif
            </div>
            @endif
            {{-- @if ($item->img == 1)
                <div class="col-md-2">
                    <a href="images/{{$item->link}}" data-fancybox="images" data-caption="{{$item->desribe}}">
                        <img src="images/{{$item->link}}" alt="" style="width: 150px;height: 150px"/>
                    </a>
                    <div class="d-flex">
                        @if ($item->status == 0)
                            <a href="manage/setting/lib/show/{{$item->id}}" class="btn btn-success" title="Hiện"><i class="fas fa-eye"></i></a>                            
                        @else
                            <a href="manage/setting/lib/hide    /{{$item->id}}" class="btn btn-success" title="Ẩn"><i class="fas fa-eye-slash"></i></a>    
                        @endif
                        <a href="" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                    </div>
                </div>
            @else
                <div class="col-md-2">
                    <a data-fancybox href="{{$item->link}}" style="width: 150px;height: 150px;position: relative; ">
                        <span style="position: absolute; top: 40%; right: 45%;color: white"><i class="fas fa-play"></i></span>
                        <img src="images/{{$item->thumb}}" alt="" style="width: 150px;height: 150px"/>
                    </a> 
                </div>   
            @endif --}}
        @endforeach
    </div>

@endsection