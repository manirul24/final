 <div class="container">
     <div class="row">
         <div class="col-md-12 col-lg-12">
             <div class="card animated fadeIn w-100 p-3">
                 <div class="card-body">

                     <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                         @csrf


                         <h4>Add Car</h4>
                         <hr />

                         <div class="container-fluid m-0 p-0">
                             <div class="row m-0 p-0">


                                 <div class="col-md-4 p-2">
                                     <label for="name">Car Name</label>
                                     <input type="text" name="name" class="form-control" required>
                                 </div>



                                 <div class="col-md-4 p-2">
                                     <label for="brand">Brand</label>
                                     <input type="text" name="brand" class="form-control" required>
                                 </div>

                                 <div class="col-md-4 p-2">
                                     <label for="model">Model</label>
                                     <input type="text" name="model" class="form-control" required>
                                 </div>


                                 <div class="col-md-4 p-2">
                                     <label for="year_of_manufacture">Year of Manufacture</label>
                                     <input type="number" name="year_of_manufacture" class="form-control" required>
                                 </div>

                                 <div class="col-md-4 p-2">
                                     <label for="car_type">Car Type</label>
                                     <input type="text" class="form-control" name="car_type" class="form-control"
                                         required>
                                 </div>
                                 <div class="col-md-4 p-2">
                                     <label for="daily_rent_price">Daily Rent Price</label>
                                     <input type="number" name="daily_rent_price" step="0.01" class="form-control"
                                         required>
                                 </div>
                                 <div class="col-md-4 p-2">

                                     <label for="availability_status">Availability Status</label>
                                     <select name="availability_status" class="form-control">
                                         <option value="1">Available</option>
                                         <option value="0">Not Available</option>
                                     </select>
                                 </div>



                                 <div class="col-md-4 p-2">
                                     <label for="car_image">Car Image</label>
                                     <input type="file" name="car_image">
                                 </div>






                                 <div class="row m-0 p-0">
                                     <div class="col-md-12 p-2">
                                         <button type="submit" class="btn mt-3 w-100  bg-gradient-primary">Add
                                             Car</button>
                                     </div>
                                 </div>

                             </div>

                         </div>
                     </form>

                 </div>

             </div>

         </div>
     </div>
 </div>
