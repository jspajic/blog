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
</div>

@include('pages.footer')