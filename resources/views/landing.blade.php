@extends('layouts.master')

@section('head')
<title>Landing Page</title>
<link rel="stylesheet" href="/css/landing.css">
@endsection

@section('content')
<div class="nav" data-aos="fade-down" data-aos-duration="800">
    <h2>E-BOOK</h2>
    <div class="link">
        <a id="landing" href="#">Beranda</a>
        @if (Auth::check())
        <a href="/logout">Logout</a>
        @if (Auth()->user()->role == 'user')
        <a href="/dashboard-user">Home</a>
        @endif
        @if (Auth()->user()->role == 'admin')
        <a href="/dashboard">Dashboard</a>
        @endif
        @else
        <a href="/login">Login</a>
        @endif
    </div>
</div>

<div class="container" data-aos="fade-down" data-aos-duration="800">
    <div class="header">
        <h1>Better Solution For Your <br>
            Choice Book</h1>
        <p>We can access cook for online and free!</p>

        @if (Auth::check())
        @if (Auth()->user()->role == 'admin')
        <a href="/">
            <button>Sudah Login</button>
        </a>
        @else
        <a href="/dashboard-user ">
            <button>Home</button>
        </a>
        @endif
        @else
        <a href="/register">
            <button>Register</button>
        </a>
        @endif
    </div>
</div>
@endsection
