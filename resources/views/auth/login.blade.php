<!DOCTYPE html>
<html>

<head>
    @include('template.partials._head')
</head>

<body class="hold-transition login-page" style="background: #3d902b;">
    <div class="container">
        <div class="card">
            <div class="login-box">
                <div class="login-logo">
                    <a href="#" style="color:#ffff;"><b>Login</a>
                </div>
                <div class="login-box-body">
                    <p class="login-box-msg" style="color:#666 !important;">Sign in to start your session</p>
        
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="email">
        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="passoword">
        
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-3">
                                <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
                            </div>
                        </div>
                            {{--  <div class="col-xs-8">
                                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                            </div>  --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('template.partials._script')
</body>

</html>
