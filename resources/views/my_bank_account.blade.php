@include('header')

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
        <button class="btn btn-danger float-right ml-3" data-toggle="modal" data-target="#AddBankModal">+ Add Bank</button>
      </div>
    </div>
    <h3>BANKS</h3>
    <table id="bank_list" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="th-sty">#</th>
          <th class="th-sty">Bank Name</th>
          <th class=th-sty>Account No.</th>
          <th class="th-sty">IFSC code</th>
          <th class="th-sty">Branch Name</th>
          <th class="th-sty"></th>
          <th class="th-sty"></th>
        </tr>
      </thead>
      <tbody>
      @php
          $count = 0;
        if (count($bank_data) != 0) {

        @endphp
          @foreach($bank_data as $data)
          @php
            $count++;
          @endphp
          <tr>
            <td>{{ $count }}</td>
            <td class="font-weight-bold">{{ $data->bank_name }}</td>
            <td class="font-weight-bold">{{ $data->account_no }}</td>
            <td>{{ $data->ifsc_code }}</td>
            <td>{{ $data->branch_name }}</td>
            <td></td>
            <td></td>
          </tr>
          @endforeach
        @php
        }
        @endphp
      </tbody>
    </table>


    <!-- New Account Modal -->

    <div class="modal fade" id="AddBankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog size_modal" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD BANK</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
              <label for="bankName">Bank Name</label>
                <input type="text" class="form-control" id="bank_name" placeholder="Bank Name" required>
              </div>
              <div class="form-group">
              <label for="AccountNo">Account No.</label>
                <input type="number" min="0"  maxlength="12" class="form-control" id="account_no" placeholder="Account No." required 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>
              <div class="form-group">
                <label for="ifscCode">IFSC code</label>
                <input type="text" maxlength="11" class="form-control" id="ifsc_code" placeholder="IFSC code" required>
              </div>
              <div class="form-row">
              <label for="branchName">Branch Name</label>
                <input type="text" class="form-control" id="branch_name" placeholder="Branch Name" required>
              </div>
            </form>
          </div>
          <div id="error_msg" class="form-row text-danger" style="display: none">**All fields are required</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id='create_account' onclick='CreateAccount()' class="btn btn-danger">Add Bank</button>
          </div>
        </div>
      </div>
    </div>


    <script>
      $(document).ready(function() {
        $('#bank_list').DataTable();
      });

      function CreateAccount() {

        var bank_name = document.getElementById('bank_name').value;
        var account_no = document.getElementById('account_no').value;
        var ifsc_code = document.getElementById('ifsc_code').value;
        var branch_name = document.getElementById('branch_name').value;

        if ( bank_name && account_no && ifsc_code && branch_name ) {
          window.location = 'AddBankAccount/' + bank_name + '/' + account_no + '/' + ifsc_code + '/' + branch_name;
        }
        else {
          document.getElementById('error_msg').setAttribute('style', 'display: block');
        }
      }
    </script>
</body>
