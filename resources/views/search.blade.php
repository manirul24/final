@extends('layout.app')

@section('content')
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap.css" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card px-5 py-5">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Search Cars</h4>
                        </div>
                        <div class="align-items-center col">

                        </div>
                    </div>
                    <hr class="bg-dark " />





                    <div class="form-row">
                        <div class="col-md-12 col-lg-12">
                            <form method="GET" action="{{ route('search') }}">

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
                            <table class="table" id="tableData">
                                <thead>
                                    <tr class="bg-light">
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    @if ($cars->isEmpty())
                                        <tr>
                                            <td>
                                                <p>No cars found matching the filters.</p>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($cars as $car)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('storage/' . $car->car_image) }}"
                                                        alt="{{ $car->car_image }}" width="100">

                                                </td>
                                                <td>
                                                    <h4>{{ $car->car_name }} ({{ $car->brand }})</h4>
                                                </td>
                                                <td>
                                                    <p>Type: {{ $car->car_type }}</p>
                                                </td>
                                                <td>
                                                    <p>Daily Rent: ${{ $car->daily_rent_price }}</p>
                                                </td>
                                                <td><a href="{{ url('bookings', $car->id) }}"
                                                        class="btn btn-sm btn-outline-primary">Booking</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </thead>
                            </table>

                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
    </div>






@endsection
<script>
    new DataTable('#tableData');
</script>

<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
