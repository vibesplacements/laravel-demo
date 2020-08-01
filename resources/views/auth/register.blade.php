@extends('auth.authlayout')

@section('content')

    <p class="login-box-msg"><b>Register</b> </p>

    <form role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} has-feedback">
            <input type="text" class="form-control" placeholder="First name" name="first_name" value="{{ old('first_name') }}">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

            @if ($errors->has('first_name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} has-feedback">
            <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{ old('last_name') }}">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

            @if ($errors->has('last_name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} has-feedback">
            <input type="number" class="form-control" placeholder="Phone" name="phone" value="{{ old('email') }}">
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>

            @if ($errors->has('phone'))
                    <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" >
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>

            @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-8">
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <div class="row" style="margin:20px 0 10px 0px;">
      <a href="{{url('login')}}" class="text-center" >Login</a>
    </div>
@endsection
