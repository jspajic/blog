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
        </div>
    </div>
</div>
@include('pages.footer')

