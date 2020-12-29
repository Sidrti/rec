@include('header')
@php $master_id = 0;
@endphp

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>
<link rel="stylesheet" href="/css/api_trail.css">

<body>
  @if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type') }}">
    <strong>{{ Session::get('flash_message') }}</strong>
  </div>
  @endif
  <div class="container-fluid">
    <h3 class="mt-3 mb-3">API Trail Listing</h3>
    <div class="row mt-3">
      <div class="col-md-7">
        <div class="row form-group" style="background-Position: 97% center;background-Repeat: no-repeat; cursor: pointer;" placeholder="SR1">
          <div class="col-5">
            <select class="form-control" id="select_op">
              <option value="0">--Select Operator--</option>
              @for($i=0;$i<count($fail_switch_master);$i++) <option value={{$fail_switch_master[$i]->OperatorId}}>{{$fail_switch_master[$i]->operator}}</option>
                @endfor
            </select>
          </div>
          <div class="col-3">
            <button type="button" class="btn btn-secondary button" onclick="OperatorClick()">Select Operator</button>
          </div>
        </div>
      </div>
      <div class="col-5">
        <button class="btn btn-primary float-right" style="border-radius:30px" onclick="ApiTrailClick()">Map New API</button>
      </div>

    </div>

    <table id="apitable" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="th-sty">#</th>
          <th class="th-sty">APIs</th>
          <th class=th-sty>Minutes</th>
          <th class="th-sty">Priority</th>
          <th class="th-sty"></th>
        </tr>
      </thead>
      <tbody class="dynamic_rows">
        @php
        $count = 0;
        @endphp
        @foreach($data as $i)
        @php

        $master_id = $i->fail_switch_master_id;

        $count++;
        @endphp

        <tr id='{{ $i->fail_switch_details_id }}'>
          <td id='{{ $i->fail_switch_details_id }}' class="row_id">{{ $count }}</td>
          <td class="api_id" id='a{{$i->id}}'>{{ $i->api_name }}</td>
          <td>
            <input type='number' class="form-control minutes" id='{{ $i->id }}' value='{{ $i->minutes }}'>
          </td>
          <td contenteditable="false">
            <input type='number' class="form-control priority" id='{{ $i->id }}' value='{{ $i->priority }}'>
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn btn-danger" count="{{ $count }}" id="{{ $i->fail_switch_details_id }}" onclick="DeleteClick(this.id, this.count)">
                Delete
              </button>
            </div>
          </td>
        </tr>
        @endforeach

      </tbody>

      <tbody class="append_row">
        <tr>
          @php
          if($count != 0)
          {
          @endphp
          <td></td>
          <td>
            <select id="api_name">
              @foreach($all_api_master as $i)
              <option value="{{ $i->id}}">{{ $i->api_name}}</option>
              @endforeach
            </select>
          </td>
          <td id="url{{$i->id}}">
            <input type="number" name="sample_url" class="form-control" id="minutes_input">
          </td>

          <td id="url{{$i->id}}">
            <input type="number" name="sample_url" class="form-control" id="priority_input">
          </td>

          <td>
            <div class="dropdown">
              <button type="button" class="btn btn-primary" id="{{ $i->id}}" onclick="addNewRow(api_name.value,
               api_name.options[api_name.selectedIndex].text, minutes_input.value, priority_input.value)">
                Add New Api
              </button>
            </div>
          </td>
          @php
          }
          @endphp
        </tr>
        <tr rowspan="5">
          <td colspan="5">
            <div>
              <button type="button" class="btn btn-primary" id="update_records">
                Update Record
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD NEW</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="AddApiSms" method="POST" id="form">
              @csrf

              <div class="form-group">
                <label for="api_name" class="col-form-label">Title:</label>
                <input type="text" name="title" class="form-control" id="title">

                <label class="col-form-label">SMS URL:</label>
                <label class="col-form-label"> http://test.com/web-services/httpapi/recharge-request?acc_no=ACC12501&api_key=1d4f8a72-83e8-4bfc-b869-f2e3da9bc5d8&opr_code={code}&rech_num={mobilenumber}&amount={amount}&client_key={client_key}</a></label>

                <input type="text" name="sample_url" class="form-control" id="sample_url">
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" onclick="form_submit_fn()" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
    @php
    if (!empty($data[0]->OperatorId)) {
    $operator_id = $data[0]->OperatorId;
    }
    else {
    $operator_id = 0;
    }
    @endphp
    <script>
      function ApiTrailClick() {
        window.location = "/ApiTrail";
      }

      function DeleteClick(id, count) {
        if (confirm('Are you sure you want to Delete this entry ?')) {
          DeleteClickMain(id, count);
        } else {
          console.log('Thing was not saved to the database.');
        }
      }

      $(document).ready(function() {
        $('#select_op').val('<?php echo $operator_id; ?>');

        if ($('#select_op').val() == 0) {
          $('#apitable tbody tr').remove();
        }

        $('#select_op').on('change', function() {
          var value = $('#select_op').val();
          if (value == 0) {
            $('#apitable tbody tr').remove();
          }
        });

        $('#update_records').click(function() {

          var row_id = [];
          var minutes_value = [];
          var priority_value = [];
          var api_id = [];

          var master_id = '<?php echo $master_id; ?>';
          var select = $("#select_op").val();

          $('#apitable > tbody  > tr').each(function() {

            if (!$(this).find('.minutes').attr('disabled')) {
              var id = $(this).find('.row_id').attr('id');
              var api_value = $(this).find('.api_id').attr('id');
              var minutesValue = $(this).find('.minutes').val();
              var priorityValue = $(this).find('.priority').val();

              if (id || minutesValue || priorityValue) {
                if (minutesValue == '') {
                  minutesValue = 0;
                }
                if (priorityValue == '') {
                  priorityValue = 0;
                }
                if (id == '') {
                  id = 0;
                }
                row_id.push(id);
                api_id.push(api_value);
                minutes_value.push(minutesValue);
                priority_value.push(priorityValue);
              }
            }
          });
          window.location = '/APIUpdateRecords/' + row_id + '/' + minutes_value + '/' + priority_value + '/' + api_id + '/' + master_id + '/' + select;
        });
        $('#apitable').DataTable();
      });

      function form_submit_fn() {
        document.getElementById("form").submit();
      }

      function EditClick(id) {
        id = id.substring(4, id.length);
        document.getElementById('hiddenId2').value = id;
        document.getElementById('url').value = document.getElementById("url" + id).innerText;
        document.getElementById('name').value = document.getElementById("api_name" + id).innerText;
      }

      function DeleteClickMain(id, count) {
        $.ajax({
          type: 'POST',
          url: '/APITrailSettingsDelete',
          data: {
            "_token": "{{ csrf_token() }}",
            'id': id,
          },

          success: function(data) {
            $('#apitable tr[id= ' + id + ']').remove();
          }
        });
      }

      function OperatorClick() {
        var select = document.getElementById("select_op").value;
        if (select != '0') {
          window.location = '/APITrailSettings/' + select;
        }
      }

      var count_value = Number("<?php echo $count + 1; ?>");

      function addNewRow(api_id, api_name, minutes, priority) {

        if (minutes == '') {
          minutes = 0;
        }
        if (priority == '') {
          priority = 0;
        }

        $('#apitable > tbody.dynamic_rows').append('<tr id=temp' + count_value + '><td id="" class="row_id">' + count_value +
          '</td><td class="api_id" id=' + api_id + '>' + api_name + '</td><td><input type="number" class="form-control minutes" value=' +
          minutes + '></td><td><input type="number" class="form-control priority" value=' + priority +
          '></td><td><div class="dropdown"><button type="button" class="btn btn-danger" id="" onclick="TempDeleteClick(' + count_value + ')">Delete</button></div></td></tr>');

        $('#minutes_input').val('');
        $('#priority_input').val('');
        count_value = count_value + 1;
      }

      function TempDeleteClick(id) {
        $('#apitable tr[id=temp' + id + ']').remove();
      }
    </script>

  </div>
</body>
