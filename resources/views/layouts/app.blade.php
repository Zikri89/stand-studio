
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Spica Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../../vendors/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="../../../vendors/sweetalert/css/sweetalert2.min.css">
  <link rel="stylesheet" href="../../../vendors/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../../vendors/datetimepicker/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="../../../vendors/dataTable/css/datatables.min.css"/>

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../css/style.css">
  <link rel="stylesheet" href="../../../css/custome.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../images/favicon.png" />
</head>
<body>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    @include('partials._sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      @include('partials._navbar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        @include('partials._footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="../../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../../vendors/fontawesome/js/fontawesome.min.js"></script>
  <script src="../../../vendors/sweetalert/js/sweetalert2.all.min.js"></script>
  <script src="../../../vendors/select2/js/select2.min.js"></script>
  <script src="../../../vendors/select2/js/script.js"></script>
  <script src="../../../vendors/sweetalert/js/toast.js"></script>
  <script src="../../../vendors/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="../../../vendors/dataTable/js/datatables.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../../../vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../../js/off-canvas.js"></script>
  <script src="../../../js/hoverable-collapse.js"></script>
  <script src="../../../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../../../js/dashboard.js"></script>
  <script src="../../../js/product.js"></script>
  <script src="../../../js/tracking.js"></script>
  <!-- End custom js for this page-->
</body>

</html>