@include('pages.header')

<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1>Izbrisati komentar?</h1>
        <p>
            <strong class="form-spacing-top">Ime: </strong> {{$comment->name}}
            <br>
            <strong class="form-spacing-top">Email: </strong> {{$comment->email}}
            <br>
            <strong class="form-spacing-top">Komentar: </strong> {{$comment->comment}}
        </p>

        {{Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE'])}}
            {{Form::submit('Da',['class' => 'btn-lg btn-block btn-danger'])}}
        {{Form::close()}}
    </div>
</div>

@include('pages.footer')