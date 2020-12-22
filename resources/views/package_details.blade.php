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
    <div class="form-group mt-4">
      <h3>Package Details</h3>
      <input type="hidden" value="{{ $package_id }}" id="package_id">
    </div>
    <table id="package_details" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="th-sty">#</th>
          <th class=th-sty>Category</th>
          <th class=th-sty style="width: 25%;">Operator</th>
          <th class="th-sty">Max %</th>
          <th class="th-sty">Ded. %</th>
          <th class="th-sty">Ref. %</th>
          <th class="th-sty"></th>
        </tr>
      </thead>
      <tbody>
        @php
        $count = 0;
        @endphp
        @foreach($data as $i)
        @php
        $count++;
        @endphp

        <tr>
          <td>{{ $count }}</td>
          <input type="hidden" value="{{$i->operator_id}}" id="operator_id{{$count}}">
          <input type="hidden" value="{{$i->category_id}}" id="category_id{{$count}}">
          <td>{{ $i->name}}</td>
          <td>{{ $i->operator}}</td>
          <td>{{ $i->max }}.0000</td>
          <td>
            <input type="number" onchange="setTwoNumberDecimal(this)" name="sample_url" class="form-control" step="0.01" id="ded{{$count}}" value="{{ $i->ded }}">
          </td>
          <td>
            <input type="number" onchange="setTwoNumberDecimal(this)" name="sample_url" class="form-control" step="0.01" id="ref{{$count}}" value="{{ $i->ref }}">
          </td>
          <td><button class="btn btn-danger" onClick="UpdateClick(this.id)" id="{{$count}}">Update</button></td>
        </tr>
        @endforeach
        @for($j=0;$j<count($remaining_operator);$j++) <tr>
          <td>{{$count + 1}}</td>
          <input type="hidden" value="{{$remaining_operator[$j]->operator_id}}" id="operator_id{{$count + 1}}">
          <input type="hidden" value="{{$remaining_operator[$j]->category_id}}" id="category_id{{$count + 1}}">
          <td>{{$remaining_operator[$j]->name }}</td>
          <td>{{$remaining_operator[$j]->operator }}</td>
          <td>25.0000</td>
          <td><input onchange="setTwoNumberDecimal(this)" class="form-control form-control-sm text-info" type="number" step="0.01" value="0.00" id="ded{{$count + 1}}"></td>
          <td><input onchange="setTwoNumberDecimal(this)" class="form-control form-control-sm text-info" type="number" step="0.01" value="0.00" id="ref{{$count + 1}}"></td>
          <td><button class="btn btn-danger" onClick="UpdateClick(this.id)" id="{{$count + 1}}">Update</button></td>
          @php
          $count = $count + 1;
          @endphp
          </tr>
          @endfor
      </tbody>

    </table>

    <script>
      $(document).ready(function() {
        $('#package_details').DataTable();
      });

      function setTwoNumberDecimal(event) {
        event.value = parseFloat(event.value).toFixed(2);
      }

      function UpdateClick(id) {
        var operator_id = document.getElementById("operator_id" + id).value;
        var deduction = document.getElementById("ded" + id).value;
        var referral = document.getElementById("ref" + id).value;
        var package_id = document.getElementById("package_id").value;

        if (deduction == 0 && referral != 0) {
          window.location = '/PackageDetails/Update/' + package_id + '/' + operator_id + '/' + deduction + '/' + referral;
        } 
        else if (deduction != 0 && referral == 0) {
          window.location = '/PackageDetails/Update/' + package_id + '/' + operator_id + '/' + deduction + '/' + referral;
        }
        else if (deduction != 0 && referral != 0) {
          window.location = '/PackageDetails/Update/' + package_id + '/' + operator_id + '/' + deduction + '/' + referral;
        }
        else {
          alert('Atleast one field contains some value');
        }
      }
    </script>

  </div>
</body>