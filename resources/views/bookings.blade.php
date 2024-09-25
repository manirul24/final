@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card px-5 py-5">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>{{ $cars->name }}</h4>
                        </div>
                        <div class="align-items-center col">

                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="error bg-dark"> {{ implode('', $errors->all(':message')) }}</div>
                    @endif
                    <hr class="bg-dark " />



                    <div class="row">

                        <div class="col-md-4 item-photo">
                            <img src="{{ asset('storage/' . $cars->car_image) }}" alt="{{ $cars->car_image }}"
                                style="max-width:100%;">

                        </div>
                        <div class="col-md-8" style="border:0px solid gray">
                            <!-- Datos del vendedor y titulo del producto -->
                            <h3>{{ $cars->name }}</h3>
                            <h5 style="color:#337ab7">{{ $cars->brand }} <small
                                    style="color:#337ab7">{{ $cars->model }}</small></h5>

                            <!-- Precios -->
                            <span class="badge bg-success">{{ $cars->availability }}</span>

                            <h6 class="title-price">Type: <small> {{ $cars->car_type }}</small></h6>
                            <h6 class="title-price">Year of manufacture:
                                <small> {{ $cars->year_of_manufacture }}</small>
                            </h6>
                            <h3 style="margin-top:0px;">U$S {{ $cars->daily_rent_price }} /Day</h3>

                            <!-- Detalles especificos del producto -->

                            <form method="POST" action="{{ route('bookings.store') }}">
                                <div class="section" style="padding-bottom:20px;">

                                    @csrf

                                    <div>
                                        <input type="hidden" name="user_id" value="7">
                                        <input type="hidden" name="daily_rent_price"
                                            value="{{ $cars->daily_rent_price }}">
                                        <label for="car_id">Select Car:</label>
                                        <select name="car_id" id="car_id" required>
                                            <option value="">Choose a car</option>

                                            <option value="{{ $cars->id }}">{{ $cars->name }}
                                                ({{ $cars->brand }}) -
                                                ${{ $cars->daily_rent_price }} / day</option>

                                        </select>
                                    </div>

                                    <div>
                                        <label for="start_date">Rental Start Date:</label>
                                        <input type="date" name="start_date" required>
                                    </div>

                                    <div>
                                        <label for="end_date">Rental End Date:</label>
                                        <input type="date" name="end_date" required>
                                    </div>



                                </div>

                                <!-- Botones de compra -->
                                <div class="section" style="padding-bottom:20px;">

                                    @if ($cars->availability == 'Available')
                                        <button class="btn btn-success">
                                            Bookings</button>
                                    @endif
                                </div>

                            </form>
                        </div>
                    </div>







                </div>
            </div>
        </div>
    </div>
@endsection
