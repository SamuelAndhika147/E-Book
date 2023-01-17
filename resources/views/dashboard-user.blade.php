@extends('layouts.master')

@section('head')
<title>Landing Page</title>
<link rel="stylesheet" href="/css/dashboard-user.css">
@endsection

@section('content')
<div class="nav" data-aos="fade-down" data-aos-duration="800">
    <h2>E-BOOK</h2>
    <div class="link">
        <a id="landing" href="#">Hi, {{ $user->name }}</a>
        @if (Auth::check())
        <a href="/logout">Logout</a>
        @if (Auth()->user()->role == 'admin')
        <a href="/dashboard">Dashboard</a>
        @endif
        @else
        <a href="/login">Login</a>
        @endif
        <a href="/">Beranda</a>
    </div>
</div>

<div class="content" data-aos="zoom-in" data-aos-duration="800">
    @foreach ($book as $item)
    <div class="card">
        <a href="/read/{{ $item->id }}">
            <img src="/img/cover-books/{{ $item->image }}" alt="img">
        </a>
        <h3>{{ $item->title }}</h3>
        <p>{{ $item->writer }}</p>
        <a href="/read/{{ $item->id }}">
            <button>Read</button>
        </a>
    </div>
    @endforeach
</div>
@endsection
