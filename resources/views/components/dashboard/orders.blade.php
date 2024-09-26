<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="table-responsive">



                <h2>Current Bookings</h2>


                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Car</th>
                            <th>Start Data</th>
                            <th>End Date</th>
                            <th>Payable</th>
                            <th>Actions</th>
                            <th>Cancel</th>
                        </tr>
                    </thead>
                    @foreach ($currentBookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->car->name }}</td>
                            <td>{{ $booking->start_date }}</td>
                            <td>{{ $booking->end_date }}</td>
                            <td>{{ $booking->total_cost }}</td>
                            <td>{{ $booking->status }}</td>
                            <td>
                                @if ($booking->status == 'canceled')
                                    <p>Booking cancelled</p>
                                @else
                                    {{-- <p>{{ $booking->car->name }} - Starts: {{ $booking->start_date }}</p> --}}
                                    <form action="{{ url('bookings/cancel/' . $booking->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Cancel</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </thead>
                </table>



                <h2>Past Bookings</h2>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Car</th>
                            <th>Start Data</th>
                            <th>End Date</th>
                            <th>Payable</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    @foreach ($pastBookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->car->name }}</td>
                            <td>{{ $booking->start_date }}</td>
                            <td>{{ $booking->end_date }}</td>
                            <td>{{ $booking->total_cost }}



                                {{-- <p>{{ $booking->car->name }} - Ended: {{ $booking->end_date }}</p> --}}
                            </td>
                            <td>{{ $booking->status }}</td>
                        </tr>
                    @endforeach
                </table>




            </div>
        </div>
    </div>
</div>

<div class="modal" id="InvoiceProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fs-6" id="exampleModalLabel">Products</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="productList">

                    </tbody>
                </table>



            </div>
        </div>
    </div>
</div>
{{-- 

<script>
    async function OrderListRequest() {
        let res = await axios.get("/InvoiceList");
        let json = res.data

        $("#OrderList").empty();


        if (json.length !== 0) {
            json.forEach((item, i) => {
                let rows = `<tr>
                       <td>${item['id']}</td>
                       <td>$ ${item['end_date']} </td>
                       <td>${item['start_date']}</td>
                       <td>${item['total_cost']}</td>
                       <td>${item['status']}</td>
                       <td><button data-id=${item['id']} class="btn more btn-danger btn-sm">More</button></td>
                   </tr>`

                $("#OrderList").append(rows);
            })


            $(".more").on('click', function() {
                let id = $(this).data('id');
                InvoiceProductList(id)
            })

        }
    }




    async function InvoiceProductList(id) {

        $(".preloader").delay(90).fadeIn(100).removeClass('loaded');
        let res = await axios.get("/InvoiceProductList/" + id);
        $("#InvoiceProductModal").modal('show');
        $(".preloader").delay(90).fadeOut(100).addClass('loaded');



        $("#productList").empty();

        res.data.forEach((item, i) => {
            let rows = `<tr>
                       <td>${item['product']['title']}</td>
                        <td>${item['qty']}</td>
                       <td>$ ${item['sale_price']}</td>
                   </tr>`
            $("#productList").append(rows);
        });

    }
</script> --}}
