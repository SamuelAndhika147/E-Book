@extends('layouts.master')

@section('head')
<title>{{ $book->title }}</title>
<link rel="stylesheet" href="/css/book.css">
@endsection

@section('content')
<div class="nav" data-aos="fade-down" data-aos-duration="800">
    <h2>{{ $book->title }}</h2>
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
        <a href="/dashboard-user">Back</a>
    </div>
</div>

<div class="container" data-aos="zoom-in" data-aos-duration="800">
    <div class="content">
        <img src="/img/cover-books/{{ $book->image }}" alt="img">
        <div class="description">
            <p>Judul : {{ $book->title }}</p>
            <p>Penulis : {{ $book->writer }}</p>
            <p>Penerbit : {{ $book->publisher }}</p>
            <p>No ISBN : {{ $book->isbn }}</p>
            <h3>Sinopsis : </h3>
            <p>{{ $book->synopsis }}</p>
        </div>
    </div>
</div>
@endsection
