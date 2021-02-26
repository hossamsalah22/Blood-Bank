@extends('layouts.app')
@section('page_title')
  Blood Type    
@endsection
@section('content')

  <!-- Main content -->
  <section class="content">
      <div class="card-body">
          @if(count($record))
          <div class="table-responsive">
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($record as $record)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                      <a href="{{url(route('blood-type.show', $record->id))}}">{{$record->name}}</a>
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
