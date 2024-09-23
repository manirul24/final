<form method="POST" action="{{ route('bookings.store') }}">
    @csrf

    <div>
        <label for="car_id">Select Car:</label>
        <select name="car_id" id="car_id" required>
            <option value="">Choose a car</option>
            @foreach ($cars as $car)
                <option value="{{ $car->id }}">{{ $car->name }} ({{ $car->brand }}) -
                    ${{ $car->daily_rent_price }} / day</option>
            @endforeach
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

    <button type="submit">Book Car</button>
</form>
