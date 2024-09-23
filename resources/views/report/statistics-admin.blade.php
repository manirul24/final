@extends('layout.sidenav-layout-admin')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">

                    <h2>Rental Statistics</h2>

                    <ul class="list-group">
                        <li class="list-group-item">Total Number of Cars: <strong>{{ $totalCars }}</strong></li>
                        <li class="list-group-item">Number of Available Cars: <strong>{{ $availableCars }}</strong></li>
                        <li class="list-group-item">Total Number of Rentals: <strong>{{ $totalRentals }}</strong></li>
                        <li class="list-group-item">Total Earnings from Rentals:
                            <strong>${{ number_format($totalEarnings, 2) }}</strong>
                        </li>
                    </ul>


                </div>
            </div>
        </div>
    </div>
@endsection
