@extends('layouts.app')
@section('page_title')
  Blood Type    
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
                    <th>Blood Type</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                  </tr>
                </tbody>
              </table>
              {{-- Cities Table Related to the Governorate --}}
              <table class="table table-bordered">
                <thead>
                  <h1>Available Clients</h1>
                  @if(count($record))
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>City</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($record as $record)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{url(route('client.show', $record->id))}}">{{$record->name}}</a></td>
                    <td><a href="{{url(route('city.show', $record->city->id))}}">{{$record->city->name}}</a></td>
                    <td class="text-center">
                      <a href="{{url(route('client.edit', $record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>   
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
                @else
                  <div class="alert alert-danger" role="alert">
                    No Clients Found
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
