@include('pages.header')

<div class="row" id="form">
    <div class="col-md-8 offset-2">
        <h1>Kreiraj novi post</h1>
        <hr>
        {!! Form::open(['route' => 'posts.store']) !!}
            {{Form::label('Naslov',"") }}
            {{Form::text('title',null,array('class' => 'form-control'))}}

            {{Form::label('body',"Tekst")}}
            {{Form::textarea('body',null,array('class' => 'form-control'))}}


            {{ Form::submit('Stvori Post',array('class' => 'btn btn-success btn-block ','style' => 'margin-top:20px')) }}
        {!! Form::close() !!}
    </div>
</div>



@include('pages.footer')

