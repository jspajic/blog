@include('pages.header')
<div class="container">
<p class="text-center text-dark text-uppercase font-weight-bold ">{{$post->category->name}}</p></p>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <hr>
            <div class="post-preview">

                <p> <!--Tu ce ici link -->
                <h4 class="post-title text-primary">
                    {{$post->title}}
                </h4>
                </p>
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

