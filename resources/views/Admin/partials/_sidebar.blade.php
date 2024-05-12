<?php

use App\Models\Sitting;

$sittings = Sitting::all()->first();
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar" >
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top" >
    <a class="sidebar-brand brand-logo" href="{{url('admin/dashboard')}}"><img style=" height: 40px;" src="{{ asset('public/sittings/'.$sittings->light_logo) }}" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="{{url('/dashboard')}}"><img style="width: 40px; height:40px;" src="{{ asset('public/sittings/'.$sittings->light_favicon) }}" alt="logo" /></a>
  </div>
  <ul class="nav" style="height: 100vh;">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="../assets/images/faces/face15.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">{{Auth::guard('admin')->user()->name}}</h5>
            <span>Admin</span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" >
          <form method="get" action="{{ route('admin.account.index') }}">
            @csrf
            <button type="submit" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-cog text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account Sitting</p>
              </div>
            </button>
          </form>
          <div class="dropdown-divider"></div>
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{route('admin.dashboard')}}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">URLs Section</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.url.create')}}">Create URL</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.url.index')}}">All URLs</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.url.myUrls')}}">My Urls</a></li>
        </ul>
      </div>
    </li>




    <li class="nav-item menu-items">
      <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
        <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">Users Section</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="users">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.allusers')}}">Users</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.alladmins')}}">Admins</a></li>
        </ul>
      </div>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" href="{{route('admin.sittings.index')}}">
        <span class="menu-icon">
          <i class="mdi mdi-cog text-success"></i>
        </span>
        <span class="menu-title">Sittings</span>
        <i class="menu-arrow"></i>
      </a>
    </li>




  </ul>
</nav>