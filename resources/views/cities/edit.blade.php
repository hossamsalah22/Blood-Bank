@extends('layouts.app')
@section('page_title')
  Edit City    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
        {!! Form::model($model,[
          'action' => ['App\Http\Controllers\CitiesController@update', $model->id],
          'method' => 'put'
        ]) !!}
        <div class="form-group">
          @include('partials.validation_error')
          <label for="name">Name</label>
          {!! Form::text('name',Null,[
          'class' => 'form-control'
          ]) !!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Edit City</button>
        </div>
          
        {!! Form::close() !!}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
@endsection
