@include('header')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>

<style>
  .th-sty {
    color: black;
    max-width: auto;
  }
</style>
<div class="container-fluid">
  
  <h3>Package Details</h3>
    <table id="apitable" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="th-sty">#</th>
          <th class=th-sty>Operator</th>
          <th class="th-sty">Max %</th>
          <th class="th-sty">Ded. %</th>
          <th class="th-sty">Ref. %</th>
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
          <td contenteditable="false" id="a{{$i->id}}">{{ $i->operator}}</td>
          <td contenteditable="false" id="a{{$i->id}}">{{ $i->max}}</td>
          <td contenteditable="false">

            <input type="text" name="sample_url" class="form-control" id="{{ $i->ded}}" value="{{ $i->ded}}" readonly>

          </td>

          <td contenteditable="false">

            <input type="text" name="sample_url" class="form-control" id="{{ $i->ref}}" value="{{ $i->ref}}" readonly>

          </td>

        </tr>
        @endforeach
      </tbody>

    </table>

    <script>
      function ApiTrailClick() {
        window.location = "ApiTrail";
      }

      function DeleteClick(id) {

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
      });
    </script>
    <script type="text/javascript">
      function form_submit_fn() {
        document.getElementById("form").submit();
      }

      function EditClick(id) {
        id = id.substring(4, id.length);
        document.getElementById('hiddenId2').value = id;
        document.getElementById('url').value = document.getElementById("url" + id).innerText;
        document.getElementById('name').value = document.getElementById("api_name" + id).innerText;
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

    <script type="text/javascript">
    
      function DeleteClickMain(id) {

        $.ajax({
          type: 'POST',
          url: 'APITrailSettingsDelete',
          data: {
            "_token": "{{ csrf_token() }}",
            'id': id,
          },

          success: function(data) {
            alert('Success');
            window.location = '/APITrailSettings'
          }
        });
      }

      function UpdateRecords() {


        var data = <?php echo json_encode($data) ?>;
        console.log("0-----"+data.length);
        document.getElementById(data[1].minutes).readOnly = false;
        document.getElementById(data[1].priority).readOnly = false;


        /*for(int i=0; i<data.length; i++) {

          
     

        }*/

      }
    </script>

    <script>
      function AddNewData(Api, minutes, priority, master_id) {


        $.ajax({
          type: 'POST',
          url: 'APITrailSettings/Add',
          data: {
            "_token": "{{ csrf_token() }}",
            'api_id': Api,
            'minutes': minutes,
            'priority': priority,
            'master_id': master_id,
          },

          success: function(data) {
            alert('Success');
            window.location = '/APITrailSettings'
          }
        });
      }
    </script>

</div>