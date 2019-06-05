@include('pages.header')
 <div class="col-md-4 offset-4">
     {{Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'Put'])}}

     {{Form::label('name', "Naziv: ")}}
     {{Form::text('name', null,['class' => 'form-control'])}}


     {{Form::submit('Spremi promjene',['class' => 'btn btn-success form-spacing-top'])}}
     {{Form::close()}}
 </div>

@include('pages.footer')