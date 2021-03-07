@extends('layouts.app')
@section('page_title')
  Donation Requests    
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
                    <th>Patient Name</th>
                    <th>Blood Type</th>
                    <th>City</th>
                    <th>Client Name</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($model as $model)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{url(route('donation-request.show', $model->id))}}">
                      {{$model->name}}</a></td>
                    <td><a href="{{url(route('blood-type.show',$model->blood_type_id))}}">
                        {{$model->blood_type->name}}</a></td>
                    <td><a href="{{url(route('city.show', $model->city_id))}}">
                        {{$model->city->name}}</a></td>
                    <td><a href="{{url(route('client.show',$model->client_id))}}">{{$model->client->name}}</a></td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\DonationRequestsController@destroy', $model->id],
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
