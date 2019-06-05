{{--@include('pages.header')--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-8 ml-5">--}}
{{--            <h1>{{$tag->name}} <small>{{$tag->posts()->count()}}Broj postova</small></h1>--}}
{{--        </div>--}}
{{--        <div class="col-md-2">--}}
{{--            <a class="btn btn-primary" href="#">Uredi tag </a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@include('pages.footer')--}}

@include('pages.header')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Tag {{$tag->name}}
                <small>@switch($tag->posts()->count())
                           @case(0)
                            {{$tag->posts()->count()}} postova
                            @break
                           @case(1)
                            {{$tag->posts()->count()}} post
                            @break
                           @default
                            {{$tag->posts()->count()}} posta
                      @endswitch
                </small>
            </h2>
        </div>
        <div class="col-md-2 offset-md-2">
            <a class="btn btn-primary" href="{{route('tags.edit',$tag->id)}}">Uredi tag </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <table class="table">
                <thead>
                <th>ID</th>
                <th>Naziv</th>
                <th>Tagovi</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($tag->posts as $post)
                    <tr>
                        <th>{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>
                            @foreach($post->tags as $tag)
                                <span class="badge badge-light">{{$tag->name}}</span>
                            @endforeach
                        </td>
                        <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-sm btn-default">Pogledaj</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('pages.footer')