@include('header')
<style>
    th{
        color:black;
    }
</style>

<body>

<form action="{{route('AmountFilter.update')}}" method="POST" id="form">
    @csrf
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">API Trail List /h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
        <th style="color:white !important">API</th>
        <th style="color:white !important">Minutes</th>
        <th style="color:white !important">Priority</th>
      

    </tr>

    <tbody id="myTable">
  
    @for($i=0;$i<count($array);$i++)
    <tr>
        <th><checkbox></checkbox></th>
        <th>{{$array[$i]['category'] }}</th>
        <th>{{$array[$i]['operator'] }}</th>
        <th id="amount{{$array[$i]['id']}}" contenteditable="true">{{$array[$i]['amount'] }}</th>
        <th><button class="btn btn-primary" id={{$array[$i]['id']}} onclick="UpdateClick(this.id)">Update</button></th>
    </tr>
       @endfor
    </tbody>
 </table>
</div>
          
         
          
        </div>
        <div class="modal-footer">
     
          <button type="submit" class="btn btn-primary">Update Record </button>
        </div>
      </div>
    </div>
  </div>
</form>
</body>

