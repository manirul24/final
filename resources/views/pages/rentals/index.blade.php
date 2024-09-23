@extends('layout.sidenav-layout-admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card animated fadeIn w-100 p-3">
                    <div class="card-body">

                        <h1>Manage Rental</h1>
                        <a href="{{ route('rentals.create') }}" class="btn btn-success">Add New Rental</a>

                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Rental ID</th>
                                    <th>Customer Name</th>
                                    <th>Car Details</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Cost</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentals as $rental)
                                    <tr>
                                        <td>{{ $rental->id }}</td>
                                        <td>{{ $rental->user->name }}</td>
                                        <td>{{ $rental->car->name }} ({{ $rental->car->brand }})</td>
                                        <td>{{ $rental->start_date }}</td>
                                        <td>{{ $rental->end_date }}</td>
                                        <td>${{ $rental->total_cost }}</td>
                                        <td>{{ ucfirst($rental->status) }}</td>
                                        <td>
                                            <a href="{{ route('rentals.edit', $rental->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
