@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card animated fadeIn w-100 p-3">
                    <div class="card-body">


                        <nav class="flex justify-center space-x-4">
                            <a href="/cars-index"
                                class="font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Home</a>
                            <a href="/userLogin"
                                class="font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">login</a>
                            <a href="/bookings"
                                class="font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">bookings</a>
                            <a href="/reports"
                                class="font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Reports</a>
                        </nav>

                        <hr>


                        <div class="form-row">
                            <div class="col-md-12 col-lg-12">
                                <form method="GET" action="{{ route('cars.index') }}">



                                    <div class="form-group col-md-3" style="float:left">
                                        <label for="car_type">Car Type:</label>
                                        <select name="car_type" class="form-control" id="car_type">
                                            <option value="">Select Type</option>
                                            @foreach ($carTypes as $type)
                                                <option value="{{ $type->car_type }}"
                                                    {{ request('car_type') == $type->car_type ? 'selected' : '' }}>
                                                    {{ $type->car_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3" style="float:left">
                                        <label for="brand">Brand:</label>
                                        <select name="brand" class="form-control" id="brand">
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->brand }}"
                                                    {{ request('brand') == $brand->brand ? 'selected' : '' }}>
                                                    {{ $brand->brand }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2" style="float:left">
                                        <label for="min_price">Min Price:</label>
                                        <input type="number" class="form-control" name="min_price"
                                            value="{{ request('min_price') }}" placeholder="Min Price">
                                    </div>

                                    <div class="form-group col-md-2" style="float:left">
                                        <label for="max_price">Max Price:</label>
                                        <input type="number" class="form-control" name="max_price"
                                            value="{{ request('max_price') }}" placeholder="Max Price">
                                    </div>
                                    <div class="form-group col-md-2" style="float:left">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>




                                </form>
                            </div>
                        </div>

                        <br clear="all">


                        <div class="card">

                            <div class="card-body">




                                <h3>Available Cars:</h3>
                                @if ($cars->isEmpty())
                                    <p>No cars found matching the filters.</p>
                                @else
                                    @foreach ($cars as $car)
                                        <div>
                                            <h4>{{ $car->car_name }} ({{ $car->brand }})</h4>
                                            <p>Type: {{ $car->car_type }}</p>
                                            <p>Daily Rent: ${{ $car->daily_rent_price }}</p>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
