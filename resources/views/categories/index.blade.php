@include('pages.header')


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Sve kategorije</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                <th>ID</th>
                <th class="">Naziv kategorije</th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th> {{--th zato da bi nam id bio bold --}}
                            {{$category->id}}
                        </th>
                        <td>
                            {{$category->name}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="col-md-6">
            <div class="well">
                {!! Form::open(['route' => 'categories.store']) !!}
                <h5>Nova kategorija</h5>
                {{Form::label('name','Naziv: ')}}
                {{Form::text('name',null,['class' => 'form-control'])}}

                {{ Form::submit('Stvori kategoriju',array('class' => 'btn btn-primary btn-block ','style' => 'margin-top:20px')) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@include('pages.footer')
