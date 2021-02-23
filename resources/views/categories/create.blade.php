@extends('layouts.app')
@inject('model', 'App\Models\Category')
@section('page_title')
  Create Category    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
        {!! Form::model($model,[
          'action' => 'App\Http\Controllers\CategoriesController@store'
        ]) !!}
        <div class="form-group">
          @include('partials.validation_error')
          @include('categories.form')
        {!! Form::close() !!}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
@endsection
