<!-- Navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container col-md-6 col-md-offset-3">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
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

      <li class=""><a href="{{ route('login') }}">LOGIN</a></li>

      @endif

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>