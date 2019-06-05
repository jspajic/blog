@include('pages.header')


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Svi tagovi</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                <th>ID</th>
                <th class="">Naziv taga</th>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th> {{--th zato da bi nam id bio bold --}}
                            {{$tag->id}}
                        </th>
                        <td>
                            <a href="{{route('tags.show', $tag->id)}}">{{$tag->name}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="col-md-6">
            <div class="well">
                {!! Form::open(['route' => 'tags.store']) !!}
                <h5>Novi tag</h5>
                {{Form::label('name','Naziv: ')}}
                {{Form::text('name',null,['class' => 'form-control'])}}

                {{ Form::submit('Stvori tag',array('class' => 'btn btn-primary btn-block ','style' => 'margin-top:20px')) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@include('pages.footer')
