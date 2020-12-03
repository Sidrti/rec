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
       
        @for($i=0;$i<count($operator_data);$i++)
    
        @php 
         if($operator_data[$i]->OperatorId == null)
         {
       

        echo '<option value='.$operator_data[$i]->id.'>'.$operator_data[$i]->operator.'</option>';

        
         }
        @endphp
      
        

        @endfor
    </select>
    </div>
</div>
</div>
@php
if(count($operator_data) !=0 )
{
@endphp
<div class=" table-responsive">
  <table class="table table-striped table-bordered">
      <tr  class="bg-primary">
          <th style="color:white !important">#</th>
          <th style="color:white !important">API</th>
          <th style="color:white !important">Minutes</th>
          <th style="color:white !important">Priority</th>
        
  
      </tr>
  
      <tbody id="myTable">
    
   
      @for($i=0;$i<count($api_master);$i++)
      <tr>
          <th><input type="checkbox" name="checkbox" value="{{$api_master[$i]['id'] }}"> </th>
          <th id="api{{$api_master[$i]->id}}"> {{$api_master[$i]->api_name }}</th>
          <th><input type="text"  id="minutes{{$api_master[$i]['id'] }}"></th>
          <th><input type="text" id="priority{{$api_master[$i]['id'] }}"}}></th>
      </tr>
         @endfor
      </tbody>
   </table>
   <button onclick="AddapiClicked()" class="btn btn-primary">Add API </button>
  </div>
  @php
  }
  @endphp

  

  
          
      

<script>
  var master_id ;
  var GlobalIndex = 0;
  var arrayLength = 0;
  var array = [];
  function AddapiClicked()
  {
    
    var checkboxes = document.getElementsByName('checkbox');
    var vals = "";
    for (var i=0, n=checkboxes.length;i<n;i++) 
    {
        if (checkboxes[i].checked) 
        {
            array.push(checkboxes[i].value);
        }
    }
    arrayLength = array.length;
   
   // array.forEach(IterateArray);

  //  for(var i =0;i<array.length;i++)
    //{
      IterateArray()
   // }

   // InsertIntoDb(minutes,priority,operator_id,api_id,index) ;

    console.log(array);
  }
  function IterateArray()
  {
    var value = array[GlobalIndex];
  
    var minutes = document.getElementById("minutes"+value).value;
    var priority = document.getElementById("priority"+value).value;
    var api_id = document.getElementById("priority"+value).value;
    var operator_id = document.getElementById("select").value;

    InsertIntoDb(minutes,priority,operator_id,api_id,GlobalIndex) ;



  }

  function InsertIntoDb(minutes,priority,operator_id,api_id,index) 
   {
    
            $.ajax({
               type:'POST',
               url:'MapApi',
               data: {
                "_token": "{{ csrf_token() }}",
                  'minutes':minutes,
                  'priority':priority,
                  'operator_id':operator_id,
                  'api_id':api_id,
                  'index':index,
                  'master_id':master_id,

              },
               success:function(data) 
               {
                  master_id = data;
                  GlobalIndex++;
                 
                 if(arrayLength == GlobalIndex)
                 {
                  window.location = "ApiTrail";
                 }
                 else{
                 setTimeout(IterateArray, 1);
                 }
               }
            });
    }  

</script>
</body>

