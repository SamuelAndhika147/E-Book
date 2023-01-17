@extends('layouts.master')

@section('head')
<title>Create Page</title>
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
            <li> Book</li>
        </a>
        <a href="/category">
            <li>> Category Book</li>
        </a>
        <a href="/">
            <li> Beranda</li>
        </a>
    </ul>
</div>

<div class="create-book" data-aos="flip-up" data-aos-duration="800">
    <h2>Create Book Category</h2>
    <form action="/post-category" method="post">
        @csrf
        <div class="label">
            <label for="">Category</label>
            <input type="text" name="category" placeholder="Input category">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

<div class="table-book" data-aos="flip-up" data-aos-duration="800">
    <table>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ( $category as $no => $item)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $item->id }}</td>
            <td>{{ $item->category }}</td>
            <td>
                <div class="action">
                    <form action="/destroy-category/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
