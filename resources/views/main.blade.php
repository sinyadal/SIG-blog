<!DOCTYPE html>
  <html lang="en">

  <head>
    @include('partials._head')
  </head>
    
  <body>

    @include('partials._nav')

    @include('partials._messages')
    
    @yield('content') <!-- about, contact, home -->

    @include('partials._footer')

    @include('partials._javascript')

    @yield('script')
    
  </body>
</html>