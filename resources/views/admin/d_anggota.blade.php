<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

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
      <li class="nav-item active">
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
      <li class="nav-item">
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
            <h1 class="h3 mb-0 text-gray-800">Tabel Anggota</h1>
          </div>
          <button class="btn btn-success d-block" type="button" href="#" data-toggle="modal" data-target="#tambahAnggotaModal">
            <i class="fas fa-address-book  fa-sm fa-fw mr-2 text-white-400"></i>
            Tambah Data Anggota
          </button>
          <br>

          <!-- Content Row SCPK -->
          <table class="table table-hover table-responsive-lg">
            <thead>
              <tr class="text-dark">
                <th scope="col">No</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Nomor HP</th>
              </tr>
            </thead>
            <tbody>
              @if($anggotas->isEmpty() == false)
                @foreach($anggotas as $index => $anggota)
                <tr>
                  <th scope="row">{{ $index +1 }}</th>
                  <td>{{ $anggota->nama_anggota }}</td>
                  <td>{{ $anggota->jenis_kelamin }}</td>
                  <td>{{ $anggota->alamat }}</td>
                  <td>{{ $anggota->nama_jabatan }}</td>
                  <td>{{ $anggota->nomor_hp }}</td>
                  @if(auth()->user()->role == "superadmin")
                  <td>
                    <form class="d-inline">
                      <button type="button" id="edit" class="btn btn-warning btn- py-0 d-inline" data-id_anggota="{{ $anggota->id_anggota }}" data-nama_anggota="{{ $anggota->nama_anggota }}" data-jenis_kelamin="{{ $anggota->jenis_kelamin }}" data-alamat="{{ $anggota->alamat }}" data-id_jabatan="{{ $anggota->id_jabatan }}" data-nomor_hp="{{ $anggota->nomor_hp }}" data-toggle="modal" data-target="#editAnggotaModal">Edit</button>
                    </form>
                    <form class="d-inline">
                      <button type="button" id="{{ $anggota->id_anggota }}" name="{{ $anggota->nama_anggota }}" class="btn btn-danger btn- py-0 deleted d-inline">Hapus</button>
                    </form>
                  </td>
                  @endif
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>

      </div>
      <!-- End of Main Content -->      

    </div>
    <!-- End of Content Wrapper -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container-fluid my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Your Website 2019</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

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

  <!-- Tambah Anggota Modal-->
  <div class="modal fade" id="tambahAnggotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{-- url('/d_anggota') --}}" method="post" id="postAnggota" autocomplete="off">
            @method('post')
            @csrf
            <div class="form-group">
              <label for="nama_anggota">Nama</label>
              <input type="text" id="nama_anggota" name="nama_anggota" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name...">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
              <label class="d-block" for="jenis_kelamin">Jenis Kelamin</label>
              <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" class="custom-control-input" id="customRadio" name="jenis_kelamin" value="Laki-Laki">
                <label class=" custom-control-label" for="customRadio">Laki-Laki</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" class="custom-control-input" id="customRadio2" name="jenis_kelamin" value="Perempuan">
                <label class="custom-control-label" for="customRadio2">Perempuan</label>
              </div>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" id="alamat" placeholder="e.g. I Love Cats." name="alamat"></textarea>
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <select class="form-control @error('id_jabatan') is-invalid @enderror" id="id_jabatan" name="id_jabatan">
                  @foreach( $jabatans as $jabatan )
                  <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                  @endforeach
              </select>
              @error('id_jabatan')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nomor_hp">Nomor HP</label>
              <input type="text" id="nomor_hp" name="nomor_hp" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" value="submit" >Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Anggota Modal-->
  <div class="modal fade" id="editAnggotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Anggota</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{-- url('/d_anggota') --}}" method="post" id="patchAnggota" autocomplete="off">
            @method('patch')
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nama_anggota">Nama</label>
              <input type="hidden" id="id_anggota" name="id_anggota">
              <input type="text" id="nama_anggota" name="nama_anggota" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name...">
            </div>
            <div class="form-group">
              <label class="d-block" for="jenis_kelamin">Jenis Kelamin</label>
              <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" class="custom-control-input" id="Laki-Laki" name="jenis_kelamin" value="Laki-Laki">
                <label class=" custom-control-label" for="customRadio">Laki-Laki</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input required type="radio" class="custom-control-input" id="Perempuan" name="jenis_kelamin" value="Perempuan">
                <label class="custom-control-label" for="customRadio2">Perempuan</label>
              </div>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" id="alamat" placeholder="e.g. I Love Cats." name="alamat"></textarea>
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <select class="form-control @error('id_jabatan') is-invalid @enderror" id="id_jabatan" name="id_jabatan">
                  @foreach( $jabatans as $jabatan )
                  <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                  @endforeach
              </select>
              @error('id_jabatan')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nomor_hp">Nomor HP</label>
              <input type="text" id="nomor_hp" name="nomor_hp" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <button class="btn btn-primary" type="submit" value="submit" >Submit</button>
          </div>
        </form>
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

  <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
  
  <!-- alert -->
  <script src="{{ asset('assets/vendor/SweetAlert2/sweetalert2.js') }}"></script>

</body>

</html>

<script>
  $('#postAnggota').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
          url: "{{ url('/d_anggota') }}",
          method: 'post',
          data: $('#postAnggota').serialize(),

          // dataType: 'JSON',
          cache: false,
          success: function(response) {
            // swal("Success!", val, "success");
            res = response.responseJSON;
            console.log(res);
            window.location.href = "{{ url('/d_anggota') }}";
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

  let get_id;
  $('#editAnggotaModal').on('show.bs.modal', function (event){
    
    let button = $(event.relatedTarget);
    let id_anggota = button.data('id_anggota');
    get_id = id_anggota;
    let nama_anggota = button.data('nama_anggota');
    let jenis_kelamin = button.data('jenis_kelamin');
    let alamat = button.data('alamat');
    let id_jabatan = button.data('id_jabatan');
    let nomor_hp = button.data('nomor_hp');

    let modal = $(this);
    modal.find('.modal-body #id_anggota').val(id_anggota);
    modal.find('.modal-body #nama_anggota').val(nama_anggota);
    modal.find('.modal-body #alamat').val(alamat);
    modal.find('.modal-body #nomor_hp').val(nomor_hp);

    modal.find('.modal-body input[name="jenis_kelamin"]:checked').prop('checked', false);
    modal.find('.modal-body input[name="jenis_kelamin"][value="'+jenis_kelamin+'"]').prop('checked',true);

    modal.find(".modal-body #id_jabatan option[value="+id_jabatan+"]").attr('selected', 'selected');
  
  });

  $('#patchAnggota').on('submit', function(e) {
      e.preventDefault();

      let url = "{{ url('/d_anggota') }}" + "/" + get_id + "/update";

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          url: url,
          method: 'patch',
          data: $('#patchAnggota').serialize(),
          cache: false,
          success: function(response) {
            res = response.responseJSON;
            console.log(res);
            Swal.fire('Berhasil!', 'Data anggota berhasil di update.', 'success').then(function(){
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
      let url = "{{ url('/d_anggota') }}" + "/" + id + "/destroy";

      Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Ingin Menghapus Anggota bernama " + name + " ?",
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


</script>