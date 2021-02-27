<label for="title">Title</label>
    {!! Form::text('title',Null,[
    'class' => 'form-control'
    ]) !!}
<label for="image">Image URL</label>
{!! Form::text('image',Null,[
'class' => 'form-control'
]) !!}
<label for="content">Content</label>
{!! Form::textArea('content',Null,[
'class' => 'form-control'
]) !!}
    
    {{-- <label for="category">Select Category</label> --}}
    {!! Form::label('Category') !!}
    {!! 
    Form::select('category_id',$category,Null,['class' => 'form-control','placeholder' => 'Select Category'])
     !!}
    
</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">Add Post</button>
</div>