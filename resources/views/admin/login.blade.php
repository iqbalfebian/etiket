<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="robots" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
  <title>Masuk - Sistem Absensi</title>
  
  <!-- CSS files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="d-flex flex-column">
  <!-- Loading overlay -->
  <div id="loading">
    <div id="loading-circle"></div>
  </div>

  <div class="page page-center">
    <div class="row g-0 min-vh-100">
      <!-- Kolom Form Login -->
      <div class="col-md-7 d-flex align-items-center justify-content-center bg-white">
        <div class="card shadow rounded-4 p-4 w-100" style="max-width: 450px;">
          <div class="mb-4 text-center d-flex justify-content-center align-items-center gap-3">
            <img src="{{ asset('images/mwt.jpg') }}" height="50" alt="Logo MWT" class="rounded">
            <span class="mx-2">|</span>
            <div class="logo-text">
              <small>Sistem Absensi</small>
            </div>
          </div>

          @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <form id="login-form" action="{{ route('admin.login.post') }}" method="POST" class="row gy-3">
            @csrf
            <div class="col-12">
              <label class="form-label">Username</label>
              <input 
                type="text" 
                name="username" 
                id="username" 
                class="form-control" 
                placeholder="Username" 
                required
                autofocus
              >
            </div>
            <div class="col-12">
              <label class="form-label">Password</label>
              <div class="input-group">
                <input 
                  type="password" 
                  name="password" 
                  id="password" 
                  class="form-control" 
                  placeholder="Your password"
                  autocomplete="off" 
                  required
                  data-bs-toggle="password"
                >
              </div>
            </div>
            <div class="col-12">
              <label class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <span class="form-check-label">Ingat saya agar tidak perlu login kembali.</span>
              </label>
            </div>
            <div class="col-12">
              <button type="submit" name="submit" class="btn btn-success w-100 rounded-pill">
                Login
              </button>
            </div>
            <div class="col-12">
              <a href="{{ route('absen.index') }}" class="btn btn-outline-secondary w-100 rounded-pill">
                Back to Home
              </a>
            </div>
          </form>
        </div>
      </div>

      <!-- Kolom Keterangan Samping -->
      <div class="col-md-5 d-none d-md-block text-dark p-5 welcome-section">
        <h3 class="fw-bold mb-3">Selamat Datang</h3>
        <p class="mb-4">
          Hi Sobat MWT, Sekarang akun-mu dapat digunakan untuk berbagai aplikasi. 
          Silahkan pilih aplikasi lainnya di bawah ini. 👇
        </p>
        <div class="d-flex flex-column gap-3">
          <a href="https://sim.madawikri.co.id" target="_blank" title="Klik untuk buka SIMWT"
            class="text-decoration-none text-dark">
            <div class="d-flex align-items-center gap-2 clickable-link">
              <img src="{{ asset('images/logo_simmwt.jpg') }}" height="30" alt="SIMWT" class="clickable-img">
              <div>
                <strong>SIMWT</strong><br>
                <small class="text-muted">Sistem Informasi Manajemen</small>
              </div>
            </div>
          </a>
          <a href="https://rscm.madawikri.co.id" target="_blank" title="Klik untuk buka RSCM"
            class="text-decoration-none text-dark">
            <div class="d-flex align-items-center gap-2 clickable-link">
              <img src="https://sim.madawikri.co.id/assets/images/car-services.png" height="30" alt="RSCM" class="clickable-img">
              <div>
                <strong>RSCM</strong><br>
                <small class="text-muted">RM Sparepart Control Management</small>
              </div>
            </div>
          </a>
          <a href="https://sipirang.madawikri.co.id" target="_blank" title="Klik untuk buka SiPirang"
            class="text-decoration-none text-dark">
            <div class="d-flex align-items-center gap-2 clickable-link">
            <img src="https://sim.madawikri.co.id/assets/images/sipirang.svg" height="30" alt="SiPirang" class="clickable-img">
              <div>
                <strong>SiPirang</strong><br>
                <small class="text-muted">Sistem Peminjaman Ruangan</small>
              </div>
            </div>
          </a>
          <a href="#" title="Anda sudah berada di Sistem Absensi" class="text-decoration-none text-dark">
            <div class="d-flex align-items-center gap-2 clickable-link">
              <img src="{{ asset('images/barcode.png') }}" height="30" alt="E-TIKET" class="clickable-img">
              <div>
                <strong>E-TIKET</strong> 
                <span class="badge bg-success ms-2">Anda di sini</span><br>
                <small class="text-muted">Sistem Absensi Event</small>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Libs JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <!-- Tabler Core -->
  <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <script>
    // Hide loading on page load
    $(window).on('load', function () {
      $('#loading').fadeOut(300);
    });


    // Handle form submission with AJAX
    $(document).ready(function () {
      $("#login-form").submit(function (e) {
        e.preventDefault();

        // Get form data
        var formData = $(this).serialize();
        var form = $(this);

        // Show loading
        Swal.fire({
          title: 'Memproses...',
          text: 'Mohon tunggu sebentar',
          allowOutsideClick: false,
          allowEscapeKey: false,
          showConfirmButton: false,
          didOpen: () => {
            Swal.showLoading();
          }
        });

        $.ajax({
          type: "POST",
          url: form.attr('action'),
          data: formData,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').val()
          },
          dataType: 'json',
          success: function (response) {
            if (response.success && response.redirect) {
              // Show success message
              Swal.fire({
                icon: 'success',
                title: 'Login Berhasil',
                text: 'Selamat datang di Sistem Absensi!',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didClose: () => {
                  window.location.href = response.redirect;
                }
              });
            } else {
              // Show error message
              Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: response.message || 'Username atau password salah',
                confirmButtonColor: '#10b981'
              });
              $('#password').val('');
            }
          },
          error: function (xhr) {
            let errorMessage = 'Username atau password salah';
            
            if (xhr.responseJSON && xhr.responseJSON.message) {
              errorMessage = xhr.responseJSON.message;
            } else if (xhr.status === 422 && xhr.responseJSON) {
              // Validation errors
              if (xhr.responseJSON.errors) {
                const errors = xhr.responseJSON.errors;
                errorMessage = Object.values(errors)[0][0] || errorMessage;
              } else if (xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
              }
            }

            Swal.fire({
              icon: 'error',
              title: 'Login Gagal',
              text: errorMessage,
              confirmButtonColor: '#10b981'
            });
            $('#password').val('');
          }
        });
      });
    });
  </script>
</body>

</html>
