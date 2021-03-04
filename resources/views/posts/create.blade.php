@extends('layouts.app')
@inject('model', 'App\Models\Post')
@section('page_title')
    Create Post
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="card-body">
            {!! Form::model($model, [
    'action' => 'App\Http\Controllers\PostsController@store',
]) !!}
            <div class="form-group">
                @include('partials.validation_error')
                @include('posts.form')

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add Post</button>
                </div>

                {!! Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
