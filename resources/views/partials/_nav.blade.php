<!-- Navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SIG BLOG</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="/">HOME</a></li> <!-- Terinary Operator/If else statement -->
        <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">BLOG</a></li>
        <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">ABOUT</a></li> <!-- Terinary Operator/If else statement -->
        <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">CONTACT</a></li> <!-- Terinary Operator/If else statement -->
      </ul>

      <ul class="nav navbar-nav navbar-right">

      @if(Auth::check())

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> HELLO {{ Auth::user()->name }}<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('posts.index') }}">DASHBOARD</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('logout') }}">LOGOUT</a></li>
          </ul>
        </li>

      @else

      <li><a data-toggle="modal" data-target="#login" >LOGIN</a></li>


      @endif

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

{{-- href="{{ route('login') }}" --}}




<!-- Login Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">


        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}





            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">

                <div>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <br>

            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">

                <div>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <br>
            <div class="">
                <div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>

          </div>
          <div class="modal-footer">
            <a href="{{ route('password.request') }}" type="button" class="btn btn-default">Forgot Password?</a>
            <button type="submit" type="button" class="btn btn-primary">Login</button>
          </div>
        </form>



    </div>
  </div>
</div>
