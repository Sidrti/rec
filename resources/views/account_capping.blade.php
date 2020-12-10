@include('header')

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>

<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="/js/jquery.table-filterable.js"></script>

<link rel="stylesheet" href="/css/account_list.css">

<body>
  <div class="alert alert-success" style="display:none">
    {{ Session::get('success') }}
  </div>

  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-lg-12">
        <button class="btn btn-danger float-right ml-3" data-toggle="modal" data-target="#NewModal">+ Add New Account</button>
      </div>
    </div>
    <h3>Accounts Capping</h3>
    <div class="form-row">
      <div class="form-group col-md-2">
        <input type="number" class="form-control" min='0' id="account-no" placeholder="Account No.">
      </div>
      <div class="form-group col-md-2">
        <input type="text" class="form-control" min='0' id="customer-name" placeholder="Name">
      </div>
      <div class="form-group col-md-2">
        <input type="number" class="form-control" min='0' id="mobile-no" placeholder="Mobile No.">
      </div>
    </div>
    <table id="account_capping" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="th-sty">#</th>
          <th class="th-sty">ID</th>
          <th class=th-sty>Capping</th>
          <th class="th-sty" style="width: 25%">Customer Name</th>
          <th class="th-sty">Type</th>
          <th class="th-sty">Mobile No.</th>
          <th class="th-sty">Stock</th>
          <th class="th-sty">CAPPING</th>
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
            <button id="{{$data->user_id}}" class="btn btn-secondary">{{ $data->user_id}}</button>
          </td>
          <td>
            @php
              if ($capped_value[$data->user_id] == 1) {
                echo '<button class="btn btn-success">Capping</button>';
              }
              else {
                echo '--';
              }
            @endphp
          </td>
          <td>{{ $data->name }}</td>
          <td>{{ $data->role_name }}</td>
          <td>{{ $data->mobile_number }}</td>
          <td class="font-weight-bold" style="color: teal;">{{ $stock_sum[$data->user_id] }}</td> <!-- Stock value -->
          <td id="state_capping">
          @php
            if ($capped_value[$data->user_id] == 1) {
              $checked = 'checked';
              $state = 'Click to Disable';
              $color = 'danger';
            }
            else {
              $checked = '';
              $state = 'Click to Enable';
              $color = 'success checkbox_button_style';
            }
          @endphp
            <div >
              <input id='{{ $data->user_id }}' class='capped_status' type="checkbox"  {{ $checked }}/>
              <button id="checkbox_button" user_id='{{ $data->user_id }}' class="btn btn-{{ $color }}">{{ $state }}</button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>


    <!-- Capping Modal -->

    <div class="modal fade" id="CappingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <label for="Account">Account No:&nbsp;&nbsp;</label>
                  <label for="AccountValue" class="font-weight-bold" id='account_value'></label> <!-- account value -->
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
            <button id='create_package' onclick='UpdateAccount()' class="btn btn-danger">Update Account</button>
          </div>
        </div>
      </div>
    </div>

    <script>

      $(document).ready(function() {
        $('#account_capping').tableFilterable({
          filters: [
            {
              filterSelector: '#customer-name',
              event: 'keyup',
              filterCallback: function($tr, filterValue) {
                  return  $tr.children().eq(3).text().toLowerCase().indexOf(filterValue) != -1;
              },
              delay: 100
            },
            {
              filterSelector: '#account-no',
              event: 'keyup',
              filterCallback: function($tr, filterValue) {
                  return  $tr.children().eq(1).text().toLowerCase().indexOf(filterValue) != -1;
              },
              delay: 100
            },
            {
              filterSelector: '#mobile-no',
              event: 'keyup',
              filterCallback: function($tr, filterValue) {
                  return  $tr.children().eq(5).text().toLowerCase().indexOf(filterValue) != -1;
              },
              delay: 100
            }
          ]
        });

        $('#account_capping tbody tr #state_capping').click(function () {
          var status = 0;
          var user_id = $(this).find('input').attr('id');
          if ($(this).find('input').prop('checked')) {
           //TRUE->FALSE
           status = 0;
          }
          else {
            status = 1;
          }
          window.location = 'AccountCapped/Status/' + user_id + '/' + status;
        });
        $('#account_capping').DataTable();
      });

      function UserCreditDetail(id, name, mob, credit_sum, mode) {
        document.getElementById('credit_account_no').innerHTML = id;
        document.getElementById('credit_to_name').innerHTML = name;
        document.getElementById('credit_mobile_no').innerHTML = mob;
        document.getElementById('current_credit').innerHTML = '₹ ' + parseFloat(credit_sum).toFixed(2);

        $.ajax({
            url : '{{ route("credit_getdata") }}',
            type: 'POST',
            data:{
              "_token": "{{ csrf_token() }}",
              'to_id': id,
              'mode_name': mode,
            },
            success:function(data){
              document.getElementById('parent_credit_table').innerHTML= data;
            },
          });

      }

      function SetCapping_Update() {

        var user_id = document.getElementById('account_value').innerHTML;
        var acc_name = document.getElementById('account_name').value;
        var mob_no = document.getElementById('mobile_no').value;
        var email = document.getElementById('email_id').value;
        var gst = document.getElementById('gst_no').value;
        var pan = document.getElementById('pan_no').value;
        var city = document.getElementById('city').value;
        var pincode = document.getElementById('pincode').value;
        var address = document.getElementById('address').value;

        if (user_id && acc_name && mob_no && email && gst && pan && city && pincode && address) {
          
          $.ajax({
            type: 'POST',
            url: '/AccountUpdate/data',
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

            success: function(data) {
              window.location = "AccountList";
              $(".alert-success").css("display", "block");
              $(".alert-success").append("<p>Updated Successfully<p>");
            }
          });
        }
      }
    </script>
</body>
