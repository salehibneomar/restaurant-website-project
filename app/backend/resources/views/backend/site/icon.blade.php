@extends('backend.layout')

@section('title')
Site Icon
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">Site Icon</h2>
        </div>
        <div class="card-body">
            <img src="{{asset($icon)}}" alt="icon" class="d-block mb-5 img img-fluid img-thumbnail" style="min-width: 60px; max-width:60px">

            <h6 class="mb-3">Update Icon</h6>
            <form action="{{route('site.icon.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >Select a new Image</label>
                    <input type="file" name="icon" accept=".png" class="form-control">
                    @error('icon')
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