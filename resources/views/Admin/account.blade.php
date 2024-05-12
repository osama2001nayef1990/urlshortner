@extends('Admin.partials.master')
@section('content')


<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">General Information</h4>
                <form method="POST" action="{{ route('admin.changeName',Auth::guard('admin')->user()) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1">ID</label>
                        <input type="text" class="form-control bg-dark" id="exampleInputUsername1" name="id" placeholder="ID" value="{{Auth::id()}}" disabled readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{Auth::guard('admin')->user()->name}}">
                        @error('name')
                        <div class="invalid-feedback" style="display: block; color:red; ">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Type</label>
                        <input type="text" class="form-control bg-dark" id="exampleInputPassword1" value="{{'Admin'}}" disabled>
                    </div>


                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Change Email</h4>
                <form class="forms-sample" method="POST" action="{{route('admin.email.change',Auth::guard('admin')->user())}}">
                @csrf
                @method('PUT')
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="Email" value="{{Auth::guard('admin')->user()->email}}">
                            <input type="hidden" name="current_email" value="{{Auth::guard('admin')->user()->email}}">
                            @error('email')
                            <div class="invalid-feedback" style="display: block; color:red; ">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Change Email</button>
                </form>
            </div>
            <div class="card-body">
                <h4 class="card-title">Change Password</h4>
                <form class="forms-sample" method="POST" action="{{ route('admin.password.change',Auth::guard('admin')->user()) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="exampleInputPassword2" name="password" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback" style="display: block; color:red; ">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="exampleInputConfirmPassword2" name="password_confirm" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback" style="display: block; color:red; ">
                                {{$message}}
                            </div>
                            @enderror

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Change Password</button>
                    <!-- <button class="btn btn-dark">Cancel</button> -->
                </form>
            </div>
        </div>

    </div>
    @if(Session::has('PasswordChanged'))
    <div class="alert alert-success m-2">
        <div class="icon__wrapper">
            <span class="mdi mdi-alert-outline"></span>
        </div>
        <p>{{ Session::get('PasswordChanged') }}</p>
    </div>
    @elseif(Session::has('PasswordChanged'))
    <div class="alert alert-success m-2">
        <div class="icon__wrapper">
            <span class="mdi mdi-alert-outline"></span>
        </div>
        <p>{{ Session::get('EmailChanged') }}</p>
    </div>
    @endif

</div>

@endsection