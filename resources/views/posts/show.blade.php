@include('pages.header')


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <h2 class="post-title">
                    {{$post->title}}
                </h2>
                <hr>
                <p class="text-break">
                    {{$post->body}}
                </p>
                <p class="post-meta">Dodao
                    <a href="#">Neki Korisnik</a>
                    {{date('d-m-Y',strtotime( $post-> created_at))}} | <b>Kategorija: </b>{{$post->category->name}}</p>
                {{--                TODO povuci korisnika--}}
                <small>
                    @foreach($post->tags as $tag)
                        <span class="badge badge-light">{{$tag->name}}</span>
                    @endforeach
                </small>

            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    {!! Html::linkRoute('posts.edit', 'Uredi post', array($post->id),array('class' => 'btn btn-primary btn-block')) !!}
                    {{--                <a class="btn btn-primary btn-block" href="#">Uredi post </a> => HTML a ovo iznad blade--}}
                </div>
                <div class="col-sm-4">
                    {!! Form::open(['route' => ['posts.destroy',$post->id],'method'=> 'DELETE']) !!}

                    {!! Form::submit('Obrisi post',['class' => 'btn btn-danger btn-block']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div id="backend-comments" class="form-spacing-top col-lg-8 col-md-10 mx-auto">
        <h3>Ukupno komentara:
            <small>{{$post->comments()->count()}}</small>
        </h3>
        <hr>
        <table class="table">
            <thead>
                <th>Ime:</th>
                <th>Email:</th>
                <th>Komentar:</th>
                <th></th>
            </thead>
                <tbody>
                @foreach($post->comments as $comment)
                <tr class="p-0">
                    <td>{{$comment->name}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>


{{--                        <a class="btn btn-sm p-0" href="{{route('comments.edit', $comment->id)}}" role="button"><i class="far fa-edit"></i></a>--}}
                        <a class="btn btn-sm p-0" href="{{route('comments.delete',$comment->id)}}" role="button"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('pages.footer')