@extends('layout.sidenav-layout-admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card animated fadeIn w-100 p-3">
                    <div class="card-body">


                        <h1>Manage Cars</h1>

                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Add Car Button -->
                        <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Add New Car</a>

                        <!-- Cars Table -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Car Name</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Year of Manufacture</th>
                                    <th>Car Type</th>
                                    <th>Daily Rent Price</th>
                                    <th>Availability</th>
                                    <th>Car Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $car)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $car->name }}</td>
                                        <td>{{ $car->brand }}</td>
                                        <td>{{ $car->model }}</td>
                                        <td>{{ $car->year_of_manufacture }}</td>
                                        <td>{{ $car->car_type }}</td>
                                        <td>${{ number_format($car->daily_rent_price, 2) }}</td>
                                        <td>
                                            @if ($car->availability)
                                                <span class="badge bg-success">Available</span>
                                            @else
                                                <span class="badge bg-danger">Not Available</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($car->car_image)
                                                <img src="{{ asset('storage/' . $car->car_image) }}"
                                                    alt="{{ $car->name }}" width="100">
                                            @else
                                                <p>No Image</p>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
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
