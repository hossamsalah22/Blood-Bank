<label for="name">Name</label>
    {!! Form::text('name',Null,[
    'class' => 'form-control'
    ]) !!}
    
    {{-- <label for="governorate">Select Governorate</label> --}}
    {{ Form::label('governorate') }}
    {{
    Form::select('governorate_id',$governorate,Null,
    ['class'=>'form-control', 'placeholder'=>'Please select ...'])
     }}
    
</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">Add City</button>
</div>