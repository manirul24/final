@extends('layout.sidenav-layout-admin')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card animated fadeIn w-100 p-3">
                    <div class="card-body">

                        <h1>Edit Car: {{ $car->name }}</h1>

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




                        <!-- Edit Car Form -->
                        <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')




                            <div class="container-fluid m-0 p-0">
                                <div class="row m-0 p-0">





                                    <div class="col-md-6 p-2">
                                        <label for="name">Car Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $car->name) }}" required>
                                    </div>



                                    <div class="col-md-6 p-2">
                                        <label for="brand">Brand</label>
                                        <input type="text" name="brand" class="form-control"
                                            value="{{ old('brand', $car->brand) }}" required>
                                    </div>


                                    <div class="col-md-4 p-2">
                                        <label for="model">Model</label>
                                        <input type="text" name="model" class="form-control"
                                            value="{{ old('model', $car->model) }}" required>
                                    </div>

                                    <div class="col-md-4 p-2">
                                        <label for="year_of_manufacture">Year of Manufacture</label>
                                        <input type="number" name="year_of_manufacture"
                                            value="{{ old('year_of_manufacture', $car->year_of_manufacture) }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-4 p-2">
                                        <label for="daily_rent_price">Daily Rent Price</label>
                                        <input type="number" name="daily_rent_price" step="0.01"
                                            value="{{ old('daily_rent_price', $car->daily_rent_price) }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-4 p-2">
                                        <label for="car_type">Car Type</label>
                                        <input type="text" name="car_type" class="form-control"
                                            value="{{ old('car_type', $car->car_type) }}" required>
                                    </div>

                                    <div class="col-md-4 p-2">
                                        <label for="availability_status">Availability Status</label>
                                        <select name="availability" class="form-control">
                                            <option value="1" {{ $car->availability ? 'selected' : '' }}>Available
                                            </option>
                                            <option value="0" {{ !$car->availability ? 'selected' : '' }}>Not
                                                Available
                                            </option>
                                        </select>
                                    </div>





                                    <div class="col-md-12 p-2">
                                        <label for="car_image">Car Image</label>
                                        @if ($car->image)
                                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}"
                                                width="100">
                                        @endif
                                        <input type="file" name="image">
                                    </div>








                                    <button type="submit" class="btn btn-primary">Update Car</button>


                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
