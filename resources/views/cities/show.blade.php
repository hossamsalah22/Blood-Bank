@extends('layouts.app')
@section('page_title')
  City    
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
                      <a href="{{url(route('city.edit', $model->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>   
                    </td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\CitiesController@destroy', $model->id],
                        'method' => 'delete'
                      ]) !!}
                      <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                </tbody>
              </table>
              {{-- Clients in the City --}}
              <table class="table table-bordered">
                <thead>
                  <h3>Available Clients</h3>
                  @if(count($record))
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Blood Type</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($record As $record)
                  <tr>
                    <td>{{$record->id}}</td>
                    <td><a href="{{url(route('client.show', $record->id))}}">{{$record->name}}</a></td>
                    <td>{{$record->phone}}</td>
                    <td>{{$record->BloodType->name}}</td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\ClientsController@destroy', $model->id],
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
              {{-- Donation Requests in the City --}}
              <table class="table table-bordered">
                <thead>
                  <h3>Donation Requests</h3>
                  @if(count($donation))
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Patient Name</th>
                    <th>Blood Type</th>
                    <th>Client Name</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($donation As $donation)
                  <tr>
                    <td><a href="{{url(route('donation-request.show', $donation->id))}}">
                      {{$loop->iteration}}</a></td>
                    <td>{{$donation->name}}</td>
                    <td><a href="{{url(route('blood-type.show',$donation->blood_type_id))}}">
                        {{$donation->blood_type->name}}</a></td>
                    <td><a href="{{url(route('client.show',$donation->client_id))}}">
                        {{$donation->client->name}}</a></td>
                    <td class="text-center">
                      <a href="{{url(route('donation-request.edit', $donation->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>   
                    </td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\DonationRequestsController@destroy', $donation->id],
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
                    No Requests Found
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
