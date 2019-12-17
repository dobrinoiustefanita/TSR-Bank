@extends('layouts.admin_lte')

@section('content')

<div class="box-header with-border">
    <h3 class="box-title">Check your Balance</h3>
</div>
<div class="box box-success" style="width:100%; padding-left:10px; padding-right:10px" >

       <p>
              <div class="top-info" style="font-weight: 600; font-size: large;"> Current Account :</div>
              <div class="bot-info" style="text-align:right; margin-top: -20px; font-weight: 600; font-size: large;">Account balance: </div>
       </p>
       <p>
              <div class="top-info" style="font-weight: 600; font-size: large;">{{$user->iban}}</div> 
              <div class="bot-info" style="text-align:right; margin-top: -20px; font-weight: 600; font-size: large;"">{{$user->deposit}} RON</div>

       </p>
 </div>

<div><a href="{{route('ShowTransactionHistory')}}"><button class="btn btn-success">See your Transaction History</button></a></div>
@endsection