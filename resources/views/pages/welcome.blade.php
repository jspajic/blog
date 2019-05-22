@include('pages.header')

@section('title','Dobrodosli!')
<!-- Post Content -->
<div class="container">
    <div class="col-md-12">
        @foreach($posts as $post)
                <div class="post border border-light mb-2 mt-2 shadow p-3 mb-5 bg-white rounded">
                    <h3>{{$post->title}}</h3>
                    <p>{{substr($post->body, 0,50)}}{{strlen($post->body) > 50 ? "..." : ""}}</p>
                    <p class="small font-weight-light">Dodano: {{date('d-m-Y',strtotime( $post-> created_at))}}</p>
                    <a href="{{ url('posts/'.$post->id) }}" class="btn btn-primary mb-2">Opsirnije</a>
                </div>

        @endforeach
    </div>
    {!!$posts->links() !!}
</div>

<hr>
@extends('pages.footer')