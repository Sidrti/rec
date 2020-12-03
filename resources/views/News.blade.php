@include('header')
<!DOCTYPE html>
<html>
  <head>
    <title>Add URL Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, p { 
      padding: 0;
      margin: 0;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      line-height: 24px;
      color: #666;
      }
      .main-block {
      display: flex;
      justify-content: center;
      align-items: center;
      }
      form {
      width: 100%;
      padding: 20px;
      background: #fff;
      box-shadow: 0 2px 5px #ccc; 
      }
      h1 {
      font-weight: 400;
      line-height: 28px;
      }
      hr {
      margin: 20px 0;
      }
      span.required {
      color: red;
      }
      .personal-details, .question-block, .statements-block {
      padding-bottom: 20px;
      }
      .personal-details >div {
      display: flex;
      flex-direction: column;
      }
      input {
      padding: 8px 5px;
      margin-bottom: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
      outline: none;
      vertical-align: middle;
      }
      input:hover, textarea:hover {
      outline: none;
      border: 1px solid #095484;
      }
      .question, .answer, table, textarea {
      width: 100%;
      }
      .answer input, table input {
      width: auto;
      }
      th, td {
      width: 14%;
      padding: 10px 0;
      border-bottom: 1px solid #ccc;
      text-align: center;
      vertical-align: unset;
      line-height: 18px;
      font-weight: 400;
      word-break: break-all;
      }
      .first-col {
      width: 30%;
      text-align: left;
      }
      small {
      display: block;
      line-height: 18px;
      opacity: 0.5;
      }
      .btn-block {
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border-radius: 5px; 
      border: none;
      background: #095484; 
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #0666a3;
      }
      @media (min-width: 568px) {
      .personal-details >div {
      flex-direction: row;
      align-items: center;
      }
      label {
      width: 95px;
      }
      input {
      width: calc((100% - 130px)/2);
      }
      input.first-name, input.seminar-title {
      margin: 0 5px 10px;
      }
      .question-block {
      display: flex;
      justify-content: space-between;
      }
      .question, .answer {
      width: 50%;
      }
      th, td {
      word-break: keep-all;
      }
      }
    </style>
  </head>
  <body>
    <div class="main-block">
      <form method="get" action="formSubmit">
	  {{@csrf_field()}}
        <h1>Add Latest News</h1>
        <hr>
        <div class="personal-details">
          <div>
            <label>Title <span class="required">*</span></label>
            <input  class="first-name" type="text" name="name" placeholder="Title" required/>
          </div>
          <div>
            <label>From Date:<span class="required">*</span></label>
			<input type="date" name="FromDate" name="From Date" required/>
          </div>
		  <div>
            <label>To Date:<span class="required">*</span></label>
			<input type="date" name="ToDate" name="To Date" required/>
          </div>
        </div>
     
        <div class="btn-block">
          <button type="submit" href="/">Add News</button>
        </div>
      </form>
    </div>


    <div class=" table-responsive">
      <table class="table table-striped table-bordered">
          <tr  class="bg-primary">
              <th style="color:white !important">#</th>
              <th style="color:white !important">News</th>
              <th style="color:white !important">Start Date</th>
              <th style="color:white !important">End Date</th>
              <th style="color:white !important"><button class="btn btn-danger">Delete</button></th>

 
          </tr>
    <tbody id="myTable">
  
      @for($i=0;$i<count($array);$i++)
      <tr>
          <th>{{$i+1}}</th>
          <th>{{$array[$i]['title'] }}</th>
          <th>{{$array[$i]['from_date'] }}</th>
          <th>{{$array[$i]['to_date'] }}</th>
          <th><a href="OperatorList/Update/Status/{{$array[$i]['id'] }}">{{$array[$i]['status'] }}</a>   </th>
         

      </tr>
         @endfor
      </tbody>
   </table>
    </div>




  </body>
</html>