@extends('layouts.non-app')

@section('content')
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <b>Sign</b>UP
        </div>
        <div class="register-box-body">
            <p class="login-box-msg">Register a new member</p>
    
                    <form method="POST"  action="{{ route('UserRegister',['id' => $user->id]) }}">
                        @csrf
                        
                        <div class="form-group has-feedback">
                            
                            
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full name">
                                
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        
                                @error('name')
                                
                                    <span class="help-block" role="alert">
                                        <strong class="text-red">{{ $message }}</strong>
                                    </span> 
                               
                                @enderror
                         
                        </div>

                        <div class="form-group has-feedback">
                               
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                                
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          
                                @error('email')
                                    <span class="help-block has-error"  role="alert">
                                        <strong class="text-red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     

                        <div class="form-group has-feedback">
                               
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        
                                @error('password')
                                    <span class="help-block has-error" role="alert">
                                        <strong class="text-red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     

                        <div class="form-group has-feedback">
                                
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
                           
                                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            </div>
                         
                        
                        <div class="row">
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    Register
                                </button>
                            </div>
                            </div>
                        
                    </form>
            
        </div>
    </div>
        </body>
@endsection
