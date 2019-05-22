@include('pages.header')


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <a href="post.html"> <!--Tu ce ici link -->
                    <h2 class="post-title">
                        {{$post->title}}
                    </h2>
                </a>
                <p class="text-break">
                    {{$post->body}}
                </p>
                <p class="post-meta">Dodao
                    <a href="#">Neki Korisnik</a>
                    {{date('d-m-Y',strtotime( $post-> created_at))}}</p>
                {{--                TODO povuci korisnika--}}
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