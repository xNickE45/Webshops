@extends('layouts.app')

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@auth
    @if(Auth::user()->is_admin)

        @section('content')
        <div class="container">
            <h1>Dashboard</h1>
            <h2>Console Maintenance</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consoles as $console)
                        <tr>
                            <td>{{ $console->id }}</td>
                            <td><a href="{{ route('admin.show', $console->id) }}">{{ $console->name }}</a></td>
                            <td><img src="{{ asset('storage/' . $console->image_url) }}" alt="{{ $console->name }}" style="width: 100px;"></td>
                            <td>{{ $console->price }}</td>
                            <td>{{ $console->amount }}</td>
                            <td>
                                <a href="{{ route('admin.edit', $console->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.destroy', $console->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.create') }}" class="btn btn-primary">Create New Console</a>
            <a href="{{ route('home') }}" class="btn btn-primary">Back to the Homepage</a>
        </div>
        @endsection
    @endif
@endauth
