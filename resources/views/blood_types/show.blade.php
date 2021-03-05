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
              {{-- Clients Table with the same Blood Type --}}
              <table class="table table-bordered">
                <thead>
                  <h1>Available Clients</h1>
                  @if(count($model->clients))
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>City</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($model->clients as $client)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{url(route('client.show', $client->id))}}">{{$client->name}}</a></td>
                    <td><a href="{{url(route('city.show', $client->city->id))}}">{{$client->city->name}}</a></td>
                    <td class="text-center">
                      <a href="{{url(route('client.edit', $client->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>   
                    </td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\CitiesController@destroy', $client->id],
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
              {{-- Donation Requests With The Same BloodType --}}
              <table class="table table-bordered">
                <thead>
                  <h3>Donation Requests</h3>
                  @if(count($model->donation_requests))
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Patient Name</th>
                    <th>Patient City</th>
                    <th>Required Blood Bags</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($model->donation_requests As $donation)
                  <tr>
                    <td><a href="{{url(route('donation-request.show', $donation->id))}}">
                      {{$loop->iteration}}</a></td>
                    <td>{{$donation->name}}</td>
                    <td><a href="{{url(route('city.show', $donation->city_id))}}">
                        {{$donation->city->name}}</a></td>
                    <td>{{$donation->blood_bags_num}}</td>
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
