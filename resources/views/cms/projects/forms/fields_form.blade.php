<div class="form-group">
    {{Form::label('name','Урл проекта:')}}
    {{Form::text('name',null, ['class' => 'form-control','placeholder'=>'Введите урл проекта'])}}
</div>
<div class="form-group">
    {{Form::label('keyword','Описание:')}}
    {{Form::text('keyword',null, ['class' => 'form-control','placeholder'=>'Введите описание проекта'])}}
</div>
<div class="form-group">
    {{Form::submit('Отправить',array('class' =>'btn btn-success'))}}
</div>
