<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>

<div>
  <table id="user_credit" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th class="th-sty">#</th>
        <th class="th-sty">Date</th>
        <th class="th-sty" style="width: 40%">Remarks</th>
        <th class="th-sty">Amount (₹)</th>
      </tr>
    </thead>
    <tbody>

      @php
      $count = 0;
      @endphp
      @foreach($credit_data as $data)
      @php
      $count++;
      
      if($data->mode == 'credit') {
      @endphp
      
        <tr>
          <td>{{ $count }}</td>
          <td>{{ $data->updated_at }}</td>
          <td>{{ $data->remarks }}</td>
          <td>{{ $data->final_amount }}</td> <!-- Credit value -->
        </tr>
      @php
      }
      @endphp
      @endforeach
      
      <tr>
        <td class="font-weight-bold" style="text-align-last: center" colspan="3">Total:</td>
        @php
        $total = 0;
        foreach($credit_data as $data)
        if($data->mode == 'credit') {
          $total = $total + (float)$data->final_amount;
        }
        @endphp
        <td>{{ $total }}</td>
      </tr>
    </tbody>
  </table>
</div>

<script>
  $(document).ready(function() {
    $('#user_credit').DataTable();
  });
</script>
