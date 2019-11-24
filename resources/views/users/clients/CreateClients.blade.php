@extends('layouts.admin_lte') <!-- extend the layout file -->

@section('content') <!-- set up a section for content-->

    <h1>Creeaza client</h1>

    <form method="POST" action="/create_clients">

        {{ csrf_field() }}  
        <div style="display : flex">
            <div class="create_edit_left" style="padding : 20px">
                <div class="field">
                    <label class="label" for="firstname" style=" color : black">First Name</label>
                    <div class="control">
                        <input type="text" class="input" name="firstname" placeholder="First Name"  value="{{old('firstname')}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="lastname" style=" color : black">Last Name</label>
                    <div class="control">
                        <input type="text" class="input" name="lastname" placeholder="Last Name"  value="{{old('lastname')}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="email" style=" color : black">Email</label>
                    <div class="control">
                        <input type="text" class="input" name="email" placeholder="Email"  value="{{old('email')}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="phone_number" style=" color : black">Phone Number</label>
                    <div class="control">
                        <input type="text" class="input" name="phone_number" placeholder="Phone Number"  value="{{old('phone_number')}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="fax" style=" color : black">Fax</label>
                    <div class="control">
                        <input type="text" class="input" name="fax" placeholder="Fax"  value="{{old('fax')}}">
                    </div>
                </div>
            </div>

            <div class="create_edit_right" style="padding : 20px">

                <div class="field">
                    <label class="label" for="street" style=" color : black">Street</label>
                    <div class="control">
                        <input type="text" class="input" name="street" placeholder="Street"  value="{{old('street')}}">
                    </div>
                </div>
            
                <div class="field">
                    <label class="label" for="number" style=" color : black">Number</label>
                    <div class="control">
                        <input type="number" class="input" name="number" placeholder="Number"  value="{{old('number')}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="city" style=" color : black">City</label>
                    <div class="control">
                        <input type="text" class="input" name="city" placeholder="City"  value="{{old('city')}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="country" style=" color : black">Country</label>
                    <div class="control">
                        <input type="text" class="input" name="country" placeholder="Country"  value="{{old('country')}}">
                    </div>
                </div>

                
            </div>
        </div>
        
        

        
        <div>
            <button type="submit">Done</button>
        </div>
     </form>
    

@endsection