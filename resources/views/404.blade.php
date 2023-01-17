@extends('layouts.master')

@section('head')
<title>404 Not Found</title>
<link rel="stylesheet" href="/css/landing.css">
@endsection

@section('content')
<div class="container-404">
    <div class="content" data-aos="zoom-in" data-aos-duration="800">
        <h1>
            404
        </h1>
        <h2>Page Not Found</h2>
        <p>The page you looking for doesn,t exist or an other error accurred</p>

        @if (Auth()->user()->role == 'user')
        <a href="/dashboard-user">
            <button>Back</button>
        </a>
        @else
        <a href="/dashboard">
            <button>Back</button>
        </a>
        @endif
    </div>
</div>
@endsection
