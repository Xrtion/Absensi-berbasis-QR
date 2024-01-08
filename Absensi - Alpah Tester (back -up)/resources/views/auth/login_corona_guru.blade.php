<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Guru Login SMK Revany</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('corona') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('corona') }}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('corona') }}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('corona') }}/assets/images/logo-mini.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login Guru</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control p_input" id="email" name="email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" id="password" name="password">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('corona') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('corona') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('corona') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('corona') }}/assets/js/misc.js"></script>
    <script src="{{ asset('corona') }}/assets/js/settings.js"></script>
    <script src="{{ asset('corona') }}/assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>