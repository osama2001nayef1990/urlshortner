<!DOCTYPE html>
<html lang="en">

@include('Admin.layouts.head')

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-start mb-3">Login</h3>
              <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="form-group">
                  <label>Email *</label>
                  <input id="email" type="text" class="form-control p_input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input id="password" type="password" class="form-control p_input" name="password" required autocomplete="current-password">
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />

                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input id="remember_me" type="checkbox" class="form-check-input" name="remember"> Remember me </label>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>
                  @if (Route::has('password.request'))
                  <a href="#" class="forgot-pass" href="{{ route('password.request') }}">Forgot password</a>
                  @endif
                </div>
                <div class="text-center d-grid gap-2">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
                <div class="d-flex">
                  <button class="btn btn-facebook me-2 col">
                    <i class="mdi mdi-facebook"></i> Facebook </button>
                  <button class="btn btn-google col">
                    <i class="mdi mdi-google-plus"></i> Google plus </button>
                </div>
                <p class="sign-up">Don't have an Account?<a href="{{route('admin.register')}}"> Sign Up</a></p>
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
  
  @include('Admin.layouts.scripts')
</body>

</html>