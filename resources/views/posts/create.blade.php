@include('pages.header')

<div class="row" id="form">
    <div class="col-md-8 offset-2">
        <h1>Kreiraj novi post</h1>
        <hr>
        {!! Form::open(['route' => 'posts.store']) !!}
            {{Form::label('Naslov',"") }}
            {{Form::text('title',null,array('class' => 'form-control', 'required' => ''))}}

            {{Form::label('slug',"Slug")}}
            {{Form::text('slug',null,array('class' => 'form-control', 'required' => '', 'minLength' => '5','maxLength' => '255'))}}

            {{Form::label('category_id', 'Kategorija: ')}}
            <select class="form-control " name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" class="form-spacing-top">{{$category->name}}</option>
                @endforeach
            </select>

            {{Form::label('tags', 'Tagovi: ')}}
            <select class="form-control select2-multiple" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" class="form-spacing-top">{{$tag->name}}</option>
                @endforeach
            </select>

            {{Form::label('body',"Tekst")}}
            {{Form::textarea('body',null,array('class' => 'form-control'))}}


            {{ Form::submit('Stvori Post',array('class' => 'btn btn-success btn-block ','style' => 'margin-top:20px')) }}
        {!! Form::close() !!}
    </div>
</div>

<script type="text/javascript">
    $('.select2-multiple').select2();
</script>

@include('pages.footer')

