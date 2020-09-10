<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <base href="">

  <link href="backend/img/logo/logo.png" rel="icon">
  <title>Login vue</title>
 <link rel="stylesheet" type="text/css" href="css/app.css">
  <link href="backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="backend/css/ruang-admin.min.css" rel="stylesheet">
  <link href="backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="app">

    <index></index>

  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="js/app.js"></script>
  <script src="backend/vendor/jquery/jquery.min.js"></script>
  <script src="backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <script type="text/javascript">
     let token = localStorage.getItem('token');
     if (token) {
      $("#sidebar").css("display","");
      $("#topbar").css("display","");

     }
   </script>

  <script src="backend/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="backend/js/ruang-admin.min.js"></script>
  <script src="backend/vendor/chart.js/Chart.min.js"></script>
  <script src="backend/js/demo/chart-area-demo.js"></script>

  <script src="backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="backend/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Page level plugins -->
  <script src="backend/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>
