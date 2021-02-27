@extends('layouts.app')
@section('page_title')
  Donation Request    
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
                    <th>Patient Name</th>
                    <th>Patient Phone</th>
                    <th>Patient Blood type</th>
                    <th>Patient Age</th>
                    <th>Required Blood Bags</th>
                    <th>City</th>
                    <th>Hospital Name</th>
                    <th>Hospital Address</th>
                    <th>Client Name</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->phone}}</td>
                    <td>{{$model->blood_type->name}}</td>
                    <td>{{$model->patient_age}}</td>
                    <td>{{$model->blood_bags_num}}</td>
                    <td>{{$model->city->name}}</td>
                    <td>{{$model->hospital_name}}</td>
                    <td>{{$model->hospital_address}}</td>
                    <td>{{$model->client->name}}</td>
                    <td class="text-center">
                      <a href="{{url(route('donation-request.edit', $model->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>   
                    </td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\DonationRequestsController@destroy', $model->id],
                        'method' => 'delete'
                      ]) !!}
                      <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                </tbody>
              </table>
              {{-- Cities Table Related to the Governorate
              <table class="table table-bordered">
                <thead>
                  <p>Cities</p>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($record as $record)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{url(route('city.show', $record->id))}}">{{$record->name}}</a></td>
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
              </table> --}}
            </div>
          </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
@endsection
