<label for="title">Title</label>
{!! Form::text('title', null, [
    'class' => 'form-control',
]) !!}
<label for="image">Image URL</label>
{!! Form::text('image', null, [
    'class' => 'form-control',
]) !!}
<label for="content">Content</label>
{!! Form::textArea('content', null, [
    'class' => 'form-control',
]) !!}

{!! Form::label('Category') !!}
{!! Form::select('category_id', $category, null, ['class' => 'form-control', 'placeholder' => 'Select Category']) !!}

</div>
