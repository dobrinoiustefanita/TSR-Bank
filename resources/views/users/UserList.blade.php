@extends('layouts.admin_lte')

@section('content')

<div class="box-header with-border">
   <h3 class="box-title">INVITE MEMBER</h3>
</div>
<div class="box box-info" style="width:40%;">
    <form  method="POST" action="{{route('sendMail')}}">
        @csrf

        <div class="form-group" style="width:90%;">
            <label for="email" style="margin-top: 10px; margin-left:10px">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control" name="email" placeholder="email" style="margin-left:10px" required>
            
        </div>
        <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; margin-left:10px">Send Mail</button>
                    

</form>
</div>
@endsection