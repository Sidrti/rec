@include('header')

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .shadow{
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

  }
</style>

<body>
  
  <div class="container-fluid">
    <div class="row py-3">
      <div class="col-sm-12">
          <h3 class="float-left text-success"><i class="fa fa-file"></i>Recharge</h3>
        </div>
  </div>
  <div class="row">
    <div class="col-8 shadow">
    <ul class="nav nav-tabs mt-5">
      <li class="active">
        <a data-toggle="tab" href="#home">
          <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header text-center"><i class="fa fa-mobile fa-3x text-white"></i></div>
            <div class="card-body">
              <h5 class="card-title">&nbsp &nbsp Mobile &nbsp &nbsp</h5>
             
            </div>
          </div>
        </a>
      </li>
      <li>
       <a data-toggle="tab" href="#menu1">
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
          <div class="card-header text-center"><i class="fa fa-television fa-3x text-white"></i></div>
          <div class="card-body">
            <h5 class="card-title">DTH Rech. &nbsp</h5>
           
          </div>
        </div>
       </a>
    </li>
      <li><a data-toggle="tab" href="#menu2">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header text-center"><i class="fa fa-phone fa-3x text-white"></i></div>
          <div class="card-body">
            <h5 class="card-title">&nbsp Postpaid &nbsp</h5>
          </div>
        </div>
      </a></li>
      <li><a data-toggle="tab" href="#menu3">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header text-center"><i class="fa fa-plug fa-3x text-white"></i></div>
          <div class="card-body">
            <h5 class="card-title">Electricity</h5>
          </div>
        </div>
      </a></li>
      <li><a data-toggle="tab" href="#menu4">

        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
          <div class="card-header text-center"><i class="fa fa-handshake-o fa-3x text-white"></i></div>
          <div class="card-body">
            <h5 class="card-title">Insurance &nbsp</h5>
          </div>
        </div>
      </a></li>
  
    </ul>
  
    <div class="container-fluid tab-content">
      <div id="home" class="tab-pane fade show active" >
        <h3 class="mt-5">Mobile Recharge</h3>
        <div class="form">
      
          <div class="form-row mt-3">
            <input type="number" class="form-control" min='0' id="recharge_no" placeholder="Recharge No.">
          </div>
          <div class="form-row mt-3">
            <select class="form-control" required id="operator">
              <option value='none'>Select Operator</option>
            </select>
          </div>
          <div class="form-row mt-3">
            <input type="number" class="form-control" min='0' id="pan_no" placeholder="Mobile No.">
          </div>
        <div class="mt-3 mb-5">
          <button class="btn btn-danger">View Offer</button>
          <button class="btn btn-success">Recharge</button>
        </div>

      
      </div>
      </div>
      <div id="menu1" class="tab-pane fade">
        <h3 class="mt-5">DTH Recharge</h3>
        <div class="form">
      
          <div class="form-row mt-3">
            <input type="number" class="form-control" min='0' id="recharge_no" placeholder="Recharge No.">
          </div>
          <div class="form-row mt-3">
            <select class="form-control" required id="operator">
              <option value='none'>Select Operator</option>
            </select>
          </div>
          <div class="form-row mt-3">
            <input type="number" class="form-control" min='0' id="pan_no" placeholder="Mobile No.">
          </div>
        <div class="mt-3 mb-5">
          <button class="btn btn-danger">View Offer</button>
          <button class="btn btn-success">Recharge</button>
        </div>

      
      </div>
      </div>
      <div id="menu2" class="tab-pane fade">
        <h3 class="mt-5">Postpaid</h3>
        <div class="form">
      
          <div class="form-row mt-3">
            <input type="number" class="form-control" min='0' id="recharge_no" placeholder="Recharge No.">
          </div>
          <div class="form-row mt-3">
            <select class="form-control" required id="operator">
              <option value='none'>Select Operator</option>
            </select>
          </div>
          <div class="form-row mt-3">
            <input type="number" class="form-control" min='0' id="pan_no" placeholder="Mobile No.">
          </div>
        <div class="mt-3 mb-5">
          <button class="btn btn-danger">View Offer</button>
          <button class="btn btn-success">Recharge</button>
        </div>

      
      </div>
      </div>
      <div id="menu3" class="tab-pane fade">
        <h3 class="mt-5">Electricity</h3>
        <div class="form">
      
          <div class="form-row mt-3">
            <input type="number" class="form-control" min='0' id="recharge_no" placeholder="Recharge No.">
          </div>
          <div class="form-row mt-3">
            <select class="form-control" required id="operator">
              <option value='none'>Select Operator</option>
            </select>
          </div>
          <div class="form-row mt-3">
            <input type="number" class="form-control" min='0' id="pan_no" placeholder="Mobile No.">
          </div>
        <div class="mt-3 mb-5">
          <button class="btn btn-danger">View Offer</button>
          <button class="btn btn-success">Recharge</button>
        </div>
      </div>
      </div>
      <div id="menu4" class="tab-pane fade">
        <h3 class="mt-5">Insurance</h3>
        <div class="form">
      
          <div class="form-row mt-3">
            <input type="number" class="form-control" min='0' id="recharge_no" placeholder="Recharge No.">
          </div>
          <div class="form-row mt-3">
            <select class="form-control" required id="operator">
              <option value='none'>Select Operator</option>
            </select>
          </div>
          <div class="form-row mt-3">
            <input type="number" class="form-control" min='0' id="pan_no" placeholder="Mobile No.">
          </div>
        <div class="mt-3 mb-5">
          <button class="btn btn-danger">View Offer</button>
          <button class="btn btn-success">Recharge</button>
        </div>
      </div>
      </div>
    </div>
  </div>

  <div class="col-4 shadow">
    <div class="mt-5 table-responsive">
      <table class="table table-striped table-bordered">
          <tr class="bg-dark">
              <th>#</th>
              <th>Opr Id</th>
              <th>Operator</th>
              <th>Rch No.</th>
              <th>Amt.</th>
              <th>Status</th>
          </tr>
          <tbody id="myTable">
          </tbody>
      </table>
    </div>
  

  </div>
</div>
</div>

</body>
