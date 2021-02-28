@extends('layouts.app')
@section('page_title')
  Message    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
          <div class="table-responsive">
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Phone</th>
                    <th>E-mail</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->title}}</td>
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
                </tbody>
              </table>
            </div>
          </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
@endsection
