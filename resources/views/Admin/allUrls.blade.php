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
@endif


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All URLs</h4>
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
                        @foreach(App\Models\Url::all() as $url)
                        <tr>
                            @if ($url->admin) <td>{{$url->admin->name}}</td>
                            @elseif(!$url->admin && !$url->user) <td>Guest</td>
                            @else <td>{{$url->user->name}}</td>
                            @endif
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

                            
                            
                            @if(!$url->admin && !$url->user) 
                            <td><label class="badge badge-primary">guest</label></td>
                            @elseif($url->admin)
                            <td><label class="badge badge-info">admin</label></td>
                            @else
                            <td><label class="badge badge-warning">user</label></td>
                            @endif
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