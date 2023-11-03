@extends('layout.head')
  <!-- Header Content End -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- Page Content Start -->
@yield('content')
  <!-- Page Content End -->

  <!-- Footer Section Start -->
 @include('layout.footer')
