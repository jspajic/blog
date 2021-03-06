@include('pages.header')

@section('title','Dobrodosli!')
<!-- Post Content -->
<div class="container">
    <div class="col-md-12">
        @foreach($posts as $post)
                <div class="post border border-light mb-2 mt-2 shadow p-3 mb-5 bg-white rounded">
                    <h3>{{$post->title}}</h3>
                    <p>{!! substr(strip_tags($post->body), 0,150)!!}{!! strlen(strip_tags($post->body)) > 150 ? "..." : "" !!}</p>
                    <p class="small font-weight-light">Dodano: {{date('d-m-Y',strtotime( $post-> created_at))}} u kategoriju: {{$post->category->name}}</p>
                    <div class="mb-3">
                        <small>
                            @foreach($post->tags as $tag)
                                <span class="badge badge-light">{{$tag->name}}</span>
                            @endforeach
                        </small>
                    </div>
                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary mb-2 align-content-md-end">Opsirnije</a>
                </div>
        @endforeach
    </div>
    {!!$posts->links() !!}
</div>

<hr>
@extends('pages.footer')