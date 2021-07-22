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
        <a class="nav-link" href="{{ url('/dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Nav Item - Data Anggota -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/d_anggota') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Anggota</span></a>
      </li>

      <!-- Nav Item - Data Balita -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/d_balita') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Balita</span></a>
      </li>

      <!-- Nav Item - KMS -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/d_kms') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>KMS</span></a>
      </li>

      <!-- Nav Item - Grafik Balita -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/d_grafik') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Grafik Balita</span></a>
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
                <a class="dropdown-item" href="{{ url('/d_akun') }}">
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
            <h1 class="h3 mb-0 text-gray-800">Tabel KMS Semua Balita</h1>
          </div>
          <button class="btn btn-success d-block" type="button" href="#" data-toggle="modal" data-target="#tambahKMSModal">
            <i class="fas fa-address-book  fa-sm fa-fw mr-2 text-white-400"></i>
            Tambah Data KMS
          </button>
          <br>

          <!-- Tabel Content KMS -->
          <table class="table table-hover table-responsive-lg" id="dataKMS">
            <thead>
              <tr class="text-dark">
                <th scope="col">No</th>
                <th scope="col">Nama Balita</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Umur</th>
                <th scope="col">Berat Badan</th>
                <th scope="col">Z-Score</th>
                <th scope="col">Status Gizi</th>
                <!-- <th scope="col">Alamat Orangtua</th>
                <th scope="col">Nomor HP</th> -->
              </tr>
            </thead>
            <tbody>
              @if($kms->isEmpty() == false)
                @foreach($kms as $index => $value)
                <tr>
                  <th scope="row">{{ $index +1 }}</th>
                  <td class="d-none">{{ $value->id }}</td>
                  <td>{{ $value->nama }}</td>
                  <td>{{ $value->jenis_kelamin }}</td>
                  <td>{{ $value->umur }}</td>
                  <td>{{ $value->berat_badan }}</td>
                  <td>{{ $value->z_score }}</td>
                  <td>{{ $value->status_gizi }}</td>
                  <td>
                    <form class="d-inline-block">
                      <button type="button" id="edit" class="btn btn-warning btn- py-0 d-inline" data-id="{{ $value->id }}" data-berat_badan="{{ $value->berat_badan }}" data-nama="{{ $value->nama }}" data-toggle="modal" data-target="#editKmsModal">Edit</button>
                    </form>
                    @if(auth()->user()->role == "superadmin")
                    <form class="d-inline-block">
                      <button type="button" id="{{ $value->id }}" name="{{ $value->nama }} di umur {{ $value->umur }}" class="btn btn-danger btn- py-0 deleted d-inline">Hapus</button>
                    </form>
                    @endif
                  </td>
                  <td>
                    
                  </td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>

          <!-- Content Row -->
          <!-- <div class="row">
          </div> -->

          <!-- Content Row Chart -->

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

  <!-- Tambah Data Kms Modal-->
  <div class="modal fade" id="tambahKMSModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data KMS</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ url('/d_kms') }}" method="post" autocomplete="off" id="postKMS">
            @method('post')
            <div class="form-group">
              <label for="nama">Nama Balita</label>
              <input type="text" id="id_balita" name="id_balita" class="form-control"  style="display:none;" id="exampleFormControlInput1" placeholder="Enter your name...">
              <input type="text" id="nama" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name...">
              <div id="nama_list" style="z-index:30 !important;">
              </div>              
              {{ csrf_field() }}
            </div>
            <div class="form-group">
              <label for="berat_badan">Berat Badan</label>
              <input type="text" id="berat_badan" name="berat_badan" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name...">
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button class="btn btn-secondary" type="submit">Submit</button>
          </form>
          <!-- <a class="btn btn-primary" href="{{ url('/logout') }}">Keluar</a> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Data Kms Modal-->
  <div class="modal fade" id="editKmsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data KMS</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{-- url('/d_kms') --}}" method="post" autocomplete="off" id="patchKMS">
            @method('patch')
            {{ csrf_field() }}
            <div class="form-group">
              <label class="d-block" for="nama" id="nama_balita">Nama Balita :</label>
              <hr>
              <label for="berat_badan">Berat Badan</label>
              <input type="hidden" id="id" name="id">
              <input type="text" id="berat_badan" name="berat_badan" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button class="btn btn-secondary" type="submit">Submit</button>
          </form>
          <!-- <a class="btn btn-primary" href="{{ url('/logout') }}">Keluar</a> -->
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

