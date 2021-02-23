@extends('layouts.app')
@section('page_title')
  City    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
        <a href="{{route('city.create')}}" class="btn btn-primary">
          <i class="fa fa-plus"></i>
           New City</a>
        @include('flash::message')
          @if(count($record))
          <div class="table-responsive">
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Governorate</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($record as $record)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{url(route('city.show', $record->id))}}">{{$record->name}}</a></td>
                    <td> {{$record->governorate_id}} </td>
                    <td class="text-center">
                      <a href="{{url(route('city.edit', $record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>   
                    </td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\CitiesController@destroy', $record->id],
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
