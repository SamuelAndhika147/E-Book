@extends('layouts.master')

@section('head')
<title>Users Page</title>
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

<div class="table-user" data-aos="flip-up" data-aos-duration="800">
    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th>No Handphone</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ( $user as $no => $item)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->city }}</td>
            <td>{{ $item->no_hp }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->role }}</td>
            <td>
                <div class="action">
                    <a href="/edit/{{ $item->id }}">Edit</a>
                    <form action="/destroy/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
