@include('header')

<script src ="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src ="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>
<link rel="stylesheet" href="/css/account_list.css">

<body>
<div class="alert alert-success" style="display:none">
    {{ Session::get('success') }}
</div>

<div class="container-fluid">
<div class="row mt-3">
    <div class="col-lg-12">
        <button class="btn btn-danger float-right ml-3" data-toggle="modal" data-target="#exampleModal">+ Add New Account</button>
        <button class="btn btn-success float-right">My Stock</button>
    </div>
</div>
        <h3>Accounts List</h3>
  <table id="account_list" class="table table-striped table-bordered"  style="width:100%">
    <thead>
      <tr>
        <th class="th-sty">#</th>
        <th class="th-sty">ID</th>
        <th class=th-sty> </th>
        <th class="th-sty" style="width: 18%">Customer Name</th>
        <th class="th-sty">Type</th>
        <th class="th-sty">Mobile No.</th>
        <th class="th-sty">Stock</th>
        <th class="th-sty">Credit</th>
        <th class="th-sty">₹</th>
        <th class="th-sty"></th>
        <th class="th-sty"></th>
        <th class="th-sty"></th>
      </tr>
    </thead>
    <tbody>

    @php
    $count = 0;
  @endphp
    @foreach($user_data as $data)
    @php
    $count++;
  @endphp
      <tr>
        <td>{{ $count }}</td>
        <td id="account{{$data->user_id}}">
          <button id="{{$data->user_id}}" data={{ $data }} class="btn btn-secondary" data-toggle="modal" data-target="#AccountModal"
             onclick='Userdetails(this.id, "<?php echo $data->name;?>", "<?php echo $data->role_name;?>", "<?php echo $data->email;?>", 
             "<?php echo $data->mobile_number;?>", "<?php echo $data->gst_number;?>", "<?php echo $data->pan_number;?>", 
             "<?php echo $data->city;?>", "<?php echo $data->pincode;?>", "<?php echo $data->address;?>")'>{{ $data->user_id}}</button>
        </td>
        <td>
          <button class="btn btn-danger">Trans Stock</button>
        </td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->role_name }}</td>
        <td>{{ $data->mobile_number }}</td>
        <td>-------</td> <!-- Stock value -->
        <td>-----</td> <!-- Credit value -->
        <td>
          <button class="btn btn-danger">₹ Set Referral</button>
        </td>
        <td>-----</td> <!-- D icon -->
        <td>-----</td> <!-- Lock icon -->
        <td>
          <input id='{{ $data->user_id }}' class='user_status' type="checkbox" checked="true" onchange='UpdateStatus(this.id)'>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>


<!-- Add Package -->

<div class="modal fade" id="AccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog size_modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACCOUNT DETAILS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class='d-flex'>
              <label for="Account">Account No.:&nbsp;&nbsp;</label>
              <label for="AccountValue" id='account_value'></label> <!-- account value -->
            </div>
            <div class='d-flex'>
              <label for="usertype">User Type:&nbsp;&nbsp;</label>
              <label for="usertype_value" class="font-weight-bold" id='usertype_value'></label>
            </div>
          </div>
          <div class="form-group col-md-6">
            <div class='d-flex'>
              <label for="password">Current Password:&nbsp;&nbsp;</label>
              <label for="passwordValue"></label> <!-- password value -->
            </div>
            <div class='d-flex'>
              <a href='#' id="newpassword">Regenerate New Password</a>
            </div>
          </div>
        </div>
        <form>
          <div class="form-group">
            <input type="text" class="form-control" id="account_name" placeholder="Account Name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="mobile_no" placeholder="Mobile Number">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email_id" placeholder="Email">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="number" class="form-control" min='0' id="gst_no" placeholder="GST No.">
            </div>
            <div class="form-group col-md-6">
              <input type="number" class="form-control" min='0' id="pan_no" placeholder="PAN No.">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Address Line">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="city" placeholder="City">
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="pincode" placeholder="PinCode">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button username='{{ $data->user_id }}' id='create_package' onclick='UpdateAccount(this.id)' class="btn btn-danger">Update Account</button>
      </div>
    </div>
  </div>
</div>


<script>

    $(document).ready(function() {
        $('#account_list').DataTable();
    });

    function UpdateStatus(user_id)
    {
        window.location = 'AccountList/Status/'+user_id+'/' + '0';
    }

    function Userdetails (id, name, role_name, email, mob, gst, pan, city, pincode, address) {
      document.getElementById('account_value').innerHTML = id;
      document.getElementById('usertype_value').innerHTML = role_name;
      document.getElementById('account_name').value = name;
      document.getElementById('mobile_no').value = mob;
      document.getElementById('email_id').value = email;
      document.getElementById('gst_no').value = gst;
      document.getElementById('pan_no').value = pan;
      document.getElementById('city').value = city;
      document.getElementById('pincode').value = pincode;
      document.getElementById('address').value = address;
       
    }

    function UpdateAccount() {

      var user_id = document.getElementById('account_value').innerHTML;
      var acc_name = document.getElementById('account_name').value;
      var mob_no = document.getElementById('mobile_no').value;
      var email = document.getElementById('email_id').value;
      var gst = document.getElementById('gst_no').value;
      var pan = document.getElementById('pan_no').value;
      var city = document.getElementById('city').value;
      var pincode = document.getElementById('pincode').value;
      var address = document.getElementById('address').value;

      $.ajax({
          type:'POST',
          url:'/AccountUpdate/data',
          data: {
          "_token": "{{ csrf_token() }}",
            'user_id': user_id,
            'acc_name': acc_name,
            'mob_no': mob_no,
            'email': email,
            'gst': gst,
            'pan': pan,
            'city': city,
            'pincode': pincode,
            'address': address,
          },

          success:function(data) 
          {
            window.location = "AccountList";
            $(".alert-success").css("display", "block");
            $(".alert-success").append("<p>Updated Successfully<p>");
          }
      });
    }  
</script>
</body>
