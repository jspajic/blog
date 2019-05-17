@if(Session::has('success'))
    <div class="alert alert-success col-md-8 offset-2" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

@if(count($errors) > 0)
    <div class="alert alert-danger" role="aler">
        <strong>Greške: </strong>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif