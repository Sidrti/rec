@include('header')

<div class="container-fluid">
  <div class="alert alert-success" style="display:none">
    {{ Session::get('success') }}
  </div>
  <div class="row">
    <div class="col-6 mx-auto mt-5 shadow">
      <h3 class="mt-4 mb-4">Promote/Demote User</h3>
      <hr>
      <div>
        <div class="form-group mt-3">
          <label for="select_account">New account type</label>
          <select class="form-control" id="select_account_type">
            <option value="0">--Select Account Type to Change--</option>

            @for($i=0;$i<count($roles);$i++) <option value={{$roles[$i]->id}}>{{$roles[$i]->role_name}}</option>
              @endfor
          </select>

        </div>
        <div class="form-group">
          <label for="select_account_type">Select Account to Change</label>
          <select class="form-control" id="select_account">
            <option value="0">--Select Account to Move--</option>

            @for($i=0;$i<count($child_users);$i++) <option value={{$child_users[$i]->id}}>{{$child_users[$i]->name}}</option>
              @endfor
          </select>
        </div>

        <button onclick="UpdateDb() " class="btn btn-danger mb-5 mt-2">Update Account</button>
      </div>
    </div>
  </div>
  
  <script>
    function UpdateDb() {
      user_id = document.getElementById('select_account').value;
      role_id = document.getElementById('select_account_type').value;

      if (user_id != '0' && role_id != '0')

        $.ajax({
          type: 'POST',
          url: '/MoveAccount/Update',
          data: {
            "_token": "{{ csrf_token() }}",
            'user_id': user_id,
            'role_id': role_id,
          },

          success: function(data) {
            $(".alert-success").css("display", "block");
            $(".alert-success").append("<p>Moved Successfully<p>");
          }
        });
    }
  </script>
</div>
