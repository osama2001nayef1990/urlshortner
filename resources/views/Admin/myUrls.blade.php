@extends('Admin.partials.master')
@section('content')

@if (Session::has('success'))
<div class="alert alert-success">
    <div class="icon__wrapper">
        <span class="mdi mdi-alert-outline"></span>
    </div>
    <p>{{ Session::get('success') }}</p>
    <span class="mdi mdi-open-in-new open"></span>
    <span class="mdi mdi-close close"></span>
</div>
@elseif(Session::has('Deleted'))
<div class="alert alert-error">
    <div class="icon__wrapper">
        <span class="mdi mdi-alert-outline"></span>
    </div>
    <p>{{ Session::get('Deleted') }}</p>
    <span class="mdi mdi-open-in-new open"></span>
    <span class="mdi mdi-close close"></span>
</div>

@endif


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">My URLs</h4>
                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-bs-toggle="dropdown" aria-expanded="false" href="#">+ Create New Project</a>
            </div>
            <!-- <p class="card-description"> Add class <code>.table-hover</code> -->
            </p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Origin URL</th>
                            <th>Short URL</th>
                            <th>Is Active</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach(Auth::guard('admin')->user()->urls as $url)
                        <tr>
                            <td>{{$url->admin->name}}</td>
                            <td><a href="{{$url->origin_url}}" target="_blank">{{$url->origin_url}}</a></td>
                            <!-- <td>{{$url->is_active}}</td> -->
                            <td>{{$url->shortened_url_code}}</td>
                            @if ($url->is_active)
                            <td>
                                <form method="POST" action="{{route('admin.url.update',$url)}}">
                                    @csrf
                                    @method('PUT')
                                        <button type="submit" class="btn btn-primary btn-rounded">active</button>
                                    </form>
                            </td>
                            @else
                            <td>
                                <form method="POST" action="{{route('admin.url.update',$url)}}">
                                @csrf
                                @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-rounded">not active</button>
                                </form>
                            </td>
                            @endif

                            @auth('admin')
                            <td><label class="badge badge-info">admin</label></td>
                            @else
                            <td><label class="badge badge-warning">user</label></td>
                            @endauth
                            <form method="POST" action="{{route('admin.url.destroy',$url)}}">
                                @csrf
                                @method('DELETE')
                                <td> <button type="submit" class="btn btn-danger btn-rounded">Delete</button></td>
                            </form>

                        </tr>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- content-wrapper ends -->
@endsection