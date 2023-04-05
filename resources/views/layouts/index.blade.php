<!doctype html>
<html>
<head>
   @include('header')
</head>
<body>
<div class="">
   <header class="">
       @include('navbar')
   </header>
   <div id="main" class="">
           @yield('content')
   </div>
   <footer class="">
       @include('footer')
   </footer>
  
</div>

@yield('scripts')
</body>
</html>