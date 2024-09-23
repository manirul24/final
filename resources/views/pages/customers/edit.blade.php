@extends('layout.sidenav-layout-admin')
@section('content')
    <form action="{{ isset($customer) ? route('customers.update', $user->id) : route('customers.store') }}" method="POST">
        @csrf
        @if (isset($user))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name ?? old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email ?? old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $user->phone ?? old('phone') }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control" required>{{ $user->address ?? old('address') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
