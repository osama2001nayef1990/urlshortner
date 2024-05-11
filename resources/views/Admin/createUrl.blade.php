@extends('Admin.partials.master')
@section('content')


<div class="form-group mt-5">
    <form method="POST" action="{{ route('admin.url.store') }}">
        @csrf
        <div class="input-group d-flex align-items-center">
            <input type="text" class="form-control" name="url" placeholder="Enter your url.." aria-label="Enter your url.." aria-describedby="basic-addon2">
            <div class="input-group-append ms-1">
                <button class="btn btn-md btn-primary" type="submit">Short</button>
            </div>
        </div>
    </form>
</div>
@if(Session::has('success'))

<div class="alert alert-success">
    <div class="icon__wrapper">
        <span class="mdi mdi-alert-outline"></span>
    </div>
    <p>{{ Session::get('success') }}</p>

    <!-- <span class="mdi mdi-open-in-new open"></span>
    <span class="mdi mdi-close close"></span>
     -->
</div>

</div>

@endif

<!-- content-wrapper ends -->
@endsection



