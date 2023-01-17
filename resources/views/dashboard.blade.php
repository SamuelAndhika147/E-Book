@extends('layouts.master')

@section('head')
<title>Dashboard Page</title>
<link rel="stylesheet" href="/css/dashboard.css">
@endsection

@section('content')
    <div class="sidebar" data-aos="fade-right" data-aos-duration="800">
        <strong>E-BOOK</strong>

        <ul style="list-style: none;">
           <a href="/dashboard"><li>> Dashboard</li></a>
           <a href="/user"><li> Users</li></a>
           <a href="/create"><li> Book</li></a>
           <a href="/category"><li> Category Book</li></a>
           <a href="/"><li> Beranda</li></a>
        </ul>
    </div>

    <div class="content" data-aos="fade-down" data-aos-duration="800">
        <h1>Dashboard</h1>
        <h4>Admin {{ $users->name }}</h4>
    </div>
@endsection