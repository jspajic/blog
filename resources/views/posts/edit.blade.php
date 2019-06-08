@include('pages.header')

<script>
    tinymce.init({
        selector:'textarea',
        height: 250,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount',
            'link', 'code'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | link | code',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'
        ]
    });
</script>

<div class="row" id="form">
    <div class="col-md-8 offset-2">

        <h1>Uredi post</h1>
        <hr>
        {{Form::model($post, ['route'=>['posts.update',$post->id], 'method' => 'PUT'])}} {{--Otvaramo formu i povezujemo je s kontrolerom! --}}

        {{Form::label('title','Naslov:', ['class'=>'form-spacing-top'])}}
        {{Form::text('title',null, ["class" => 'form-control post-title'])}}

        {{Form::label('slug','Slug', ['class'=>'form-spacing-top'])}}
        {{Form::text('slug',null,["class" => 'form-control '])}}

        {{Form::label('category_id', 'Kategorija: ', ['class'=>'form-spacing-top'])}}
        {{Form::select('category_id',$categories,null,['class' => 'form-control'])}}

        {{Form::label('tags', 'Tagovi: ',['class' => 'form-spacing-top'])}}
        {{Form::select('tags[]',$tags,null,['class' => 'form-control select2-multiple', 'multiple' => 'multiple'])}}

        {{Form::label('body','Sadrzaj:', ['class'=>'form-spacing-top'])}}
        {{Form::textarea('body',null,['class'=>'form-control'])}}


        <div class="row">
            <div class="col-sm-6 mt-2">
                {!! Html::linkRoute('posts.index', 'Ponisti uredivanje', array($post->id),array('class' => 'btn btn-danger')) !!}
            </div>
            <div class="mt-2 ml-auto">
                {{Form::submit('Spremi promjene', ['class'=>'btn btn-success']) }}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>


<script type="text/javascript">
    $('.select2-multiple').select2();
</script>

@include('pages.footer')
