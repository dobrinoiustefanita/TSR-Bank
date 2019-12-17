@extends('layouts.admin_lte') <!-- extend the layout file -->

@section('content') <!-- set up a section for content-->

    <h1 style="margin-left:20px">Edit Client Data</h1>

    <form role="form" enctype="multipart/form-data" method="post" action="{{route('EditClients')}}">
    @csrf

        {{ csrf_field() }}  
        <div style="display : flex; width: 100%">
            <div class="create_edit_left" style="padding : 20px; width: 50%">
                    <div class="field" >
                        <label class="label" for="firstname" style=" color:black ; font-size:larger" >First Name*</label>
                        <div class="control">
                            <input type="text" class="input" name="firstname" placeholder="First Name"  value="{{$current_client->firstname}}" 
                            style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                        </div>
                    </div>
    
                    <div class="field">
                        <label class="label" for="lastname" style=" color : black; font-size:larger">Last Name*</label>
                        <div class="control">
                            <input type="text" class="input" name="lastname" placeholder="Last Name"  value="{{$current_client->lastname}}"
                            style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
    
                    <div class="field">
                        <label class="label" for="email" style=" color : black; font-size:larger">Email*</label>
                        <div class="control">
                            <input type="text" class="input" name="email" placeholder="Email"  value="{{$current_client->email}}"
                            style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                        </div>
                    </div>
    
                    <div class="field">
                        <label class="label" for="phone_number" style=" color : black; font-size:larger">Phone Number*</label>
                        <div class="control">
                            <input type="text" class="input" name="phone_number" placeholder="Phone Number"  value="{{$current_client->phone_number}}" 
                            style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                        </div>
                    </div>
    
                    <div class="field">
                        <label class="label" for="fax" style=" color : black; font-size:larger">Fax</label>
                        <div class="control">
                            <input type="text" class="input" name="fax" placeholder="Fax"  value="{{$current_client->fax}}" 
                            style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="create_edit_right" style="padding : 20px; width: 50%">
    
                <div class="field">
                    <label class="label" for="street" style=" color : black; font-size:larger">Street*</label>
                    <div class="control">
                        <input type="text" class="input" name="street" placeholder="Street"  value="{{$current_client->street}}" 
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>
                
                <div class="field">
                    <label class="label" for="number" style=" color : black; font-size:larger">Number*</label>
                    <div class="control">
                        <input type="number" class="input" name="number" placeholder="Number"  value="{{$current_client->number}}" 
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>
    
                <div class="field">
                    <label class="label" for="city" style=" color : black; font-size:larger">City*</label>
                    <div class="control">
                        <input type="text" class="input" name="city" placeholder="City"  value="{{$current_client->city}}" 
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>
    
                <div class="field">
                    <label class="label" for="country" style=" color : black; font-size:larger">Country*</label>
                    <div class="control">
                        <input type="text" class="input" name="country" placeholder="Country"  value="{{$current_client->country}}" 
                        style=" width : 100%; font-size: large; font-weight:600;border-radius:10px">
                    </div>
                </div>
    
                    
            </div>
        </div>

        <div>
                <button type="submit" class="btn btn-block btn-success btn-sm" style="width : inherit; margin-left:20px">Edit Client</button>
        </div>
     </form>
    

@endsection