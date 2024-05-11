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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Is Active</th>
                            <th>Created at</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(App\Models\Admin::all() as $admin)
                        <tr>
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            @if ($admin->is_active)
                            <td>
                                <form method="POST" action="{{route('admin.deactivate',$admin)}}">
                                    @csrf
                                    @method('PUT')
                                        <button type="submit" class="btn btn-danger btn-rounded">block</button>
                                    </form>
                            </td>
                            @else
                            <td>
                                <form method="POST" action="{{route('admin.activate',$admin)}}">
                                @csrf
                                @method('PUT')
                                    <button type="submit" class="btn btn-primary btn-rounded">activate</button>
                                </form>
                            </td>
                            @endif

                            <td>{{Carbon\Carbon::parse($admin->created_at)->diffForHumans()}}</td>
                            


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