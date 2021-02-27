@extends('layouts.app')
@section('page_title')
  Setting    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
        @include('flash::message')
          @if(count($model))
            @foreach($model as $model)
            {!! Form::label('notifiaction setting note:') !!}
                <div class="input-group">
                    <div><span class="input-group-text-area">{{ $model->notification_setting_note }}</span></div>
                </div><br>
            {!! Form::label('About App :') !!}
                <div class="input-group">
                    <div><span class="input-group-text-area">{{ $model->about_app }}</span></div>
                </div><br>
            {!! Form::label('social media :') !!}
                <div class="text-center">
                    <a href="{{$model->fb_link}}" class="btn btn-social-icon btn-facebook" target="_blank">
                        <i class="fa fa-facebook"></i></a>
                    <a href="{{$model->tw_link}}" class="btn btn-social-icon btn-instagram" target="_blank">
                        <i class="fa fa-instagram"></i></a>
                    <a href="{{$model->insta_link}}" class="btn btn-social-icon btn-twitter" target="_blank">
                        <i class="fa fa-twitter"></i></a>
                    <a href="{{$model->youtube_link}}" class="btn btn-social-icon btn-youtube" target="_blank">
                        <i class="fa fa-youtube"></i></a>
                </div>
                <a href="{{url(route('setting.edit', $model->id))}}" class="btn btn-primary btn-xs">
                    <i class="fa fa-gear"></i>
                    Edit Setting
                </a>
            @endforeach
          @else
            <div class="alert alert-danger" role="alert">
              No Data Found
            </div>
          @endif
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
@endsection
