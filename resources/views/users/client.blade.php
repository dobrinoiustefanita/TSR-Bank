@extends('layouts.admin_lte')

@section('content')


<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <a href="{{ route('AdminGetUserList')}}"><h3 class="box-title">Clienti</h3></a>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
                    <input style="width : 100%" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for User.." title="Type in a name">
                <table class="table table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>Users Name</th>
                            <th>Email</th>
                            <th>Bank Account</th>
                            <th>Delete the User</th>
                            <th>Deposit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        @if($user->isAdmin == 0)
                        
                            <tr id="myTR">
                                <td class="additional-information">{{ $user->name }}</td>
                                <td class="additional-information">{{ $user->email }}</td>
                                <td class="additional-information">{{ $user->deposit }} lei</td>
                                <td>
                                    <a class="admin_delete_client_button" data-href="{{ URL::route('DeleteUser', $user->id) }}">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                                            Delete This Client
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info-{{$user->id}}" data-id="{{$user->id}}">
                                            Deposit
                                        </button>
                                        <div class="modal modal-info fade" id="modal-info-{{$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="post" class="add-skill-to-label"
                                                    action="{{route('DepositToAccount',['user_id'=> $user->id])}}">
                                                        @csrf
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                                <h3 class="modal-title">Add Money to the Bank Account</h3>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>The amount in the bank account is: {{$user->deposit}} lei</p>
                                                                <input type="text" name="deposit" id="deposit" style=" color:black; background: inherit; border-color: black ">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Nu</button>
                                                                <button type="submit" class="btn btn-outline pull-right">
                                                                    Da
                                                                </button>
                                                            </div>
                                                    </form>    
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </div>
                                </td>
                               
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal modal-warning fade" id="modal-warning">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Esti sigur ca vrei sa stergi acest user</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Nu</button>
                        <a  class="delete_this_client" href="">
                            <button type="button" class="btn btn-outline pull-right">
                                Da
                            </button>
                        </a>
                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
            
        </div>    
    </div>
</div>

@endsection

@push('custom-scripts')
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
</script>
@endpush