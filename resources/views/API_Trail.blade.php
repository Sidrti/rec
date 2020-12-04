@include('header')
<script src ="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src ="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>

<style>
  .th-sty{
    color: black;
    max-width: auto;
  }
</style>
<div class="container-fluid">
<div class="row mt-3">

    <div class="col-md-7 style="padding: 0px;">


<div  class="form-group" style="background-Position: 97% center;background-Repeat: no-repeat; cursor: pointer;" placeholder="SR1">
    <select class="form-control" id="select">
        
        @for($i=0;$i<count($fail_switch_master);$i++)
       <option value={{$fail_switch_master[$i]->id}}>{{$fail_switch_master[$i]->operator}}</option>
        @endfor
    </select>
    </div>
</div>
    <div class="col-5">
        
      <button class="btn btn-primary float-right" style="border-radius:30px" onclick="ApiTrailClick()" >Map New API</button>

    </div>
</div>
        <h3 >API Trail Listing</h2>
  <table id="apitable" class="table table-striped table-bordered"  style="width:100%">
    <thead>
      <tr>
        <th class="th-sty">#</th>
        <th class="th-sty">APIs</th>
        <th class=th-sty>Minutes</th>
        <th class="th-sty">Priority</th>
        <th class="th-sty"></th>
      </tr>
    </thead>
    <tbody>
    @php
    $count = 0;
  @endphp
    @foreach($data as $i)
    @php
    $count++;
  @endphp
      <tr>
        <td>{{ $count }}</td>
        <td contenteditable="false" id="a{{$i->id}}">{{ $i->api_name}}</td>
        <td contenteditable="false" id="m{{$i->id}}">{{ $i->minutes}}</td>
      <td contenteditable="false" id="p{{$i->id}}">{{ $i->priority}}</td>
        <td>
         <div class="dropdown">
         <button type="button" class="btn btn-danger" id="{{ $i->id}}" onclick="DeleteClick(this.id)">
    Delete
  </button>
</div> </td>
      </tr>
     @endforeach
    </tbody>

    <tbody>
      <tr>
        <td></td>
        <td contenteditable="false">
          <select id="api_name">
           
         @foreach($all_api_master as $i)
          
          <option value="{{ $i->id}}">{{ $i->api_name}}</option>

          @endforeach
          </select></td>
      <td contenteditable="false" id="url{{$i->id}}">
        
        <input type="text" name="sample_url" class="form-control" id="minutes">

      </td>
      <td contenteditable="false" id="url{{$i->id}}">
        
        <input type="text" name="sample_url" class="form-control" id="priority">

      </td>
        <td>
         <div class="dropdown">
  <button type="button" class="btn btn-primary" id="{{ $i->id}}" onclick="AddNewData(api_name.value, minutes.value, priority.value,select.value)">
    Add New Api
  </button>
</div> </td>
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

            <label class="col-form-label" >SMS URL:</label>
            <label class="col-form-label"> http://test.com/web-services/httpapi/recharge-request?acc_no=ACC12501&api_key=1d4f8a72-83e8-4bfc-b869-f2e3da9bc5d8&opr_code={code}&rech_num={mobilenumber}&amount={amount}&client_key={client_key}</a></label>
          
            <input type="text" name="sample_url" class="form-control" id="sample_url">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  onclick="form_submit_fn()" class="btn btn-primary">Save </button>
      </div>
    </div>
  </div>
</div>




<script>
  function ApiTrailClick()
  {
    window.location = "ApiTrail";
  }
 function DeleteClick(id)
 {
  if (confirm('Are you sure you want to Delete this entry ?')) {

    DeleteClickMain(id);


} else {
  // Do nothing!
  console.log('Thing was not saved to the database.');
  }
 }

</script>
  <script>
   
  $(document).ready(function() {
    $('#apitable').DataTable();
} );
  </script>
    <script type="text/javascript">
  function form_submit_fn() {
    document.getElementById("form").submit();
   }
   function EditClick(id)
   {
    id = id.substring(4,id.length);
    document.getElementById('hiddenId2').value = id;
    document.getElementById('url').value = document.getElementById("url"+id).innerText;
    document.getElementById('name').value = document.getElementById("api_name"+id).innerText;
     /*
    
      event.preventDefault();
 
      
      var res = id.substring(4, id.length);
      if(document.getElementById(id).innerHTML=='Edit')
      {
      document.getElementById('url'+res).setAttribute('contenteditable',true)
      document.getElementById('api_name'+res).setAttribute('contenteditable',true)
      document.getElementById(id).innerHTML='Save'
      }
      else
      {
        var editurl = document.getElementById('url'+res).innerText;
        var editname = document.getElementById('api_name'+res).innerText;
        
        SaveEditDB(editurl,editname,res);

        document.getElementById('url'+res).setAttribute('contenteditable',false)
        document.getElementById('api_name'+res).setAttribute('contenteditable',false)
        document.getElementById(id).innerHTML='Edit'

        
      }  */
   }    

  </script>

  <script>
    

    function DeleteClickMain(id) 
   {
    
            $.ajax({
               type:'POST',
               url:'APITrailSettingsDelete',
               data: {
                "_token": "{{ csrf_token() }}",
                  'id':id,
              },
               
               success:function(data) 
               {
                  alert('Success');
                  window.location='/APITrailSettings'
               }
            });
    } 

  </script>

  <script>
    
    function AddNewData(Api,minutes,priority,master_id) 
   {
    
            $.ajax({
               type:'POST',
               url:'APITrailSettings/Add',
               data: {
                "_token": "{{ csrf_token() }}",
                  'api_id':Api,
                  'minutes':minutes,
                  'priority':priority,
                  'master_id':master_id,
              },
               
               success:function(data) 
               {
                  alert('Success');
                  window.location='/APITrailSettings'
               }
            });
    }  


  </script>

</div>