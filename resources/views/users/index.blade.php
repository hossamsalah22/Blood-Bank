@extends('layouts.app')
@inject('roles', 'Spatie\Permission\Models\Role')
@section('page_title')
  Users    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
        <a href="{{route('user.create')}}" class="btn btn-primary">
          <i class="fa fa-plus"></i>
           New User</a>
        @include('flash::message')
          @if(count($model))
          <div class="table-responsive">
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($model as $model)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->email}}</td>
                    <td>{{$model->getRoleNames()}}</td>
                    <td class="text-center">
                      <a href="{{url(route('user.edit', $model->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>   
                    </td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\UsersController@destroy', $model->id],
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

