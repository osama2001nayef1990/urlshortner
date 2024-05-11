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
              <h3 class="card-title text-start mb-3">Register</h3>
              <form method="POST" action="{{ route('admin.register') }}">
                @csrf
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control p_input" id="name" name="name" :value="old('name')" required autofocus autocomplete="name">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control p_input" id="email" name="email" :value="old('email')" required autocomplete="username">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control p_input" id="password" name="password" required autocomplete="new-password">
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />

                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control p_input" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                </div>
                
                <div class="text-center d-grid gap-2">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Sign Up</button>
                </div>
                <div class="d-flex">
                  <button class="btn btn-facebook col me-2">
                    <i class="mdi mdi-facebook"></i> Facebook </button>
                  <button class="btn btn-google col">
                    <i class="mdi mdi-google-plus"></i> Google plus </button>
                </div>
                <p class="sign-up text-center">Already have an Account?<a href="{{ route('admin.login') }}"> Log in</a></p>
                <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
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