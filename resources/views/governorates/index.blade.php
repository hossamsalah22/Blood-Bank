@extends('layouts.app')
@section('page_title')
  Governorate    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
        <a href="{{route('governorate.create')}}" class="btn btn-primary">
          <i class="fa fa-plus"></i>
           New Governorate</a>
        @include('flash::message')
          @if(count($record))
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
                  @foreach ($record as $record)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                      <a href="{{url(route('governorate.show', $record->id))}}">{{$record->name}}</a>
                    </td>
                    <td class="text-center">
                      <a href="{{url(route('governorate.edit', $record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>   
                    </td>
                    <td class="text-center">
                      {!! Form::open([
                        'action' => ['App\Http\Controllers\GovernorateController@destroy', $record->id],
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
