@extends('layouts.admin_lte')

@section('content')

<div class="box-header with-border">
   <h3 class="box-title">INVITE MEMBER</h3>
</div>
<div class="box-body">
            <form  method="POST" action="{{route('sendMail')}}">
             @csrf

                 <div class="form-group" style="width:250px;">
                  <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control" name="email" placeholder="email" required>
                 
                    </div>
                 
        
        <button type="submit" class="btn btn-primary">Send Mail</button>
                    
    </div>
    </form>
</div>
@endsection