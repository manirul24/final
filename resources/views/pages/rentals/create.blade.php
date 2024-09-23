@extends('layout.sidenav-layout-admin')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card animated fadeIn w-100 p-3">
                    <div class="card-body">


                        <h2>Create New Rental</h2>

                        <!-- Error Messages -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('rentals.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="user_id">Customer</label>
                                <select name="user_id" class="form-control" required>
                                    <option value="">Select Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="car_id">Car</label>
                                <select name="car_id" class="form-control" required>
                                    <option value="">Select Car</option>
                                    @foreach ($cars as $car)
                                        <option value="{{ $car->id }}">{{ $car->name }} ({{ $car->brand }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="total_cost">Total Cost</label>
                                <input type="number" name="total_cost" class="form-control" step="0.01" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="ongoing">Ongoing</option>
                                    <option value="completed">Completed</option>
                                    <option value="canceled">Canceled</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Rental</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
