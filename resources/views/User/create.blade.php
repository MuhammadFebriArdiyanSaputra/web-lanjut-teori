@extends('layouts.app')
@section('title', 'CREATE USER')

@section('content')

<div class="container py-5">
    <h1>CREATE USER</h1>
    <form action="{{ url('user/create') }}" method="POST">
        @csrf
        <input type="hidden" name="_token" value="{{csrf_token() }}">
        <div class="form-grup">
            <label>Name</label>
            <input type="text" class="form-control" name="name" required>

            <label>Email</label>
            <input type="email" class="form-control" name="email" required>

            <label>Password</label>
            <input type="password" class="form-control" name="password" required>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button> 
            </div>
        </div>
    </form>
</div>

@endsection