<!-- alert -->
  <script src="{{ asset('assets/vendor/SweetAlert2/sweetalert2.js') }}"></script>

</body>

</html>

<script>
$(document).ready(function(){

  $('#nama').keyup(function(){ 
      let query = $(this).val();
      if(query != '')
      {
       let _token = $('input[name="_token"]').val();
       $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
            $('#nama_list').fadeIn();  
            $('#nama_list').html(data);
          }
       });
      }
      else{
        $('.nama_list').remove();
      }
  });

  $(document).on('click', 'li', function(){
      let id = $(this).attr('id');
      // console.log(id);  
      $('#nama').val($(this).text());
      $('#id_balita').val(id);
      $('#nama_list').fadeOut();  
  });

  $('#postKMS').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: "{{ url('/d_kms') }}",
        method: 'post',
        data: $('#postKMS').serialize(),
        cache: false,
        success: function(response) {
          res = response.responseJSON;
          console.log(res);
          window.location.href = "{{ url('/d_kms') }}";
        },
        error: function(xhr) {
          var res = '';
          res = xhr.responseJSON;
          console.log(res);
          if ($.isEmptyObject(res) == false) {
            $.each(res.errors, function(key, val) {
              Swal.fire("Invalid!", val, "error");
            });
          }
        }
    });
  });

  let get_id;
  $('#editKmsModal').on('show.bs.modal', function (event){

    let button = $(event.relatedTarget);
    let id = button.data('id');
    get_id = id;
    let nama = button.data('nama');
    let berat_badan = button.data('berat_badan');

    let modal = $(this);
    console.log(get_id);

    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #nama_balita').text("Nama Balita : " + nama);
    modal.find('.modal-body #berat_badan').val(berat_badan);
  
  });

  $('#patchKMS').on('submit', function(e) {
      e.preventDefault();

      let url = "{{ url('/d_kms') }}" + "/" + get_id + "/update";

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          url: url,
          method: 'patch',
          data: $('#patchKMS').serialize(),
          cache: false,
          success: function(response) {
            res = response.responseJSON;
            console.log(res);
            Swal.fire('Berhasil!', 'Data balita berhasil di update.', 'success').then(function(){
              location.reload();
            });
          },
          error: function(xhr) {
            let text = '';
            let res = '';
            res = xhr.responseJSON;
            console.log(res);
            if ($.isEmptyObject(res) == false) {
              $.each(res.errors, function(key, val) {
                Swal.fire("Invalid!", val, "error");
              });
            }
          }
      });
  });

  $(document).on('click', '.deleted', function (){

      let id = $(this).attr('id');
      let name = $(this).attr('name');
      let url = "{{ url('/d_kms') }}" + "/" + id + "/destroy";

      Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Ingin Menghapus Data KMS bernama " + name + " ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {

        if (result.value) {
          
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
              url: url,
              method: 'delete',
              cache: false,

              success: function(response) {
                // console.log(response);
                Swal.fire('Deleted!', 'Your file has been deleted.', 'success').then(function(){
                  location.reload();
                });
              },

              error: function(xhr) {
                res = xhr.responseJSON;
                if ($.isEmptyObject(res) == false) {
                  $.each(res.errors, function(key, val) {
                    Swal.fire("Invalid!", val, "error");
                  });
                }
              }
          });
        }
      });
  });

  {{--
  function addRowHandlers() {
    let table = document.getElementById("dataKMS");
    let rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
      let currentRow = table.rows[i];
      let createClickHandler = function(row) {
        return function() {
          try {
            let cell = row.getElementsByTagName("td")[0];
            let id = cell.innerHTML;
            chartKMS(id);
          } catch (error) {
            console.log(error);
          }
        };
      };
      currentRow.onclick = createClickHandler(currentRow);
    }
  }
  window.onload = addRowHandlers();

  function chartKMS(id) {
    console.log(id);
    let _token = $('meta[name="csrf-token"]').attr('content');

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    $.ajax({
      url:"{{ route('kms.chart') }}",
      method:"POST",
      data:{id:id, _token:_token},
      success:function(data){
        console.log(data)
        // $('#nama_list').fadeIn();  
        // $('#nama_list').html(data);
      }
    });
  } 
  --}}
    
});

</script>