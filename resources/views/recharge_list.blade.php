@include('header')

<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/jquery.table-filterable.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="/css/recharge_list.css">

<body>
  <div class="alert alert-success" style="display:none">
    {{ Session::get('success') }}
  </div>

  <div class="container-fluid">
    <div class="form-row">
      <h3 class="mt-4 form-group col-md-2">Recharge List</h3>
      <div class="form-group col-md-10 mt-4">
        <button class="btn btn-danger float-right ml-3">+ Mobile Recharge</button>
        <label class="badge badge-warning float-right mt-2 ml-3">Received</label>
        <label class="badge badge-danger float-right mt-2 ml-3">Failure</label>
        <label class="badge badge-success float-right mt-2 ml-3">Success</label>
      </div>
    </div>
    <div class="form-row mt-4">
      <div class="form-group col-md-2">
        <select class="form-control" required="true" id="all_accounts">
          <option value='none'>All Accounts</option>
          @for($i=0;$i<count($roles);$i++) 
            <option value="{{$roles[$i]['role_name']}}" role_id="{{$roles[$i]['role_id']}}">{{$roles[$i]['role_name']}}</option>
          @endfor
        </select>
      </div>
      <div class="form-group col-md-2" style="padding-right: 0px;">
        <div class="input-group">
          <input type="text" class="form-control" id="from_date" placeholder="date"/>
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">to</span>
          </div>
        </div>
      </div>
      <div class="form-group col-md-2" style="padding-left: 0px; max-width: 17%;">
        <input type="text" class="form-control" id="to_date" placeholder="date"/>
      </div>
      <div class="form-group col-md-2">
        <select class="form-control" required="true" id="all_category">
          <option value='none'>All Category</option>
          @for($i=0;$i<count($recharge_categories);$i++) 
            <option value="{{$recharge_categories[$i]['name']}}" id="{{$recharge_categories[$i]['id']}}">{{$recharge_categories[$i]['name']}}</option>
          @endfor
        </select>
      </div>
      <div class="form-group col-md-2">
        <select class="form-control" required="true" id="all_operator">
          <option value='none'>All Operators</option>
          @for($i=0;$i<count($operators);$i++) 
            <option value="{{$operators[$i]['code']}}" id="{{$operators[$i]['id']}}">{{$operators[$i]['operator']}}</option>
          @endfor
        </select>
      </div>
      <div class="form-group col-md-2">
        <select class="form-control" required="true" id="all_status">
          <option value='none'>All Status</option>
          <option value='success'>Success</option>
          <option value='failures'>Failures</option>
          <option value='received'>Received</option>
          <option value='suspense'>Suspense</option>
        </select>
      </div>
    </div>

    <div class="form-row mt-2">
      <div class="form-group col-md-2 ml-auto">
        <select class="form-control" required="true" id="all_api">
          <option value='none'>All API</option>
          @for($i=0;$i<count($api_list);$i++) 
            <option value="{{$api_list[$i]['api_name']}}" id="{{$api_list[$i]['id']}}">{{$api_list[$i]['api_name']}}</option>
          @endfor
        </select>
      </div>
      <div class="form-group col-md-2">
        <select class="form-control" required="true" id="tickets">
          <option value='none'>Tickets&lbrack;N/A&rbrack;</option>
          <option value='day_open'>Day Open-Tickets</option>
          <option value='day_close'>Day Close-Tickets</option>
          <option value='all_open'>All Open-Tickets</option>
          <option value='all_close'>All Close-Tickets</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <input type="text" class="form-control" id="recharge_amount" placeholder="Amount"/>
      </div>
    </div>

    <table id="recharge_list" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="th-sty">#</th>
          <th class="th-sty">Time</th>
          <th class=th-sty>T.No/Opr ID</th>
          <th class="th-sty" style="width: 18%">Account</th>
          <th class="th-sty">Operator/API</th>
          <th class="th-sty">Rch. No.</th>
          <th class="th-sty">Amount</th>
          <th class="th-sty">Open</th>
          <th class="th-sty">Close</th>
          <th class="th-sty">Status</th>
          <th class="th-sty">Manual</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>

    <script>
      $(document).ready(function() {
        $('#recharge_list').DataTable();
        $('#from_date').datepicker({
          dateFormat: 'dd-mm-yy',
          maxDate: 0,
        }).datepicker('setDate', new Date());
        $('#to_date').datepicker({
          dateFormat: 'dd-mm-yy',
          maxDate: 0,
        }).datepicker('setDate', new Date());

        $('#all_accounts').select2();
        $('#all_operator').select2();
        $('#all_status').select2();
        $('#all_api').select2();
        $('#tickets').select2();
        $('#all_category').select2();
    });
    </script>
</body>
