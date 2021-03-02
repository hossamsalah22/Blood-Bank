@extends('layouts.app')
@section('page_title')
  Post    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">{{$model->title}}</h3>
          </div>
          <div class="box-body">
            <img src="{{$model->image}}" alt="{{$model->title}}" width="200px" height="200px">
          </div>
          <div class="box-body">
            {{$model->content}}
          </div>
          <!-- /.box-body -->
        </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
@endsection
