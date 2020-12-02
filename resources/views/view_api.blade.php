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
    <div class="col-lg-12">
        
        <button class="btn btn-primary float-right" style="border-radius:30px" data-toggle="modal" data-target="#exampleModal">Add API</button>
    </div>
</div>
        <h3 >API Master</h2>
  <table id="apitable" class="table table-striped table-bordered"  style="width:100%">
    <thead>
      <tr>
        <th class="th-sty">#</th>
        <th class="th-sty">Name</th>
        <th class=th-sty>URL</th>
        <th class="th-sty">Options</th>
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
        <td>{{ $i->api_name}}</td>
        <td>{{ $i->url}}</td>
        <td>
         <div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="ViewApi/{{$i->id}}">Edit</a>
    <a class="dropdown-item" href="ViewApi/Delete/{{$i->id}}">Delete</a>

  </div>
</div> </td>
      </tr>
     @endforeach
    </tbody>
  </table>

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
        <form action="AddApi" method="POST" id="form">
         @csrf
        
          <div class="form-group">
            <label for="api_name" class="col-form-label">API Name:</label>
            <input type="text" name="api_name" class="form-control" id="api_name">

            <label class="col-form-label">Sample URL:</label>
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
  $(document).ready(function() {
    $('#apitable').DataTable();
} );
  </script>
    <script type="text/javascript">
  function form_submit_fn() {
    document.getElementById("form").submit();
   }    
  </script>
</div>