@include('header')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"> </script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"> </script>
<link rel="stylesheet" href="/css/operator_list.css">

<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-9 col-sm-9">
                <div class="form-group" style="background-Position: 97% center;background-Repeat: no-repeat; cursor: pointer;" placeholder="SR1">
                    <select class="form-control" id="select">
                        <option value="0">---------Select API---------------</option>

                        @for($i=0;$i<count($all_api_master);$i++)
                        @php 
                        if($all_api_master[$i]->id == $id)
                        {
                        @endphp 
                        <option value={{$all_api_master[$i]->id}} selected>{{$all_api_master[$i]->api_name}}</option>
                        @php
                        }
                        else {
                            @endphp
                            <option value={{$all_api_master[$i]->id}}>{{$all_api_master[$i]->api_name}}</option>
                            @php
                        }
                        @endphp
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
            <div class="col-sm-12">
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
                        @php
                        if($id != 0)
                        {   
                        @endphp
                        @for($i=0;$i<count($array);$i++) <tr>
                            @php
                            if( $array[$i]['tbl_api_code']->api_id == $id)
                            {
                            $operator_code = $array[$i]['tbl_api_code']->operator_code;
                            $api_status = $array[$i]['tbl_api_code']->api_status;
                            }
                            else {
                            $operator_code = '';
                            $api_status = '';

                            }
                            @endphp
                            <td>{{$i+1}}</td>
                            <input type="hidden" value="{{$array[$i]['tbl_api_code']->operator_id}}" id="operator_id{{$i}}">
                            <input type="hidden" value="{{$array[$i]['tbl_api_code']->category_id}}" id="category_id{{$i}}">
                            <td>{{$array[$i]['tbl_api_code']->name }}</td>
                            <td>{{$array[$i]['tbl_api_code']->operator }}</td>
                            <td><input class="form-control form-control-sm text-danger" type="text" value="{{$operator_code}}" id="api_code{{$i}}"></td>
                            <td><input class="form-control form-control-sm text-danger" type="text" value="{{$api_status }}" id="status{{$i }}"></td>
                            <td><button class="btn btn-danger" onClick="UpdateClick(this.id)" id="{{$i}}">Update</button></td>
                            </tr>
                            @endfor
                            @php
                        }
                            @endphp
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function OperatorClick() {
            var select = document.getElementById("select");
            if (select.value != '0') {
                window.location = '/ApiInfo/' + select.value;
            }
        }

        function UpdateClick(id) 
        {
            var operator_id = document.getElementById("operator_id" + id).value;
            var category_id = document.getElementById("category_id" + id).value;
            var api_id = document.getElementById("select").value;
           
            var api_code_value = document.getElementById("api_code" + id).value;
            var status_value = document.getElementById("status" + id).value;
            window.location = '/ApiInfo/Update/' + id + '/' + api_code_value + '/' + status_value+'/'+api_id+"/"+operator_id+"/"+category_id;
        }
    </script>
</body>
