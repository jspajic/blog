@include('pages.header')

@section('title','Mojtitle')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p>
                Nas rad mozete provjeriti u nasem GitHub repozitoriju koji se nalazi na
                 <a href="{{$data['git']}}" style="text-decoration: none; color: black;">linku</a>
            </p>
        </div>
    </div>
</div>

<hr>
@extends('pages.footer')