@include('pages.header')
<div class="row">
    <div class="col-md-4 offset-md-4">
        {!!Form::open()!!}
            {{Form::label('name','Ime:')}}
            {{Form::text('name',null,['class' => 'form-control'])}}


            {{Form::label('email','Email:',['class' => 'form-spacing-top'])}}
            {{Form::email('email',null,['class' => 'form-control'])}}

            {{Form::label('password','Sifra:',['class' => 'form-spacing-top'])}}
            {{Form::password('password',['class' => 'form-control'])}}

            {{Form::label('password_confirmation','Potvrdite sifru:',['class' => 'form-spacing-top'])}}
            {{Form::password('password_confirmation',['class' => 'form-control '])}}

            {{Form::submit('Registriraj se!',['class' => 'btn btn-primary btn-block form-spacing-top'])}}
        {!!Form::close()!!}
    </div>
</div>
@include('pages.footer')

