@extends('layouts.master')

@section('head')
<title>Edit Book</title>
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
            <li> Users</li>
        </a>
        <a href="/create">
            <li>> Book</li>
        </a>
        <a href="/category">
            <li> Category Book</li>
        </a>
        <a href="/">
            <li> Beranda</li>
        </a>
    </ul>
</div>

<div class="create-book" data-aos="flip-up" data-aos-duration="800">
    <h2>Create Book</h2>
    <form action="/update-book/{{ $book->id }}" method="post" enctype="multipart/form-data">
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
        <div class="label">
            <label for="">Title</label>
            <input type="text" name="title" value="{{ $book->title }}" placeholder="Input book's title">
        </div>
        <div class="label">
            <label for="">Writer</label>
            <input type="text" name="writer" value="{{ $book->writer }}" placeholder="Input book's writer">
        </div>
        <div class="label">
            <label for="">Publisher</label>
            <input type="text" name="publisher" value="{{ $book->publisher }}" placeholder="Input book's publisher">
        </div>

        <div class="bottom">
            <div class="left">
                <div class="label">
                    <label for="">Category Book</label>
                    <select name="category" placeholder="Input book's category">
                        <option hidden>Input book's category</option>
                        @foreach ($category as $item)
                        <option value="{{ $item->category }}">{{ $item->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="label">
                    <label for="">Cover</label>
                    <input type="file" class="file" src="" alt="" name="image">
                </div>
            </div>

            <div class="right">
                <div class="label">
                    <label for="">No ISBN</label>
                    <input type="text" name="isbn" value="{{ $book->isbn }}" placeholder="Input book's ISBN">
                </div>
                <div class="label">
                    <label for="">Synopsis</label>
                    <textarea name="synopsis" value="{{ $book->synopsis }}" id="" cols="30" rows="2"></textarea>
                </div>
            </div>
        </div>

        <button type="submit">Submit</button>
    </form>
