<div class="container-fluid">

    <div class="row">

        <div class="col-md-3 p-2">
            <label class="form-label">Customer Name</label>
            <input type="text" id="cus_name" value="{{ $users->name }}" class="form-control form-control-sm" />
        </div>

        <div class="col-md-3 p-2">
            <label class="form-label">Customer Address</label>
            <input type="text" id="cus_add" value="{{ $users->address }}" class="form-control form-control-sm" />
        </div>


        <div class="col-md-3 p-2">
            <label class="form-label">Customer Phone</label>
            <input type="text" id="cus_phone" value="{{ $users->phone }}" class="form-control form-control-sm" />
        </div>

        <div class="col-md-3 p-2">
            <label class="form-label">Customer Email</label>
            <input type="text" id="email" value="{{ $users->email }}" class="form-control form-control-sm" />
        </div>

    </div>

    <hr />



    <hr />



    {{-- <div class="row">
        <div class="col-md-3">
            <button onclick="ProfileCreate()" class="btn btn-danger">Save Change</button>
        </div>
    </div> --}}


</div>

{{-- 
<script>
    ProfileCreate();
    async function ProfileCreate() {

        let cus_name = document.getElementById('cus_name').value;
        let cus_add = document.getElementById('cus_add').value;
        let cus_city = document.getElementById('cus_city').value;
        let cus_state = document.getElementById('cus_state').value;
        let cus_postcode = document.getElementById('cus_postcode').value;
        let cus_phone = document.getElementById('cus_phone').value;
        let cus_country = document.getElementById('cus_country').value;
        let cus_fax = document.getElementById('cus_fax').value;
        let ship_name = document.getElementById('ship_name').value;
        let ship_add = document.getElementById('ship_add').value;
        let ship_city = document.getElementById('ship_city').value;
        let ship_state = document.getElementById('ship_state').value;
        let ship_postcode = document.getElementById('ship_postcode').value;
        let ship_country = document.getElementById('ship_country').value;
        let ship_phone = document.getElementById('ship_phone').value;

        let postBody = {
            "cus_name": cus_name,
            "cus_add": cus_add,
            "cus_city": cus_city,
            "cus_state": cus_state,
            "cus_postcode": cus_postcode,
            "cus_country": cus_country,
            "cus_phone": cus_phone,
            "cus_fax": cus_fax,
            "ship_name": ship_name,
            "ship_add": ship_add,
            "ship_city": ship_city,
            "ship_state": ship_state,
            "ship_postcode": ship_postcode,
            "ship_country": ship_country,
            "ship_phone": ship_phone
        }


        $(".preloader").delay(90).fadeIn(100).removeClass('loaded');
        let res = await axios.post("/CreateProfile", postBody);
        $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        if (res.data['msg'] === "success") {
            alert("Request Successful")
        } else {
            alert("Request Fail")
        }

    }

    async function ProfileDetails() {

        let res = await axios.get("/ReadProfile");
        if (res.data['data'] !== null) {

            document.getElementById('cus_name').value = res.data['data']['name']
            document.getElementById('cus_add').value = res.data['data']['cus_add']
            document.getElementById('cus_city').value = res.data['data']['cus_city']
            document.getElementById('cus_state').value = res.data['data']['cus_state']
            document.getElementById('cus_postcode').value = res.data['data']['cus_postcode']
            document.getElementById('cus_phone').value = res.data['data']['cus_phone']
            document.getElementById('cus_country').value = res.data['data']['cus_country']
            document.getElementById('cus_fax').value = res.data['data']['cus_fax']
            document.getElementById('ship_name').value = res.data['data']['ship_name']
            document.getElementById('ship_add').value = res.data['data']['ship_add']
            document.getElementById('ship_city').value = res.data['data']['ship_city']
            document.getElementById('ship_state').value = res.data['data']['ship_state']
            document.getElementById('ship_postcode').value = res.data['data']['ship_postcode']
            document.getElementById('ship_country').value = res.data['data']['ship_country']
            document.getElementById('ship_phone').value = res.data['data']['ship_phone']


        }


    }
</script> --}}
