@include('pages.header')
<div class="row">
    <div class="col-md-4 offset-md-4">
        {!! Form::open() !!}
        {{Form::label('email', 'Email:',['class' => 'form-spacing-top'])}}
        {{Form::email('email',null,['class' => 'form-control'])}}

        {{Form::label('password', 'Sifra:',['class' => 'form-spacing-top'])}}
        {{Form::password('password',['class' => 'form-control'])}}

        {{Form::checkbox('remember')}}
        {{Form::label('remember', 'Zapamti prijavu')}}
        <br>
        {{Form::submit('Prijava',['class'=> 'btn btn-primary form-spacing-top'])}}
        {!! Form::close() !!}
    </div>
</div>
@include('pages.footer')

