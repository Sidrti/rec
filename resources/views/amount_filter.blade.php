@include('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/operator_list.css">

<body>
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-md-12">
        <h3 class="float-left"><i class="fa fa-file"></i> Amount Filter</h3>
      </div>
    </div>
    <div class="row py-3">
      <div class="col-md-2 col-sm-2">
        <h4>Select Api</h4>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="form-group" style="background-Position: 97% center;background-Repeat: no-repeat; cursor: pointer;" placeholder="SR1">
          <select class="form-control" id="select">

            @for($i=0;$i<count($api_master);$i++) <option value={{$api_master[$i]->id}}>{{$api_master[$i]->api_name}}</option>
              @endfor
          </select>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <button type="button" class="btn btn-danger float-left" onclick="OperatorClick()">Filter Api Amt.</button>
      </div>
    </div>

    <div class=" table-responsive">
      <table class="table table-striped table-bordered">
        <tr class="bg-white">
          <th>#</th>
          <th>Category</th>
          <th>Operator</th>
          <th>Amount</th>
          <th>Action</th>
        </tr>

        <tbody id="myTable">

          @for($i=0;$i<count($array);$i++) <tr>
            @php
               if($array[$i]['id'] == null){
                $amount_filter_id = 0;
               } 
               else{
                 $amount_filter_id = $array[$i]['id'];
               }
            @endphp
            <input type="hidden" value="">
            <input type="hidden" value="">
            <td>{{$i+1}}</td>
            <td>{{$array[$i]['category'] }}</td>
            <td>{{$array[$i]['operator'] }}</td>
            <td><input class="form-control form-control-sm" type="text" id="amount{{$i}}" value="{{$array[$i]['amount'] }}" contenteditable="true"></td>
            <td><button class="btn text-primary" id={{$i}} name="{{$array[$i]['operator']}}" onclick="UpdateClick(this.id,this.name)">Update</button></td>
            </tr>
            @endfor
        </tbody>
      </table>
    </div>
  </div>

  <form action="{{route('AmountFilter.update')}}" method="POST" id="form">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="amount" class="col-form-label">Amount:</label>
              <input type="text" name="amount" class="form-control" id="amount">
              <input type="hidden" name="update_id" id="update_id">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" onclick="form_submit_fn()" class="btn btn-primary">Save </button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script>
    function UpdateClick(id,operator) {
      var amount = document.getElementById('amount' + id).innerText;
      alert(operator);
      if(id != 0){
      SaveEditDB(amount, id);
      }
      else{
        InsertDB(amount,operator_id,api_id);
      }
    }
    function OperatorClick() {
      var select = document.getElementById("select");
      window.location = '/AmountFilter/' + select.value;
    }
    function UpdateClick1(id) {
      var amount_input_value = document.getElementById("amount_input" + id).value;
      var array = [id, amount_input_value];
      window.location = '/AmountFilter/Update/' + array;
    }
    function SaveEditDB(amount_input_value, id) {
      $.ajax({
        type: 'POST',
        url: '/AmountFilter/Update',
        data: {
          "_token": "{{ csrf_token() }}",
          'amount': amount_input_value,
          'id': id,
        },
        success: function(data) {
          alert('Success');
          window.location = "AmountFilter";
        }
      });
    }
    function InsertDB(amount_input_value, operator_id,api_id) {
    $.ajax({
      type: 'POST',
      url: '/AmountFilter/Insert',
      data: {
        "_token": "{{ csrf_token() }}",
        'amount': amount_input_value,
        'operator_id': operator_id,
        'api_id':api_id
      },
      success: function(data) {
        alert('Success');
        window.location = "AmountFilter";
      }
      });
    }
  </script>
</body>
