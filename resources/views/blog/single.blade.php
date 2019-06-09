{{--Ovaj view vraca post dohvacen preko slug-a--}}
{{--Koristimo ga kako bi korisnike koji ne pripadaju skupini 'auth' odvojili--}}

@include('pages.header')
<div class="container">
    <p class="text-center text-dark text-uppercase font-weight-bold ">{{$post->category->name}}</p></p>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <hr>
            <div class="post-preview">

                <p>
                <h4 class="post-title text-primary">
                    {{$post->title}}
                </h4>
                </p>
                <img src="{{asset('images/'.$post->image)}}" alt="{{$post->image}}" width="800" height="400"/>
                <p class="text-break">
                    {!! $post->body !!}
                </p>
                <p class="post-meta">Dodao
                    <a href="#">Neki Korisnik</a>
                    {{date('d-m-Y',strtotime( $post-> created_at))}}</p>
                {{--                TODO povuci korisnika--}}


            </div>



            <small>
                @foreach($post->tags as $tag)
                    <span class="badge badge-light">{{$tag->name}}</span>
                @endforeach
            </small>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2 form-spacing-top">
            <h3 class="comments-title">{{ $post->comments()->count()}} Comments</h3>
            @foreach($post->comments as $comment)
                <div class="comment border border-light mb-2 mt-2 shadow p-3 mb-5 bg-white rounded">
                    <div class="author-info">
                        <div class="author-name">
                            <h6>{{ $comment->name }}</h6>

                        </div>
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                    <p class="author-time small">{{ date('d-m-Y H:i' ,strtotime($comment->created_at)) }}</p>

                </div>
            @endforeach
        </div>
    </div>
<hr class="col-md-8 offset-md-2">

    <div class="row">
        <div id="comment-form" class="col-md-8 offset-md-2 form-spacing-top">
            {{Form::open(['route'=> ['comments.store',$post->id],'method' => 'POST'])}}
            <div class="row">
                <div class="col-md-6">
                    {{Form::label('name', "Ime:")}}
                    {{Form::text('name',null,['class'=> 'form-control'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('email', "Email:")}}
                    {{Form::text('email',null,['class'=> 'form-control'])}}
                </div>
                <div class="col-md-12">
                    {{Form::label('comment','Komentar: ')}}
                    {{Form::textarea('comment',null, ['class' => 'form-control', 'rows' => 3])}}

                    {{Form::submit('Dodaj komentar',['class'=>'btn btn-success btn-block form-spacing-top'])}}
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
@include('pages.footer')

