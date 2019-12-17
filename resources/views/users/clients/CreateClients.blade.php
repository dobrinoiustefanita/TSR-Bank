@extends('layouts.admin_lte') <!-- extend the layout file -->

@section('content') <!-- set up a section for content-->

    <h1>Creeaza client</h1>

    <form method="POST" action="{{route('CreateClients')}}">

        {{ csrf_field() }}  
        <div style="display :flex ;  width: 100%">
            <div class="create_edit_left" style=" width: 50% ; padding : 20px">
                <div class="field" style="width:100%">
                    <label class="label" for="firstname" style=" color : black; font-size:larger">First Name*</label>
                    <div class="control" >
                        <input type="text" class="input" name="firstname" placeholder="First Name"  value="{{old('firstname')}}" 
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="lastname" style=" color : black; font-size:larger">Last Name*</label>
                    <div class="control">
                        <input type="text" class="input" name="lastname" placeholder="Last Name"  value="{{old('lastname')}}"
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="email" style=" color : black; font-size:larger">Email*</label>
                    <div class="control">
                        <input type="text" class="input" name="email" placeholder="Email"  value="{{Auth()->user()->email}}"
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="phone_number" style=" color : black; font-size:larger">Phone Number*</label>
                    <div class="control">
                        <input type="text" class="input" name="phone_number" placeholder="Phone Number"  value="{{old('phone_number')}}"
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="fax" style=" color : black; font-size:larger">Fax</label>
                    <div class="control">
                        <input type="text" class="input" name="fax" placeholder="Fax"  value="{{old('fax')}}"
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>
            </div>

            <div class="create_edit_right" style="padding : 20px; width: 50%;">

                <div class="field">
                    <label class="label" for="street" style=" color : black; font-size:larger">Street*</label>
                    <div class="control">
                        <input type="text" class="input" name="street" placeholder="Street"  value="{{old('street')}}"
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>
            
                <div class="field">
                    <label class="label" for="number" style=" color : black; font-size:larger">Number*</label>
                    <div class="control">
                        <input type="number" class="input" name="number" placeholder="Number"  value="{{old('number')}}"
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="city" style=" color : black; font-size:larger">City*</label>
                    <div class="control">
                        <input type="text" class="input" name="city" placeholder="City"  value="{{old('city')}}"
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="country" style=" color : black ; font-size:larger">Country</label>
                    <div class="control">
                        <input type="text" class="input" name="country" placeholder="Country"  value="{{old('country')}}"
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>

                
            </div>
        </div>
        
        

        
        <div>
            <button type="submit" class="btn btn-block btn-success btn-sm" style="width : inherit; margin-left:20px">Create Client</button>
        </div>
     </form>
    

@endsection