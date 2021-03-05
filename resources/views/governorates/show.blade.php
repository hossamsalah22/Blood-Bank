@extends('layouts.app')
@section('page_title')
  Governorate    
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
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td class="text-center">
                      <a href="{{url(route('governorate.edit', $model->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>   
                    </td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\GovernorateController@destroy', $model->id],
                        'method' => 'delete'
                      ]) !!}
                      <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                </tbody>
              </table>
              {{-- Cities Table Related to the Governorate --}}
              <table class="table table-bordered">
                <thead>
                  <p>Cities</p>
                  @if(count($model->cities))
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($model->cities as $city)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{url(route('city.show', $city->id))}}">{{$city->name}}</a></td>
                    <td class="text-center">
                      <a href="{{url(route('city.edit', $city->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>   
                    </td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\CitiesController@destroy', $city->id],
                        'method' => 'delete'
                      ]) !!}
                      <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                @else
                  <div class="alert alert-danger" role="alert">
                    No Cities Found
                  </div>
                @endif
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
