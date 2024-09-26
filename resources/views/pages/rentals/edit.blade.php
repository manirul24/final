@extends('layout.sidenav-layout-admin')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card animated fadeIn w-100 p-3">
                    <div class="card-body">

                        <h2>Edit Rental</h2>

                        <form action="{{ route('rentals.update', $rental->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="customer_id">Customer</label>
                                <select name="customer_id" class="form-control" required>
                                    <option value="">Select Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}"
                                            {{ $rental->user_id == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="car_id">Car</label>
                                <select name="car_id" class="form-control" required>
                                    <option value="">Select Car</option>
                                    @foreach ($cars as $car)
                                        <option value="{{ $car->id }}"
                                            {{ $rental->car_id == $car->id ? 'selected' : '' }}>
                                            {{ $car->name }} ({{ $car->brand }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ $rental->start_date }}" required>
                            </div>

                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" class="form-control" value="{{ $rental->end_date }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="total_cost">Total Cost</label>
                                <input type="number" name="total_cost" class="form-control" step="0.01"
                                    value="{{ $rental->total_cost }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="ongoing" {{ $rental->status == 'ongoing' ? 'selected' : '' }}>Ongoing
                                    </option>
                                    <option value="completed" {{ $rental->status == 'completed' ? 'selected' : '' }}>
                                        Completed</option>
                                    <option value="canceled" {{ $rental->status == 'canceled' ? 'selected' : '' }}>Canceled
                                    <option value="Booked" {{ $rental->status == 'Booked' ? 'selected' : '' }}>Booked

                                    <option value="Pending" {{ $rental->status == 'Pending' ? 'selected' : '' }}>Pending
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Rental</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
