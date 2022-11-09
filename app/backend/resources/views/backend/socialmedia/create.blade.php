@extends('backend.layout')

@section('title')
Social Media Add
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">Add New Social Media</h2>
        </div>
        <div class="card-body">
            <form action="{{route('socialmedia.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label >Platform</label>
                    <select name="platform" class="form-control">
                        <option value="">--SELECT--</option>
                        @foreach ($platforms as $key=>$val)
                            <option value="{{$key}}">{{$key}}</option>
                        @endforeach
                    </select>
                    @error('platform')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >URL</label>
                    <input type="url" class="form-control" placeholder="Enter media URL" name="url" value="{{old('url')}}">
                    @error('url')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-pill"> 
                        Submit&ensp;<i class="fa-solid fa-plus"></i> 
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection