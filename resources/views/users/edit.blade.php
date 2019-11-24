@extends('layouts.admin_lte')

@section('content')

<div class="tab-content">
    <div class="tab-pane active">
        
        <hr>
        <div class="box-header">
            <h3 class="box-title">Change Password</h3>
        </div>

        <form enctype="multipart/form-data" method="post" action="{{route('ChangePassword')}}" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label for="OldPassword" class="col-sm-2 control-label">Old Password</label>
                <div class="col-sm-10">
                    <input type='password' class="form-control" id="OldPassword" name="old_password" required>
                </div>
                @error('old_password')
                <span class="help-block has-error" role="alert">
                    <strong class="text-red">{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="NewPassword" class="col-sm-2 control-label">New Password</label>
                <div class="col-sm-10">
                    <input type='password' class="form-control" id="NewPassword" name="new_password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="Confirm Password" class="col-sm-2 control-label" for="photo">Retype new password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirm_password" name="new_password_confirmation">
                    @error('new_password')
                    <span class="help-block has-error" role="alert">
                        <strong class="text-red">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


@push('custom-scripts')
{{-- <script>
    $(document).ready(
    function () {
        $('#side-menu-settings').addClass('active');

    });
</script>


@javascript('ajax_add_skill_url', route('AddSkillToUser'))

<script>
    var ajax_remove_skill_user="{{route('RemoveSkillFromUser')}}";
    var ajax_add_skill_user = "{{route('AddSkillToUser')}}";
</script>  

<script src="{{asset('assets/js/user-skill-scripts.js')}}"></script>   

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script> --}}
@endpush