@extends('layouts.app')
@section('page_title')
  Contact Us    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
        @include('flash::message')
          @if(count($model))
          <div class="table-responsive">
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Phone</th>
                    <th>E-mail</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($model as $model)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{url(route('contact.show', $model->id))}}">{{$model->title}}</a></td>
                    <td> {{$model->subject}} </td>
                    <td> {{$model->phone}} </td>
                    <td> {{$model->email}} </td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\ContactsController@destroy', $model->id],
                        'method' => 'delete'
                      ]) !!}
                      <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
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
