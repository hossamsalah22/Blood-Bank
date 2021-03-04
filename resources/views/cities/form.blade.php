<label for="name">Name</label>
{!! Form::text('name', null, [
    'class' => 'form-control',
]) !!}

{{-- <label for="governorate">Select Governorate</label> --}}
{{ Form::label('governorate') }}
{{ Form::select('governorate_id', $governorate, null, ['class' => 'form-control', 'placeholder' => 'Please select ...']) }}

</div>
