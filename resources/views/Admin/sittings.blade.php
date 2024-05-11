@extends('Admin.partials.master')
@section('content')

<?php
    use App\Models\Sitting;

    $sittings = Sitting::all()->first();
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Website Sittings</h4>
            <form class="forms-sample" method="post" action="{{route('admin.sittings.update',$sittings)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" value="{{$sittings->name}}">
                    @error('name')
                    <div class="invalid-feedback" style="display: block; color:red; ">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Light logo</label><br />
                    <img src='{{ asset('public/sittings/'.$sittings->light_logo) }}' class="m-2" style="width:100px;">
                    <input type="file" name="light_logo" class=" form-select  file-upload-info " style="color: black;">
                    @error('light_logo')
                    <div class="invalid-feedback" style="display: block; color:red; ">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div class="form-group">
                    <label>Dark logo</label><br />
                    <img src='{{ asset('public/sittings/'.$sittings->dark_logo) }}' class="m-2" style="width:100px;">
                    <input type="file" name="dark_logo" class=" form-select  file-upload-info " style="color: black;">
                    @error('dark_logo')
                    <div class="invalid-feedback" style="display: block; color:red; ">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Light favicon</label><br />
                    <img src='{{ asset('public/sittings/'.$sittings->light_favicon) }}' class="m-2" style="width:100px;">
                    <input type="file" name="light_favicon" class=" form-select  file-upload-info " style="color: black;">
                    @error('light_favicon')
                    <div class="invalid-feedback" style="display: block; color:red; ">
                        {{$message}}
                    </div>
                    @enderror

                </div>

                <div class="form-group">
                    <label>Dark favicon</label><br />
                    <img src='{{ asset('public/sittings/'.$sittings->dark_favicon) }}' class="m-2" style="width:100px;">
                    <input type="file" name="dark_favicon" class=" form-select  file-upload-info " style="color: black;">
                    @error('dark_favicon')
                    <div class="invalid-feedback" style="display: block; color:red; ">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">About us</label>
                    <textarea type="text-area" name="about_us" class="form-control" style="height: 100px;" id="exampleInputName1" placeholder="about us..">{{$sittings->about_us}}</textarea>
                    @error('about_us')
                    <div class="invalid-feedback" style="display: block; color:red; ">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
            </form>
        </div>
    </div>
</div>

@endsection