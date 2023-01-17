@extends('layouts.master')

@section('head')
<title>Edit User</title>
<link rel="stylesheet" href="/css/dashboard.css">
@endsection

@section('content')
<div class="sidebar" data-aos="fade-right" data-aos-duration="800">
    <strong>E-BOOK</strong>

    <ul style="list-style: none;">
        <a href="/dashboard">
            <li> Dashboard</li>
        </a>
        <a href="/user">
            <li>> Users</li>
        </a>
        <a href="/create">
            <li> Book</li>
        </a>
        <a href="/category">
            <li> Category Book</li>
        </a>
        <a href="/">
            <li> Beranda</li>
        </a>
    </ul>
</div>

<div class="container" data-aos="zoom-in" data-aos-duration="800">
    <form action="/update/{{ $user->id }}" method="post">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="list-style-type: none;">
                @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @csrf
        @method('PATCH')
        <h3>Edit User</h3>
        <div class="label">
            <label for="">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" placeholder="Input your name">
        </div>
        <div class="label">
            <label for="">Email</label>
            <input type="text" name="email" value="{{ $user->email}}" placeholder="Input your email">
        </div>
        <div class="label">
            <label for="">City</label>
            <input type="text" name="city" value="{{ $user->city }}" placeholder="Input your city">
        </div>
        <div class="label">
            <label for="">No Hp</label>
            <input type="text" name="no_hp" value="{{ $user->no_hp }}" placeholder="Input your number">
        </div>
        <div class="label">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Input your password">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection
