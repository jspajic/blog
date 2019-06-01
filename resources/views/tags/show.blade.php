@include('pages.header')
    <h1>{{$tag->name}}  Tag <small>{{$tag->posts()->count()}}Broj postova</small></h1>
@include('pages.footer')