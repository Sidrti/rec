@include('header')
<script src ="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src ="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>

<style>
  .th-sty{
    color: black;
    max-width: auto;
  }

  .dataTables_filter{
    float:right;
  }
  
</style>
<div class="container-fluid">
<div class="row mt-3">
    <div class="col-lg-12">
        
      <button class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModal">+ Add News</button>

    </div>
</div>
        <h3 >News Detailing</h3>
  <table id="apitable" class="table table-striped table-bordered"  style="width:100%">
    <thead>
      <tr>
        <th class="th-sty">#</th>
        <th class="th-sty">Name</th>
        <th class=th-sty>From Date / End Date</th>
        
        <th class="th-sty">Options</th>
      </tr>
    </thead>
    <tbody>
    @php
    $count = 0;
  @endphp
    @foreach($array as $i)
    @php
    $count++;
  @endphp
      <tr>
        <td>{{ $count }}</td>
        <td contenteditable="false" id="api_name{{$i->id}}">{{ $i->title}}</td>
      <td contenteditable="false" id="url{{$i->id}}">{{ $i->from_date}}<br>{{ $i->to_date}}</td>
      
        <td>
         <div class="dropdown">
  <button type="button" class="btn btn-danger" id="{{ $i->id}}" onclick="DeleteClick(this.id)">
    Delete
  </button>
</div> </td>
      </tr>
     @endforeach
    </tbody>
  </table>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD NEWs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="AddNews" method="POST" id="form">
         @csrf
        
          <div class="form-group">
            <label for="api_name" class="col-form-label">Title:</label>
            <textarea  name="title" class="form-control" id="title"></textarea>

            <label class="col-form-label" >From Date :</label>
          
            <input type="date" name="from_date" class="form-control" id="from_date">

            <label class="col-form-label" >To Date :</label>
            <input type="date" name="to_date" class="form-control" id="to_date">
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
               url:'NewsDelete',
               data: {
                "_token": "{{ csrf_token() }}",   
                  "id":id,
              },
               
               success:function(data) 
               {
                  alert('Success');
                  window.location='/News';
               }
            });
    } 

  </script>

</div>