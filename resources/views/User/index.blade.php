@extends('layouts.app')
@section('title', 'CREATE USER')

@section('content')

<div class="container py-5">
    <h1>LIST USER</h1>

        <!-- Tombol Create di luar tabel -->
    <div class="mb-3">
        <div class="d-inline-block">
            <a href="{{ route('user.create') }}" class="btn btn-primary">Create</a>
        </div>
    </div>

    <table class="table table-hover" style="width: 100% limportant">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $no=>$item)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <form action="{{ url('user', $item->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn sm">DELETE</button>

                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn sm">Edit</a>
                        
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
