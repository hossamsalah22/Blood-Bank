@extends('layouts.app')
@section('page_title')
  Edit Setting    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
        {!! Form::model($model,[
          'action' => ['App\Http\Controllers\SettingsController@update', $model->id],
          'method' => 'put'
        ]) !!}
        <div class="form-group">
          @include('partials.validation_error')
          <label for="notification_setting_note">Notification Setting Note</label>
            {!! Form::textarea('notification_setting_note',Null,[
            'class' => 'form-control'
            ]) !!}
            <label for="about_app">About App</label>
            {!! Form::textarea('about_app',Null,[
            'class' => 'form-control'
            ]) !!}
            <label for="fb_link">FaceBook URL</label>
            {!! Form::text('fb_link',Null,[
            'class' => 'form-control'
            ]) !!}
            <label for="tw_link">Twitter URL</label>
            {!! Form::text('tw_link',Null,[
            'class' => 'form-control'
            ]) !!}
            <label for="insta_link">Instagram URL</label>
            {!! Form::text('insta_link',Null,[
            'class' => 'form-control'
            ]) !!}<label for="youtube_link">Youtube URL</label>
            {!! Form::text('youtube_link',Null,[
            'class' => 'form-control'
            ]) !!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
        {!! Form::close() !!}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
@endsection
