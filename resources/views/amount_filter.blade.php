@include('header')
<style>
    th{
        color:black;
    }
</style>

<body>
    <div class="row mt-5">
        <div class="col-md-9 col-sm-9" style="padding: 0px;">


    <div  class="form-group" style="background-Position: 97% center;background-Repeat: no-repeat; cursor: pointer;" placeholder="SR1">
        <select class="form-control" id="select">
            
            @for($i=0;$i<count($api_master);$i++)
           <option value={{$api_master[$i]->id}}>{{$api_master[$i]->api_name}}</option>
            @endfor
        </select>
        </div>
    </div>
    <div class="col-md-3 col-sm-3">
    <button type="button" class="btn btn-light button" onclick="OperatorClick()">Load Operator List</button>
    </div>
    </div>

<div class=" table-responsive">
<table class="table table-striped table-bordered">
    <tr  class="bg-primary">
        <th style="color:white !important">#</th>
        <th style="color:white !important">Category</th>
        <th style="color:white !important">Operator</th>
        <th style="color:white !important">Amount</th>
        <th style="color:white !important">Action</th>

    </tr>

    <tbody id="myTable">
  
    @for($i=0;$i<count($array);$i++)
    <tr>
        <th>{{$i+1}}</th>
        <th>{{$array[$i]['category'] }}</th>
        <th>{{$array[$i]['operator'] }}</th>
        <th>{{$array[$i]['amount'] }}</th>
        <th><button class="btn btn-primary" id={{$array[$i]['id']}} onclick="UpdateClick(this.id)" data-toggle="modal" data-target="#exampleModal">Update</button></th>
    </tr>
       @endfor
    </tbody>
 </table>
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
              <input type="hidden" name="update_id" id="update_id" >
            </div>
  
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit"  onclick="form_submit_fn()" class="btn btn-primary">Save </button>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
    function UpdateClick(id)
    {
        document.getElementById('update_id').value = id;
        var amount_input_value = document.getElementById("amount_input"+id).value;
        document.getElementById('amount').value = amount_input_value;

    }
    function OperatorClick()
    {
        var select = document.getElementById("select");
        
        window.location  = '/AmountFilter/'+select.value;
    }
    function UpdateClick1(id)
    {
        var amount_input_value = document.getElementById("amount_input"+id).value;
        var array = [id,amount_input_value];
         window.location  = '/AmountFilter/Update/'+array;
    }
    
</script>
</body>

