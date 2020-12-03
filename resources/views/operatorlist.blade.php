@include('header')

<link rel="stylesheet" href="/css/operator_list.css">

<body>
@if ( Session::has('flash_message') )
 
 <div class="alert {{ Session::get('flash_type') }}">
     <h4>{{ Session::get('flash_message') }}</h4>
 </div>
@endif
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
        <th><a id="{{ $array[$i]['status_value'] }}" href="OperatorStatus/Update/Status/{{ $array[$i]['status_value'] }}/{{ $i+1 }}" >{{ $array[$i]['status'] }}</a></th>
        <th data-toggle="modal" data-target="#exampleModal" id="{{ $array[$i]['id'] }}" onclick="OpenModal(this.id,1)">
        <div class="divide_equally">
        <div>
        @php

        if($api_array[$i][0]['api_name1'] == null)
        {
            echo 'Not Set';
        }
        else {
            echo "<a api_name={$api_array[$i][0]['api_name1']} href='#' onclick='return false;' api_url={$api_array[$i][0]['api_url1']}>" . $api_array[$i][0]['api_name1'] . "</a>";
            if($api_array[$i][1]['api_name2'] == null) {
                echo "</div>";
                echo "<div>";
                echo "<button class='btn btn-danger' id={$array[$i]['id']} onclick='RemoveAPI(this.id, 1)'>Remove</button>";
            }
        }

        if($api_array[$i][1]['api_name2'] == null) {
            
        }

        @endphp
    </div>
    </div>    
    </th>

        <th data-toggle="modal" data-target="#exampleModal" id="{{ $array[$i]['id'] }}" onclick="OpenModal(this.id,2)">
        <div class="divide_equally">
        <div>
        @php
       
        if($api_array[$i][0]['api_name1'] != null && $api_array[$i][1]['api_name2'] == null)
        {
            echo 'Not Set';
        }
        else if($api_array[$i][1]['api_name2'] != null)
        {
            echo "<a api_name={$api_array[$i][1]['api_name2']} href='#' onclick='return false;' api_url={$api_array[$i][1]['api_url2']}>" . $api_array[$i][1]['api_name2'] . "</a>";
            if($api_array[$i][2]['api_name3'] == null) {
                echo "</div>";
                echo "<div>";
                echo "<button class='btn btn-danger' id={$array[$i]['id']} onclick='RemoveAPI(this.id, 2)'>Remove</button>";
            }
        }
        if($api_array[$i][2]['api_name3'] == null) {
            
        }
        @endphp
    </div>
    </div>
        </th>

        <th data-toggle="modal" data-target="#exampleModal" id="{{ $array[$i]['id'] }}" onclick="OpenModal(this.id,3)">
        <div class="divide_equally">
        <div>
            @php 
            
           if($api_array[$i][1]['api_name2'] != null && $api_array[$i][2]['api_name3'] == null)
            {
                echo 'Not Set';
            }
            else if($api_array[$i][2]['api_name3'] != null)
            {
                echo "<a api_name={$api_array[$i][2]['api_name3']} href='#' onclick='return false;' api_url={$api_array[$i][2]['api_url3']}>" . $api_array[$i][2]['api_name3'] . "</a>";
                echo "</div>";
                echo "<div>";
                echo "<button class='btn btn-danger' id={$array[$i]['id']} onclick='RemoveAPI(this.id, 3)'>Remove</button>";
            }
        @endphp
        </div>
        </div>
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
        operator_api_id = modal;
    }
    function SelectClick(id)
    {
        window.location = 'OperatorList/Update/'+id+'/'+operator_id+'/'+operator_api_id;
    }
    function RemoveAPI(id, api_id)
    {
        window.location = 'OperatorAPI/Update/'+id+'/'+api_id;
    }

</script>
</body>

