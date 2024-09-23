@extends('layout.sidenav-layout-admin')

@section('content')
    <h2>Add New Customer</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Customer Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control" required>{{ old('address') }}</textarea>
        </div>
        <div class="form-group">
            <label for="address">Password</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Add Customer</button>
    </form>
@endsection
