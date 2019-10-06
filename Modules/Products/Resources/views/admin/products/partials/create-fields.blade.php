<div class="box-body">
    {!! Form::normalInput('name', 'Name', $errors) !!}
    {!! Form::normalTextarea('description', 'Description', $errors) !!}
    {!! Form::normalInputOfType('number', 'price', 'Price', $errors) !!}
    {!! Form::normalFile('image', 'Image', $errors) !!}
</div>
