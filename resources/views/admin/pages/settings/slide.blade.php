@extends('admin.ad_layouts')
@section('content')
<div class="d-flex justify-content-between">
        <h1>Slide</h1>
        <a href="" class="btn btn-success d-block" data-toggle="modal" data-target="#addSlide">Thêm +</a>
</div>

<div class="modal" id="addSlide">
    
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm slide</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
                {!! Form::open(['method' => 'POST', 'action'=>'SlideController@store','enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('describe', 'Mô tả') !!}
                    {!! Form::text('describe', '', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('link', 'Link liên kết') !!}
                    {!! Form::text('link', '', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Ảnh') !!}
                    {!! Form::file('image') !!}
                </div>
                {!! Form::submit('Thêm', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-3">
        @foreach ($slide as $item)
            @if ($item->show == 1)
                <div class="col-md-2 text-center mb-3">
                        <a href="images/{{$item->img}}" data-fancybox="images" data-caption="{{$item->title}}">
                            <img src="images/{{$item->img}}" alt="" style="width: 150px;height: 150px ;border: 2px solid blue"/>
                            <div class="d-flex mt-2 justify-content-center">
                                <a href="manage/setting/slide/hide/{{$item->id}}" class="btn btn-success" title="Ẩn">
                                    <i class="fas fa-eye-slash"></i>
                                </a>  
                                {!! Form::open(['action'=>['SlideController@destroy',$item->id],'method'=>'POST']) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                {!! Form::close() !!}
                            </div>
                        </a>
                </div>
            @else
            <div class="col-md-2 text-center">
                    <a href="images/{{$item->img}}" data-fancybox="images" data-caption="{{$item->title}}">
                        <img src="images/{{$item->img}}" alt="" style="width: 150px;height: 150px"/>
                        <div class="d-flex mt-2 justify-content-center">
                            <a href="manage/setting/slide/show/{{$item->id}}" class="btn btn-success" title="Hiện">
                                <i class="fas fa-eye"></i>
                            </a>   
                            {!! Form::open(['action'=>['SlideController@destroy',$item->id],'method'=>'POST']) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            {!! Form::close() !!}
                        </div>
                    </a>           
            </div>
            @endif
        @endforeach
    </div>


@endsection