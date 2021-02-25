<label for="name">Name</label>
    {!! Form::text('name',Null,[
    'class' => 'form-control'
    ]) !!}
    
    <label for="governorate">Select Governorate</label>
    
    {!! 
    Form::select('governorate_id',['governorate' => $governorate->pluck('name')],Null,['class' => 'form-control'])
     !!}
    
</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">Add City</button>
</div>