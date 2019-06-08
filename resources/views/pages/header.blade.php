<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TechToday</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">



    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>


    <link href="{{ asset('css/clean-blog.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/4fc9f60a65.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">

        <a class="navbar-brand" href="{{url('/')}}">TechToday</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('about')}}">About</a>
                </li>
                <li class="nav-item dropdown text">
                    @if(Auth::check())
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">Dobrodosao, {{Auth::user()->name}}! <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li><a href="{{route('posts.index')}}" class="text-secondary">Postovi</a></li>
                            <li><a href="{{route('categories.index')}}" class="text-secondary">Kategorije</a></li>
                            <li><a href="{{route('tags.index')}}" class="text-secondary">Tagovi</a></li>
                            <li role="separator" class="divider"></li>
                            <hr>
                            <li><a href="{{route('logout')}}" class="text-secondary">Logout</a></li>
                        </ul>
                    @else
                        <a href="{{route('login')}}" class="btn">Prijava</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Page Header -->
<header class="masthead"
        style="background-image: url('https://i.ibb.co/QPSKYwZ/Tech-Today.png')"> <!-- promijeniti sliku -->
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                </div>
            </div>
        </div>
    </div>
</header>
@include('pages.messages')