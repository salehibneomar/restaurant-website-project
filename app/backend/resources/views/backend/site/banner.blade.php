@extends('backend.layout')

@section('title')
Site Banner
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">Site Banner</h2>
        </div>
        <div class="card-body">
            <img src="{{asset($banner)}}" alt="banner" class="d-block mb-5 img img-fluid img-thumbnail" style="max-height: 300px !important;">

            <h6 class="mb-3">Update Banner</h6>
            <form action="{{route('site.banner.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >Select a new Image</label>
                    <input type="file" name="banner" accept=".jpg, .jpeg" class="form-control">
                    @error('banner')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-pill"> 
                        Update&ensp;
                    <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection