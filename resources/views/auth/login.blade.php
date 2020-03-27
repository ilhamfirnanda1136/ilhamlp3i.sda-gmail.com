
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Aplikasi Siap Bersama</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('asset/')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('asset/')}}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('asset/')}}/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('asset/')}}/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{asset('asset/')}}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('asset/')}}/assets/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('asset/')}}/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <h3>Form Login </h3>
                <form action="{{ route('login') }}" method="post">
                     @csrf
                  <div class="form-group @error('username') has-danger @enderror">
                    <label class="label">Username</label>
                      <input type="text"  name="username" class="form-control form-control-danger" placeholder="Masukkan Username" value="{{ old('username') }}" required="">
                    @error('username')
                    <label id="cname-error" class="error mt-2 text-danger" for="cname">{{ $message }}</label>
                    @enderror
                  </div>
                  <div class="form-group @error('password') has-danger @enderror">
                    <label class="label">Password</label>
                      <input type="password" name="password" class="form-control form-control-danger" placeholder="Masukkan Password" value="{{old('password')}}" required="">
                        @error('password')
                    <label id="cname-error" class="error mt-2 text-danger" for="cname">{{ $message }}</label>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button  type="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                  </div>
                  <div class="form-group d-flex justify-content-between">
                    <div class="form-check form-check-flat mt-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
                    </div>
                  <!--   <a href="#" class="text-small forgot-password text-black">Forgot Password</a> -->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('asset/')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{asset('asset/')}}/assets/js/shared/off-canvas.js"></script>
    <script src="{{asset('asset/')}}/assets/js/shared/hoverable-collapse.js"></script>
    <script src="{{asset('asset/')}}/assets/js/shared/misc.js"></script>
    <script src="{{asset('asset/')}}/assets/js/shared/settings.js"></script>
    <script src="{{asset('asset/')}}/assets/js/shared/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>