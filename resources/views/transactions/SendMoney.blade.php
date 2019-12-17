@extends('layouts.admin_lte')

@section('content')

<div class="box-header with-border">
    <h3 class="box-title" style="font-family: fantasy; color:orange">Please Specify details of the beneficiary:</h3>
 </div>
 <div class="box box-warning" style="width:40%;">
             <form  method="POST" action="{{route('SendMoney')}}">
              @csrf
 
                <div class="form-group" style="width:90%; margin-top:10px; margin-left:10px">
                    <label for="beneficiary_name">{{ __('Beneficiray Name *') }}</label>
                    <input id="beneficiary_name" type="text" class="form-control" name="beneficiary_name" placeholder="Beneficiray Name" required>
                </div>

                <div class="form-group" style="width:90%; margin-left:10px">
                    <label for="email">{{ __('iBan *') }}</label>
                    <input id="iban" type="text" class="form-control" name="iban" placeholder="Iban" required>
                </div>

                <div class="form-group" style="width:90%; margin-left:10px">
                    <label for="amount">{{ __('Amount*') }}</label>
                    <input id="amount" type="number" class="form-control" name="amount" placeholder="Amount" required>
                </div>

                <div class="form-group" style="width:90%; margin-left:10px">
                    <label for="address">{{ __('Address') }}</label>
                    <input id="address" type="text" class="form-control" name="address" placeholder="Address">
                </div>

                <div class="form-group" style="width:90%; margin-left:10px; margin-bottom:10px">
                    <label for="description">{{ __('Add a description') }}</label>
                    <input id="description" type="text" class="form-control" name="description" placeholder="Add a description">
                </div>
                @if($errors->any())
                <h4>{{$errors->first()}}</h4>
                @endif
                  
         
         <button type="submit" class="btn btn-primary" style="margin-left:10px;margin-bottom:10px">Send Money</button>
                     
     </div>
     </form>
 </div>

@endsection