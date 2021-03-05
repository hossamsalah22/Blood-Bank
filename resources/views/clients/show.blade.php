@extends('layouts.app')
@section('page_title')
  Client    
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
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>BirthDay</th>
                    <th>Blood Type</th>
                    <th>Last Donation Date</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td> {{$model->phone}} </td>
                    <td> {{$model->email}} </td>
                    <td> <a href="{{url(route('city.show', $model->city->id))}}">{{$model->City->name}}</a> </td>
                    <td> {{$model->d_o_b}} </td>
                    <td> <a href="{{url(route('blood-type.show', $model->BloodType->id))}}">{{$model->BloodType->name}}</a> </td>
                    <td> {{$model->last_donation}} </td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\ClientsController@destroy', $model->id],
                        'method' => 'delete'
                      ]) !!}
                      <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                </tbody>
              </table>
              {{-- Donation Requests --}}
              <table class="table table-bordered">
                <thead>
                  <h3>Donation Requests</h3>
                  @if(count($model->donation_requests))
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Patient Name</th>
                    <th>Patient Blood Type</th>
                    <th>Patient City</th>
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
                    <td><a href="{{url(route('blood-type.show',$donation->blood_type_id))}}">
                        {{$donation->blood_type->name}}</a></td>
                    <td><a href="{{url(route('city.show', $donation->city_id))}}">
                        {{$donation->city->name}}</a></td>
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
