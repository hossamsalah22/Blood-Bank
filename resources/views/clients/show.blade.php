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
                    <td>{{$record->id}}</td>
                    <td><a href="{{url(route('client.show', $record->id))}}">{{$record->name}}</a></td>
                    <td> {{$record->phone}} </td>
                    <td> {{$record->email}} </td>
                    <td> {{$record->City->name}} </td>
                    <td> {{$record->d_o_b}} </td>
                    <td> {{$record->BloodType->name}} </td>
                    <td> {{$record->last_donation}} </td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\ClientsController@destroy', $record->id],
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
