@include('header')

<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="/js/jquery.table-filterable.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>

<link rel="stylesheet" href="/css/account_list.css">

<body>
  <div class="alert alert-success" style="display:none">
    {{ Session::get('success') }}
  </div>

  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-lg-12">
        <button class="btn btn-danger float-right ml-3" data-toggle="modal" data-target="#NewAccountModal">+ Add New Account</button>
        <button class="btn btn-success float-right">My Stock</button>
      </div>
    </div>
    <h3>Accounts List</h3>
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
      <div class="form-group col-md-2 float-right">
        <select class="form-control" required="true" id="is_active_account">
          <option value='none'>--Select Active ACs--</option>
          <option value='active'>Active ACs</option>
          <option value='non_active'>Non Active ACs</option>
        </select>
      </div>
    </div>

    <table id="account_list" class="table table-striped table-bordered" style="width:100%">
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

        if (count($user_data) != 0) {

          @endphp
          @foreach($user_data as $data)
          @php
            $count++;
          @endphp
          <tr>
            <td>{{ $count }}</td>
            <td id="account{{$data->user_id}}">
              <button id="{{$data->user_id}}" data={{ $data }} class="btn btn-secondary" data-toggle="modal" data-target="#AccountModal" onclick='Userdetails(this.id, "<?php echo $data->name; ?>", "<?php echo $data->role_name; ?>", "<?php echo $data->email; ?>", 
              "<?php echo $data->mobile_number; ?>", "<?php echo $data->gst_number; ?>", "<?php echo $data->pan_number; ?>", 
              "<?php echo $data->city; ?>", "<?php echo $data->pincode; ?>", "<?php echo $data->address; ?>")'>{{ $data->user_id}}</button>
            </td>
            <td>
              <button id='{{$data->user_id}}' data={{ $data }} class="btn btn-danger" data-toggle="modal" data-target="#TransferStockModal" onclick='UserTransferDetail(this.id,
              "<?php echo $data->name; ?>", "<?php echo $data->mobile_number; ?>", "stock")'>Trans Stock</button>
            </td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->role_name }}</td>
            <td>{{ $data->mobile_number }}</td>
            <td>{{ $stock_sum[$data->user_id] }}</td> <!-- Stock value -->
            <td id='{{$data->user_id}}' data-toggle="modal" data-target="#CreditModal" id="{{ $data->user_id }}" onclick='UserCreditDetail(this.id,
              "<?php echo $data->name; ?>", "<?php echo $data->mobile_number; ?>", "<?php echo $credit_sum[$data->user_id]; ?>", "credit")'>
              <a href="#" onclick="return false;">{{ $credit_sum[$data->user_id] }}</td> <!-- Credit value -->
            <td>
              <button class="btn btn-danger">₹ Set Referral</button>
            </td>
            <td>-----</td> <!-- D icon -->
            <td>-----</td> <!-- Lock icon -->
            <td>
            @php
              if ($data->isEnabled == 1) {
                $checked = 'checked';
                $check_value = '1';
              }
              else {
                $checked = '';
                $check_value = '0';
              }
            @endphp
              <input id='{{ $data->user_id }}' class='user_status' check='{{ $check_value }}' type="checkbox" onchange='UpdateStatus(this.id, "<?php echo $check_value; ?>")' {{ $checked }}/>
            </td>
          </tr>
          @endforeach
        @php
        }
        @endphp
      </tbody>
    </table>


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

    <!-- Update Account Modal -->

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


     <!-- Transfer Stock Modal -->

     <div class="modal fade" id="TransferStockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog trans_size_modal" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">TRANSFER STOCK</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body stock" id="modal-transfer-stock">
            <div class="form-row">
              <div class="col-md-10 d-flex">
                <div class='d-flex'>
                  <label for="AccountName" class="text-success">Name:&nbsp;&nbsp;</label>
                  <label for="AccountName" class="font-weight-bold text-success" id='transfer_to_name'></label> <!-- account name -->
                </div>
                <div class='d-flex'>
                  <label for="Account" class="text-success">&nbsp;&nbsp;&nbsp;Account No:&nbsp;&nbsp;</label>
                  <label for="AccountValue" class="font-weight-bold text-success" id='transfer_account_no'></label> <!-- account value -->
                </div>
                <div class='d-flex'>
                  <label for="mobile" class="text-success">&nbsp;&nbsp;&nbsp;Mobile No:&nbsp;&nbsp;</label>
                  <label for="mobile_value" class="font-weight-bold text-success" id='transfer_mobile_no'></label>  <!-- mobile no -->
                </div>
              </div>
              <div class="form-group col-md-10 d-flex">
                <div class='d-flex'>
                  <label for="balance" class="text-warning">Current Balance:&nbsp;&nbsp;</label>
                  @php
                    if(!empty($auth_balance)) {
                      $balance = $auth_balance[0]['balance'];
                    }
                    else {
                      $balance = '0';
                    }
                  @endphp
                    <label for="balance" class="font-weight-bold text-warning" id='remaining_bal'>₹ {{ $balance }}</label> <!-- current balance -->
                </div>
              </div>
            </div>
            <form>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="Amount">Amount</label>
                  <input type="number" class="form-control" min='0' id="amount_calc" oninput="AmountCalculation()" placeholder="Amount">
                </div>
                <div class="form-group col-md-2 ml-2">
                  <label for="percent">Percentage</label>
                  <input type="number" class="form-control" min='0' id="percent_calc" oninput="AmountCalculation()" placeholder="%">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="FinalAmount">Final Amount</label>
                  <input type="number" class="form-control" min='0' id="final_amount" step="0.01" value="0.00" disabled>
                </div>
                <div class="form-group col-md-3 ml-2">
                  <label for="Mode_type">Mode</label>
                  <select class="form-control" required="true" id="mode_type">
                    <option value='payment'>On Payment</option>
                    <option value='credit'>On Credit</option>
                  </select>
                </div>
                <div class="form-group col-md-5 ml-2">
                  <label for="Remarks">Remarks</label>
                  <input type="text" class="form-control" id="remarks" placeholder="Remarks">
                </div>
                <div class="form-group col-md-1 ml-2 mt-2 transfer">
                  <label for="tansfer_button"></label>
                  @php
                    if(!empty($auth_balance)) {
                      $user = $auth_balance[0]['user_id'];
                    }
                    else {
                      $user = '';
                    }
                  @endphp
                  <button class="btn btn-danger form-control" id="transfer_stock" onclick='TransferStock("<?php echo $user ?>", "<?php echo $balance ?>")'>Transfer Stock</button>
                </div>
              </div>
              <div id="parent_stock_table">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

     <!-- Transfer Credit Modal -->

     <div class="modal fade" id="CreditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog trans_size_modal" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">RECEIVE CREDIT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body stock" id="modal-transfer-stock">
            <div class="form-row">
              <div class="col-md-10 d-flex">
                <div class='d-flex'>
                  <label for="AccountName" class="text-success">Name:&nbsp;&nbsp;</label>
                  <label for="AccountName" class="font-weight-bold text-success" id='credit_to_name'></label> <!-- account name -->
                </div>
                <div class='d-flex'>
                  <label for="Account" class="text-success">&nbsp;&nbsp;&nbsp;Account No:&nbsp;&nbsp;</label>
                  <label for="AccountValue" class="font-weight-bold text-success" id='credit_account_no'></label> <!-- account value -->
                </div>
                <div class='d-flex'>
                  <label for="mobile" class="text-success">&nbsp;&nbsp;&nbsp;Mobile No:&nbsp;&nbsp;</label>
                  <label for="mobile_value" class="font-weight-bold text-success" id='credit_mobile_no'></label>  <!-- mobile no -->
                </div>
              </div>
              <div class="form-group col-md-10 d-flex">
                <div class='d-flex'>
                  <label for="balance" class="text-danger">Current Credit:&nbsp;&nbsp;</label>
                    <label for="balance" class="font-weight-bold text-danger" id='current_credit'></label> <!-- current credit -->
                </div>
              </div>
            </div>
            <form>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="Amount">Amount</label>
                  <input type="number" class="form-control" min='0' id="credit_amount" step="0.01" placeholder="0.00">
                </div>
                <div class="form-group col-md-6 ml-2">
                  <label for="Remarks">Remarks</label>
                  <input type="text" class="form-control" id="credit_remarks" placeholder="Remarks">
                </div>
                <div class="form-group col-md-2 ml-2 mt-2">
                  <label for="receive_button"></label>
                  @php
                    if(!empty($auth_balance)) {
                      $user = $auth_balance[0]['user_id'];
                    }
                    else {
                      $user = '';
                    }
                  @endphp
                  <button class="btn btn-danger form-control" id="receive_credit" onclick='ReceiveCredit("<?php echo $user; ?>")'>Receive Credit</button>
                </div>
              </div>
              <div id="parent_credit_table">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {

        $('#account_list').tableFilterable({
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
            },
            {
              filterSelector: '#is_active_account',
              event: 'change',
              filterCallback: function($tr, filterValue) {
                var first = 0;
                if (filterValue == 'active') {
                  return $tr.children().last().find('input').is(':checked') == true;
                }
                else if (filterValue == 'non_active') {
                  return $tr.children().last().find('input').is(':checked') == false;
                }
                return true;
              },
              delay: 100
            }
          ]
        });
        $('#account_list').DataTable();
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
            window.location = "AccountList";
            $(".alert-success").css("display", "block");
            $(".alert-success").append("<p>Created Successfully<p>");
          }
        });
      }

      function Reset() {
        document.getElementById('account_type').value = 'none';
        document.getElementById('account_name').value = '';
        document.getElementById('mobile_no').value = '';
        document.getElementById('email_id').value = '';
        document.getElementById('gst_no').value = '';
        document.getElementById('pan_no').value = '';
        document.getElementById('city').value = '';
        document.getElementById('pincode').value = '';
        document.getElementById('address').value = '';
      }

      function UpdateStatus(user_id, check) {
        window.location = 'AccountList/Status/' + user_id + '/' + check;
      }

      function AmountCalculation() {
        var amount = document.getElementById('amount_calc');
        var percent = document.getElementById('percent_calc').value;
        var final_amount = document.getElementById('final_amount');
        var percent_value = percent;
        if(percent == '') {
          percent_value = 0;
        }
        if(amount.value.length > 0) {
          final_amount.value = Number(amount.value) + Number((amount.value * (percent_value/100)).toFixed(2));
        }
        else {
          final_amount.value = '0.00';
        }
      }

      function Userdetails(id, name, role_name, email, mob, gst, pan, city, pincode, address) {
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

      function UserTransferDetail(id, name, mob, mode) {
        document.getElementById('transfer_account_no').innerHTML = id;
        document.getElementById('transfer_to_name').innerHTML = name;
        document.getElementById('transfer_mobile_no').innerHTML = mob;

        $.ajax({
            url : '{{ route("stock_getdata") }}',
            type: 'POST',
            data:{
              "_token": "{{ csrf_token() }}",
              'to_id': id,
              'mode_name': mode,
            },
            success:function(data){
              document.getElementById('parent_stock_table').innerHTML= data;
            },
          });

      }

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

      function TransferStock(from_id, current_bal) {
        var to_id = document.getElementById('transfer_account_no').innerHTML;
        var amount = document.getElementById('amount_calc').value;
        var percent = document.getElementById('percent_calc').value;
        var final_amount = document.getElementById('final_amount').value;
        var remarks = document.getElementById('remarks').value;
        var mode_type = document.getElementById('mode_type').value;
        if (current_bal == '') {
          current_bal = 0;
        }
        var remaining_balance = parseFloat(current_bal).toFixed(2) - parseFloat(final_amount).toFixed(2);

        if (from_id && to_id && amount && percent && final_amount && remarks && mode_type) {
        
        $.ajax({
          type: 'POST',
          url: '/TransferStock/data',
          data: {
            "_token": "{{ csrf_token() }}",
            'from_id': from_id,
            'to_id': to_id,
            'amount': amount,
            'percent': percent,
            'final_amount': final_amount,
            'remarks': remarks,
            'mode_type': mode_type,
            'remaining_balance': parseFloat(remaining_balance).toFixed(2),
          },

          success: function(data) {
            window.location = "AccountList";
            $(".alert-success").css("display", "block");
            $(".alert-success").append("<p>Updated Successfully<p>");
          }
        });
        }
        else {
          alert('All fields required');
        }
      }


      function ReceiveCredit(from_id) {
        var to_id = document.getElementById('credit_account_no').innerHTML;
        var credit_amount = document.getElementById('credit_amount').value;
        var remarks = document.getElementById('credit_remarks').value;
       if (from_id && to_id && remarks) {
        
        $.ajax({
          type: 'POST',
          url: 'ReceiveCredit/data',
          data: {
            "_token": "{{ csrf_token() }}",
            'from_id': from_id,
            'to_id': to_id,
            'credit_amount': credit_amount,
            'remarks': remarks,
          },

          success: function(data) {
            window.location = "AccountList";
            $(".alert-success").css("display", "block");
            $(".alert-success").append("<p>Updated Successfully<p>");
          }
        });
       }
       else {
          alert('All fields required');
       }
      }
    </script>
</body>
