@include('header')

<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="/js/jquery.table-filterable.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>

<link rel="stylesheet" href="/css/account_list.css">

<body>
    @if ( Session::has('flash_message') )
      <div class="alert {{ Session::get('flash_type') }}">
          <strong>{{ Session::get('flash_message') }}</strong>
      </div>
    @endif

  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-lg-12">
        <button class="btn btn-danger float-right ml-3" data-toggle="modal" data-target="#NewAccountModal">+ Add New Account</button>
      </div>
    </div>
    <h3>Accounts Capping</h3>
    <div class="form-row">
      <div class="form-group col-md-2">
        <select class="form-control" required="true" id="registered">
          <option value='none'>--Select Registered by--</option>
          <option value='by_me'>Registered by Me</option>
        </select>
      </div>
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
        if (count($user_data) != 0) {

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
                  echo "<button class='btn btn-success capped_button' capping_id='{$capped_id[$data->user_id]}' data-toggle='modal' data-target='#CappingModal' user_id='{$data->user_id}' name='{$data->name}' stock='{$stock_sum[$data->user_id]}'>Capping</button>";
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
        @php
        }
        @endphp
      </tbody>
    </table>


    <!-- Capping Modal -->

    <div class="modal fade" id="CappingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog capping_size_modal" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">SET CAPPING</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-row">
              <div class="col-md-10 d-flex">
                <div class='d-flex'>
                  <label for="AccountName" class="text-success">Name:&nbsp;&nbsp;</label>
                  <label for="AccountName" capping_id="" class="font-weight-bold text-success" id='capping_name'></label> <!-- account name -->
                </div>
                <div class='d-flex'>
                  <label for="Account" class="text-success">&nbsp;&nbsp;&nbsp;Account No:&nbsp;&nbsp;</label>
                  <label for="AccountValue" class="font-weight-bold text-success" id='capping_account_no'></label> <!-- account value -->
                </div>
              </div>
              <div class="form-group col-md-10 d-flex">
                <div class='d-flex'>
                  <label for="balance" class="text-danger">Current Balance:&nbsp;&nbsp;</label>
                    <label for="balance" class="font-weight-bold text-danger" id='current_balance_capping'></label> <!-- current balance -->
                </div>
              </div>
            </div>
            <div id="parent_capping_table">
              <table id="capping_modal_table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th class="th-sty">#</th>
                    <th class="th-sty">Operator Group</th>
                    <th class=th-sty>Current Capping</th>
                    <th class="th-sty">+/- Capping</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $count = 0;
                    if ($operator_data == '') {
                      exit();
                    }
                  @endphp
                  @foreach($operator_data as $data)
                  @php
                    $count++;
                  @endphp
                  <tr>
                    <td>{{ $count }}</td>
                    <td class="operator_id" id="{{$data->id}}">{{ $data->operator }}</td>
                    <td>0.0000</td>
                    <td>
                      <input id="value_capping" id='{{ $data->id }}' type="number" />
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id='update_capping' class="btn btn-danger">Update capping</button>
          </div>
        </div>
      </div>
    </div>

 <!-- New Account Modal -->

 <div class="modal fade" id="NewAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog size_modal" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">CREATE NEW ACCOUNT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="account_label">Account Type</label>
                <select class="form-control" required id="account_type2">
                  <option value='none'>--Select User Type--</option>
                  @for($i=0;$i<count($role_id);$i++) <option value={{$role_id[$i]['id']}}>{{$role_id[$i]['role_name']}}</option>
                    @endfor
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="account_name2" placeholder="Account Name" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="mobile_no2" placeholder="Mobile Number" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email_id2" placeholder="Email" required>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="number" class="form-control" min='0' id="gst_no2" placeholder="GST No.">
                </div>
                <div class="form-group col-md-6">
                  <input type="number" class="form-control" min='0' id="pan_no2" placeholder="PAN No.">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="address2" placeholder="Address Line" required>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="city2" placeholder="City" required>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="pincode2" placeholder="PinCode" required>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button id='create_account' onclick='CreateAccount()' class="btn btn-danger">Create Account</button>
            <button class="btn btn-secondary" onclick="Reset()">Reset</button>
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

        $('#update_capping').click(function () {

          var operator_ids = [];
          var capping_values = [];
          var capping_id = $('#capping_name').attr('capping_id');

          $('#capping_modal_table > tbody  > tr').each(function() {

            var id = $(this).find('.operator_id').attr('id');
            var capping_value = $(this).find('#value_capping').val();
            
            if(capping_value.trim() == '') {
              capping_value = 0;
              capping_values.push(capping_value);
            }

            if (id) {
              operator_ids.push(id);
            }

            if (capping_value) {
              capping_values.push(capping_value);
            }
          });
          window.location = 'CappingUpdateRecords/' + operator_ids + '/' + capping_values + '/' + capping_id;
          });

          $('.capped_button').click(function () {

            var capping_user_id = $(this).attr('user_id');
            $('#capping_name').html($(this).attr('name'));
            $('#capping_name').attr('capping_id', $(this).attr('capping_id'));
            $('#capping_account_no').html(capping_user_id);
            $('#current_balance_capping').html('₹ ' + $(this).attr('stock'));


            var current_capping =  $.parseJSON('<?php echo json_encode($capping_operator_id); ?>');
            var dataTable = $('#capping_modal_table');
            var arr = [];

            for(key in current_capping[capping_user_id]) {
              arr.push(key);
            }

            var len = arr.length;
            console.log(current_capping[capping_user_id]);

            for(var i = 1 ; i <= len ; i++){
              if(current_capping[capping_user_id][arr[i-1]]){
                dataTable[0].rows[i].cells[2].innerHTML = parseFloat(current_capping[capping_user_id][arr[i-1]]).toFixed(2);
              }
              else {
                dataTable[0].rows[i].cells[2].innerHTML = '0.00';
              }
            }

          });
        $('#account_capping').DataTable();
      });

      function CreateAccount() {

        var role_id = document.getElementById('account_type2').value;
        var acc_name = document.getElementById('account_name2').value;
        var mob_no = document.getElementById('mobile_no2').value;
        var email = document.getElementById('email_id2').value;
        var gst = document.getElementById('gst_no2').value;
        var pan = document.getElementById('pan_no2').value;
        var city = document.getElementById('city2').value;
        var pincode = document.getElementById('pincode2').value;
        var address = document.getElementById('address2').value;

        $.ajax({
          type: 'POST',
          url: 'AccountCreate/data',
          data: {
            "_token": "{{ csrf_token() }}",
            'role_id': role_id,
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
            window.location = "AccountCapping";
            $(".alert-success").css("display", "block");
            $(".alert-success").append("<p>Created Successfully<p>");
          }
        });
        }

        function Reset() {

          document.getElementById('account_type2').value = 'none';
          document.getElementById('account_name2').value = '';
          document.getElementById('mobile_no2').value = '';
          document.getElementById('email_id2').value = '';
          document.getElementById('gst_no2').value = '';
          document.getElementById('pan_no2').value = '';
          document.getElementById('city2').value = '';
          document.getElementById('pincode2').value = '';
          document.getElementById('address2').value = '';
        }

    </script>
</body>
