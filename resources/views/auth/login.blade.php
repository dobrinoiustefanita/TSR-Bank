@extends('layouts.non-app')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            Sign<b>IN</b>
        </div>
    <div class="login-box-body">
            <p class="login-box-msg">Log in</p>
                 
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group has-feedback">
                    

                    
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail adress" autofocus>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-red">{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        

                        <div class="form-group has-feedback">
                           

                         
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     
                        <div class="row">
                        <div class="col-xs-8">
                        <div class="checkbox icheck">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class>
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        

                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    Sign In
                                </button>
                            </div>
                        </div> 
                       
                    </form>
                    
                    @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
        
    </div>
</div>

</body>
@endsection



@push('styles')
    <script src="/select2.css"></script>
@endpush

@push('scripts')
    <script src="/select2.js"></script>
@endpush

@push('custom-scripts')
    <script src="/example.js"></script>
@endpush