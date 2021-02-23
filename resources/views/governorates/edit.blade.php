@extends('layouts.app')
@section('page_title')
  Create Governorate    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
        {!! Form::model($model,[
          'action' => ['App\Http\Controllers\GovernorateController@update', $model->id],
          'method' => 'put'
        ]) !!}
        <div class="form-group">
          @include('partials.validation_error')
          @include('governorates.form')
        {!! Form::close() !!}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
@endsection
