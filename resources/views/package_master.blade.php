@include('header')

<link rel="stylesheet" href="/css/operator_list.css">

<body>
<div class="container-fluid">
<div class="row mt-3">
    <div class="col-lg-12">
        
        <button class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModal">Add Package</button>
    </div>
</div>
        <h3 >Package List</h2>
  <table id="apitable" class="table table-striped table-bordered"  style="width:100%">
    <thead>
      <tr>
        <th class="th-sty">#</th>
        <th class="th-sty">Package Title</th>
        <th class=th-sty> </th>
        <th class="th-sty"> </th>
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
        <td contenteditable="false" id="package_title{{$i->id}}">{{ $i->package_title}}</td>
      <td contenteditable="false" id='edit'>
          <a href="#" onclick="return false;">Edit</a>
      </td>
      <td contenteditable="false" id='edit'>
          <a href="#" onclick="return false;">Referral Details</a>
      </td>
      </tr>
     @endforeach
    </tbody>
  </table>


<!-- Add Package -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CREATE NEW PACKAGE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form">   
          <div class="form-group">
            <input type="text" name="package_title" class="form-control" id="package_title" placeholder="Package Title">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button username='{{ Auth::user()->id }}' id='create_package' onclick='form_submit(this.username)' class="btn btn-danger">Create Package</button>
      </div>
    </div>
  </div>
</div>


<script>

    function form_submit(username)
    {
        var title = document.getElementById('package_title').value;
        var username = document.getElementById('create_package').getAttribute("username");
        window.location = 'ManagePackage/Add/'+title+'/'+username;
    }

</script>
</body>
