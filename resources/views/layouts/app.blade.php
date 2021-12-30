<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{config('app.name')}} - {{Route::currentRouteName()}}</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
  {{-- Sidebar --}}
    @include('components.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

       <!-- Main Content -->
      <div id="content">
        @include('components.navbar')
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        @yield('content')
      </div>
    {{-- End of Begin Page Content --}}
    </div>
    {{-- End of Main Content --}}

    {{-- Footer --}}
    @include('components.footer')
    {{-- End of Footer --}}
    </div>
    <!-- End Content Wrapper -->

{{-- End of Page Wrapper --}}
  </div>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
     <!-- Logout Modal -->
     @include('components.modal')
   <!-- Bootstrap core JavaScript-->
   <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

   <!-- Core plugin JavaScript-->
   <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

</body>

</html>