@include('pages.header')

@section('title','Mojtitle')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p>
                Filip Šekerija i Jozo Spajić su studenti informatike na Fakultetu Prirodoslovno-matematičkih i odgojnih znanosti.
                Ovaj blog je nastao kao projekt za kolegij Programiranje za internet.
                Nas rad mozete provjeriti u nasem GitHub repozitoriju koji se nalazi na
                 <a href="{{$data['git']}}" style="text-decoration: none; color: black;">linku</a>
            </p>
        </div>
    </div>
</div>

<hr>
@extends('pages.footer')