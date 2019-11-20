@extends('layouts.admin_lte')

@section('content')


<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <a href="{{ route('AdminGetUserList')}}"><h3 class="box-title">Clienti</h3></a>
            </div>
            <!-- /.box-header -->
            {{-- <form action="search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="search_client"
                        placeholder="Search users"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form> --}}
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Users Name</th>
                            <th>Email</th>
                            <th>Delete the User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        @if($user->isAdmin == 0)
                        
                            <tr>
                                <td class="additional-information">{{ $user->name }}</td>
                                <td class="additional-information">{{ $user->email }}</td>
                                <td>
                                    <a class="admin_delete_client_button" data-href="{{ URL::route('DeleteUser', $user->id) }}">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                                            Sterge acest client
                                        </button>
                                    </a>
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
