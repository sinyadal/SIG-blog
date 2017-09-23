<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._head')
</head>

<style>
body 
{
  padding-top: 0px;
    background: #5C5757; 
}
</style>

<body>
    
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="padding-top:15%;">
            <div class="panel panel-default">
                <div class="panel-heading"><h5 style="text-align:center;"">Login</h5></div>
                <div class="panel-body">
                <br>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-10 col-md-offset-1">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                                <br>
                            </div>
                            <div class="col-md-6 col-md-offset-1">
                                <a href="{{ route('password.request') }}" class="btn btn-link">Forgot Password?</a>
 
                            </div>
                            <div class="col-md-4">
                            <a href="/" class="btn btn-link btn-block">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('partials._javascript')

@yield('script')

</body>
</html>





