<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>

<div>
  <table id="user_account" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th class="th-sty">#</th>
        <th class="th-sty">Date</th>
        <th class="th-sty">Account No.</th>
        <th class="th-sty" style="width: 35%">Remarks</th>
        <th class="th-sty">Mode</th>
        <th class="th-sty">Stock (₹)</th>
      </tr>
    </thead>
    <tbody>

      @php
      $count = 0;
      @endphp
      @foreach($stock_data as $data)
      @php
      $count++;
      @endphp
      <tr>
        <td>{{ $count }}</td>
        <td>{{ $data->updated_at }}</td>
        <td>{{ $data->from_account_id }}</td> <!-- Admin Account id -->
        <td>{{ $data->remarks }}</td>
        @php
        if($data->mode == 'payment') {
        echo "<td>On Payment</td>";
        }
        else {
        echo "<td>On Credit</td>";
        }
        @endphp
        <td>{{ $data->final_amount }}</td> <!-- Stock value -->
      </tr>
      @endforeach
      <tr>
        <td class="font-weight-bold" style="text-align-last: center" colspan="5">Total:</td>
        @php
        $total = 0;
        foreach($stock_data as $data)
        $total = $total + (float)$data->final_amount;
        @endphp
        <td>{{ $total }}</td>
      </tr>
    </tbody>
  </table>
</div>

<script>
  $(document).ready(function() {
    $('#user_account').DataTable();
  });
</script>