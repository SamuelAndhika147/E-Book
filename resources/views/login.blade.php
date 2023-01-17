@extends('layouts.master')

@section('head')
<title>Register Page</title>
<link rel="stylesheet" href="/css/register.css">
@endsection

@section('content')
<div class="container" data-aos="flip-up" data-aos-duration="800">
    <form action="/post-login" method="post">
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
        <h3>Login</h3>
        <div class="label">
            <label for="">Email</label>
            <input type="text" name="email" placeholder="Input your email">
        </div>
        <div class="label">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Input your password">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection
