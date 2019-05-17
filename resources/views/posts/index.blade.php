@include('pages.header')


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Svi postovi</h1>
        </div>
        <div class="col-md-2">
            <a href="{{route('posts.create')}}" class="btn btn-primary">Novi post</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <table class="table">
                <thead>
                <th>ID</th>
                <th>Naslov</th>
                <th>Sadrzaj</th>
                <th>Kreirano:</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th> {{--th zato da bi nam id bio bold --}}
                            {{$post->id}}
                        </th>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            {{substr($post->body, 0,50)}}{{strlen($post->body) > 50 ? "..." : ""}} {{--povlacimo samo prvih 50 znakova iz sadrzaja--}}
                        </td>
                        <td>
                            {{date('d-m-Y',strtotime( $post-> created_at))}}
                        </td>
                        <td>
                            <a href="{{route('posts.show',$post->id)}}" class="btn btn-default btn-sm">Otvori</a>
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-default btn-sm">Uredi</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('pages.footer')