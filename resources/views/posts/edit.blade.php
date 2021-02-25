@extends('layouts.app')
@section('page_title')
  Edit Post    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
        {!! Form::model($model,[
          'action' => ['App\Http\Controllers\PostsController@update', $model->id],
          'method' => 'put'
        ]) !!}
        <div class="form-group">
          @include('partials.validation_error')
          <label for="title">Title</label>
          {!! Form::text('title',Null,[
          'class' => 'form-control'
          ]) !!}
          <label for="image">Image URL</label>
          {!! Form::text('image',Null,[
          'class' => 'form-control'
          ]) !!}
          <label for="content">Content</label>
          {!! Form::textArea('content',Null,[
          'class' => 'form-control'
          ]) !!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Edit Post</button>
        </div>
          
        {!! Form::close() !!}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
@endsection
