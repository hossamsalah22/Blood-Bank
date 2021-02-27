@extends('layouts.app')
@section('page_title')
  Contact    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
        @include('flash::message')
          @if(count($model))
            @foreach($model as $model)
            {!! Form::label('Title: ') !!}
                <div class="input-group">
                    <div><span class="input-group-text">{{ $model->title }}</span></div>
                </div><br>
            {!! Form::label('Subject:') !!}
                <div class="input-group">
                    <div><span class="input-group-text-area">{{ $model->subject }}</span></div>
                </div><br>
            {!! Form::label('Email:') !!}
                <div class="input-group">
                    <div><span class="input-group-text">{{ $model->email }}</span></div>
                </div><br>
            {!! Form::label('Phone:') !!}
                <div class="input-group">
                    <div><span class="input-group-text">{{ $model->phone }}</span></div>
                </div><br>
            {!! Form::open([
                'action' => ['App\Http\Controllers\ContactsController@destroy', $model->id],
                'method' => 'delete'
                ]) !!}
                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
            {!! Form::close() !!}
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
