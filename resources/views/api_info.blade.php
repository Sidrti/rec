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
        
        @for($i=0;$i<count($all_api_master);$i++)
       <option value={{$all_api_master[$i]->id}}>{{$all_api_master[$i]->api_name}}</option>
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
        <th style="color:white !important">API Code</th>
        <th style="color:white !important">Api Margin</th>
        <th style="color:white !important"></th>
    </tr>

    <tbody id="myTable">
  
    @for($i=0;$i<count($array);$i++)
    <tr>
       @php
          if( $array[$i]['tbl_api_code']->api_id == $id)
          {
              $operator_code  = $array[$i]['tbl_api_code']->operator_code;
              $api_status = $array[$i]['tbl_api_code']->api_status;
          }
          else {
              $operator_code = '';
              $api_status = '';
  
         }
       @endphp
        <th>{{$i+1}}</th>
        <th>{{$array[$i]['tbl_api_code']->name }}</th>
        <th>{{$array[$i]['tbl_api_code']->operator }}</th>
        <th><input type="text" value="{{$operator_code}}" id="api_code{{$array[$i]['tbl_api_code']->id}}"></th>
        <th><input type="text" value="{{$api_status }}" id="status{{$array[$i]['tbl_api_code']->id }}"></th>
        <th><button class="btn btn-primary" onClick="UpdateClick(this.id)" id="{{$array[$i]['tbl_api_code']->id }}">Update</button></th>
    </tr>
       @endfor
    </tbody>
 </table>
</div>
<script>
    function OperatorClick()
    {
        var select = document.getElementById("select");
        window.location  = '/ApiInfo/'+select.value;

    }
    function UpdateClick(id)
    {
        var api_code_value = document.getElementById("api_code"+id).value;
        var status_value = document.getElementById("status"+id).value;

        window.location  = '/ApiInfo/Update/'+id+'/'+api_code_value+'/'+status_value;
    }
</script>
</body>

