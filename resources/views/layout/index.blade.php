<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>
      @yield('headtitle')
  </title>
  <!-- Bootstrap core CSS-->
    @include('layout/link')
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    @if(Auth::guard('admin'))
    @include('layout/navbar')
    @endif

    @include('layout/headernav')
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <!-- Icon Cards-->
      <!-- Area Chart Example-->
      <div class="page-content">

        <div class="page-header breadcrumb">
            @yield('header')
        </div>

        <div class="content">

            @yield('content')

        </div>


      </div>


    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        @include('layout/footer')
      </div>
    </footer>


    <!-- Bootstrap core JavaScript-->
      @include('layout/scripts')

      @stack('scripts')
  </div>
  </div>
</body>

</html>
