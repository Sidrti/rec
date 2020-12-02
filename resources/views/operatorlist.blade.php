@include('header')
<style>
    th{
        color:black;
    }
</style>

<body>
<div class="row mt-5">
    <div class="col-md-9 col-sm-9" style="padding: 0px;">
      
           
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
        <th style="color:white !important">Code</th>
        <th style="color:white !important">Status</th>
        <th style="color:white !important">Curr Api</th>
        <th style="color:white !important">API 2</th>
        <th style="color:white !important">Api 3</th>
    </tr>

    <tbody id="myTable">
  
    @for($i=0;$i<count($array);$i++)
    <tr>
        <th>{{$i+1}}</th>
        <th>{{$array[$i]['category_name'] }}</th>
        <th>{{$array[$i]['operator'] }}</th>
        <th>{{$array[$i]['code'] }}</th>
        <th>{{$array[$i]['status'] }}</th>
        <th data-toggle="modal" data-target="#exampleModal" id="{{$array[$i]['id']}}" onclick="OpenModal(this.id,1)">{{$array[$i]['api_1'] }}
        @php
        if($array[$i]['api_1'] == null)
        {
            echo 'Not Set';
        }
        else {
            echo $array[$i]['api_1'];
            
        }
            
        @endphp
        
        </th>
        <th>
        @php
       
 
        if($array[$i]['api_1'] != null && $array[$i]['api_2'] == null)
        {
            echo 'Not Set';
        }
        else if($array[$i]['api_2'] != null)
        {
            echo $array[$i]['api_2'] ;
        }
         
        @endphp
        </th>
        <th>
            
            @php
                
           if($array[$i]['api_2'] != null && $array[$i]['api_3'] == null)
            {
                echo 'Not Set';
            }
            else if($array[$i]['api_3'] != null)
            {
                echo $array[$i]['api_3'] ;
            }
        @endphp
        </th>
    </tr>
       @endfor
    </tbody>
 </table>
</div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select API</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <table class="table table-striped table-bordered">
                <tr  class="bg-primary">
                    <th style="color:white !important">#</th>
                    <th style="color:white !important">API Name</th>
                   
                </tr>
            @for($i=0;$i<count($tbl_api_master);$i++)
       
            <tr>
                <th>{{$i+1}}</th>
                <th>{{$tbl_api_master[$i]['api_name']}}</th>
                <th><button class="btn btn-primary" id="{{$tbl_api_master[$i]['id']}}" onclick="SelectClick(this.id)">Select</button></th>
            </tr>
            
             
             
         @endfor
  
          
        </div>
      
      </div>
    </div>
  </div>


<script>

    var operator_id = 0;
    function OpenModal(id,modal)
    {
        operator_id = id;
    }
    function SelectClick(id)
    {
        
        window.location = 'OperatorList/Update/'+id+'/'+operator_id
    }
</script>
</body>

