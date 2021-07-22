<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Posyandu</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/u_index') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Aktivitas Posyandu</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Nav Item - Data Anggota -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/d_grafik_anak') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Grafik Gizi Anak</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ url('/user') }}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Data Diri
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Grafik KMS Terkini</h1>
          </div>

          <!-- Content Row Chart -->
          <!-- <div class="d-none" id="containerChart"> -->
            <div class="row d-true" id="lineChartKMSDIV">

              <!-- Area Chart -->
              <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <!-- <div class="chart-area"> -->
                      <canvas class="d-flex" id="lineChartKMS"></canvas>
                    <!-- </div> -->
                  </div>
                </div>
              </div>

              <!-- Pie Chart -->
              <div class="col-xl-4 col-lg-5  d-none" id="detailChartCard">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail KMS</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="pt-4 pb-2">
                      <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Umur :
                      </span>
                      <p class="float-right" id="umurDetail"></p>
                    </div>
                    <div class="pt-4 pb-2">
                      <span class="mr-2">
                        <i class="fas fa-circle text-secondary"></i> Status Gizi :
                      </span>
                      <p class="float-right" id="statusgiziDetail"></p>
                    </div>
                    <div class="pt-4 pb-2">
                      <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Tanggal Input :
                      </span>
                      <p class="float-right" id="tanggalKmsDetail"></p>
                    </div>
                    <div class="pt-4 pb-2">
                      <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> Berat :
                      </span>
                      <p class="float-right" id="beratDetail"></p>
                    </div>
                    <div class="pt-4 pb-2">
                      <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Z-Score :
                      </span>
                      <p class="float-right" id="z_scoreDetail"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- </div> -->

          <!-- </div> -->

        </div>
        <!-- /.container-fluid -->

      </div>
      
      
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Jika anda keluar maka aktivitas anda akan di akhiri.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="{{ url('/logout') }}">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

  <!-- chartjs -->
  <script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- alert -->
  <script src="{{ asset('assets/vendor/SweetAlert2/sweetalert2.js') }}"></script>
  <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->


</body>

</html>
<script>
$(document).ready(function(){  

  var ctx = document.getElementById('lineChartKMS').getContext('2d');
  var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: 
      {
          labels: {!! json_encode($categories) !!},
          datasets: [{
              label: "Berat ",
              // backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(' + (Math.floor(Math.random() * 200) + 20) + ', ' + (Math.floor(Math.random() * 200) + 20) + ', ' + (Math.floor(Math.random() * 200) + 20) + ')',
              data: {!! json_encode($berat) !!},
          }]
      },

      // Configuration options go here
      options: {
        title: {
            display: true,
            text: 'Laporan Grafik KMS ' + {!! json_encode($nama) !!}
        },
        'onClick' : function (evt, item) {
                        // console.log ('legend onClick', evt);
                        // console.log('legd item', item);
                        let kms = {!! json_encode($kms) !!};
                        // console.log(kms[item[0]._index]);
                        try {
                          detailChart(kms, item[0]._index);
                        }
                        catch(err) {
                          console.log(err);
                        }
        },
        animation: {
          duration: 0 // general animation time
        },
        hover: {
            animationDuration: 0 // duration of animations when hovering an item
        },
        elements: {
            line: {
                tension: 0 // disables bezier curves
            }
        },
        responsiveAnimationDuration: 0 // animation duration after a resize
      }
  });

  function detailChart(detail, index){
    // console.log(detail);
    // console.log(new Date(detail.kms[index].created_at));
    $( "#detailChartCard" ).removeClass( "d-none" );
    $( "#detailChartCard" ).addClass( "d-flex" );
    var today = new Date(detail[index].created_at);
    var dd = today.getDate();

    var mm = today.getMonth()+1; 
    var yyyy = today.getFullYear();
    if(dd<10) 
    {
        dd='0'+dd;
    } 

    if(mm<10) 
    {
        mm='0'+mm;
    }

    statusgizi = detail[index].status_gizi;
    tanggalKms = dd+'-'+mm+'-'+yyyy;
    berat = detail[index].berat_badan;
    z_score = detail[index].z_score;
    umur = detail[index].umur;
    
    // console.log(detail.kms[index])
    
    detailChartDiv(umur, statusgizi, tanggalKms, berat, z_score);
    
  }

  function detailChartDiv(umur, statusgizi, tanggalKms, berat, z_score){
    $('p#umurDetail').text(umur + " Bulan");
    $('p#statusgiziDetail').text(statusgizi);
    $('p#tanggalKmsDetail').text(tanggalKms);
    $('p#beratDetail').text(berat + " Kg");
    $('p#z_scoreDetail').text(z_score + " SD");
    // console.log(umur + " " + statusgizi + " " + tanggalKms + " " + berat + " " + z_score);
  }
    
});
</script>