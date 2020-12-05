@include('header')
<script src ="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src ="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>

<style>
    th{
        color:black;
    }
</style>

<body>
<div class="container-fluid">
<div class="row mt-5">
<div class="col-md-9 col-sm-9">
<div  class="form-group" style="background-Position: 97% center;background-Repeat: no-repeat; cursor: pointer;" placeholder="SR1">
    <select class="form-control" id="select">
        
        @for($i=0;$i<count($all_api_master);$i++)
       <option value={{$all_api_master[$i]->id}}>{{$all_api_master[$i]->api_name}}</option>
        @endfor
    </select>
    </div>
</div>
<div class="col-md-3 col-sm-3">
<button type="button" class="btn btn-secondary button" onclick="OperatorClick()">Load Operator List</button>
</div>
</div>
<h3>Api Codes</h3>
<div class="row">
<div class= "col-sm-12">
<table class="table table-striped table-bordered">
    <tr style="background:#FFF;">
        <th class="th-sty">#</th>
        <th class="th-sty">Category</th>
        <th class="th-sty">Operator</th>
        <th class="th-sty">API Code</th>
        <th class="th-sty">Api Margin</th>
        <th class="th-sty"></th>
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
        <td>{{$i+1}}</td>
        <td>{{$array[$i]['tbl_api_code']->name }}</td>
        <td>{{$array[$i]['tbl_api_code']->operator }}</td>
        <td><input class="form-control form-control-sm text-danger" type="text" value="{{$operator_code}}" id="api_code{{$array[$i]['tbl_api_code']->id}}"></td>
        <td><input  class="form-control form-control-sm text-danger" type="text" value="{{$api_status }}" id="status{{$array[$i]['tbl_api_code']->id }}"></td>
        <td><button class="btn btn-danger" onClick="UpdateClick(this.id)" id="{{$array[$i]['tbl_api_code']->id }}">Update</button></td>
    </tr>
       @endfor
    </tbody>
 </table>
 </div>
</div>
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

