@include('pages.header')

<div class="row" id="form">
    <div class="col-md-8 offset-2">
        <h1>Kreiraj novi post</h1>
        <hr>
        {{Form::model($post, ['route'=>['posts.update',$post->id], 'method' => 'PUT'])}} {{--Otvaramo formu i povezujemo je s kontrolerom! --}}
        {{Form::label('title','Naslov:')}}
        {{Form::text('title',null, ["class" => 'form-control post-title'])}}
        {{Form::label('body','Sadrzaj:', ['class'=>'form-spacing-top'])}}
        {{Form::textarea('body',null,['class'=>'form-control'])}}


        <div class="row">
            <div class="col-sm-6 mt-2">
                {!! Html::linkRoute('posts.index', 'Ponisti uredivanje', array($post->id),array('class' => 'btn btn-danger')) !!}
            </div>
            <div class="mt-2 ml-auto">
                {{Form::submit('Spremi promjene', ['class'=>'btn btn-success']) }}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>


@include('pages.footer')