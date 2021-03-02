
<label for="name">Name</label>
    {!! Form::text('name',Null,[
    'class' => 'form-control'
    ]) !!}
<label for="password">Password</label>
{!! Form::password('password',[
'class' => 'form-control'
]) !!}

<label for="password_confirmation">Confirm Password</label>
{!! Form::password('password_confirmation',[
'class' => 'form-control'
]) !!}
<label for="email">E-mail</label>
{!! Form::email('email',Null,[
'class' => 'form-control'
]) !!}
{!! Form::label('Role') !!}
{!! 
Form::select('list_roles[]',$role,Null,
    ['class' => 'form-control',
    'multiple' => 'multiple',
    'placeholder' => 'Select Role'])
 !!}
</div>