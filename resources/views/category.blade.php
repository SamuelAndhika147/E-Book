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
            <input type="text" name="kategori" placeholder="Input category">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

<div class="table-book" data-aos="flip-up" data-aos-duration="800">
    <table class="example">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        @php
        $no=1;
        @endphp
        <tbody>
            @foreach ( $category as $no => $item)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->kategori }}</td>
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
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });

    </script>
    @endsection
