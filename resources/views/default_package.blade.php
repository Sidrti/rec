@include('header')

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
    <div class="row py-3">
      <div class="col-lg-12">
        <h3 class="float-left ">Assigned Default Package</h2>
          <button class="btn btn-danger float-right" data-toggle="modal" data-target="#DefaultModal">+ Set Default Package</button>
      </div>
    </div>
    
    <table id="default_packagetable" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="text-black">#</th>
          <th class="text-black">Set For</th>
          <th class="text-black">Assigned Package</th>
        </tr>
      </thead>
      <tbody>
        @php
        $count = 0;
        if (count($package_data) != 0) {
        @endphp

          @foreach($package_data as $data)
          @php
          $count++;
          @endphp
          <tr>
            <td>{{ $count }}</td>
            <td id="role{{ $data->role_id }}">{{ $data->role_name }}</td>
            <td id="package_title{{ $data->id }}">{{ $data->package_title }}</td>
          </tr>
          @endforeach
        @php
        }
        @endphp
      </tbody>
    </table>

    <div class="form-group">
      <button type="button" class="btn btn-secondary print" id="print" onclick="return window.print();">Print</button>
    </div>

    <!-- Add Package -->

    <div class="modal fade" id="DefaultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">SET DEFAULT PACKAGE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form">
            <div class="form-group">
                <label for="account_type">Select Account Type</label>
                <select class="form-control" required id="account_type">
                  <option value='0'>--Select Account Type--</option>
                  @for($i=0;$i<count($roles);$i++) 
                    <option value="{{ $roles[$i]['id'] }}">{{ $roles[$i]['role_name'] }}</option>
                  @endfor
                </select>
              </div>
              <div class="form-group">
                <label for="assign_package">Assign Package</label>
                <select class="form-control" required id="assign_package">
                  <option value='0'>--Assign Package--</option>
                  @for($i=0;$i<count($package_master);$i++)
                    <option value="{{ $package_master[$i]['id'] }}">{{ $package_master[$i]['package_title'] }}</option>
                  @endfor
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id='assign_package' onclick='Assign_Package()' class="btn btn-danger">Assign Package</button>
          </div>
        </div>
      </div>
    </div>


    <script>
      $(document).ready(function() {
        $('#default_packagetable').DataTable();
      });

      function Assign_Package() {
        var account_type = document.getElementById('account_type').value;
        var assign_package = document.getElementById('assign_package').value;

        if (account_type != '0' && assign_package != '0') {
          window.location = 'DefaultPackage/Add/' + account_type + '/' + assign_package;
        }
        else {
          alert('All fields are required');
        }
      }
    </script>
</body>
