<div class="box-body">
    {!! Form::normalInput('name', 'Name', $errors, $product) !!}
    {!! Form::normalTextarea('description', 'Description', $errors, $product) !!}
    {!! Form::normalInputOfType('number', 'price', 'Price', $errors, $product) !!}
    {!! Form::normalFile('image', 'Image', $errors, $product) !!}
</div>