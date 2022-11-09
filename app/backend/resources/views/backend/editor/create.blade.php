@extends('backend.layout')

@section('title')
Assign New Editor
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">Assign New Editor</h2>
        </div>
        <div class="card-body">
            <form action="{{route('editor.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{old('name')}}">
                    @error('name')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" class="form-control" placeholder="Enter phone number" name="phone" value="{{old('phone')}}">
                    @error('phone')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-pill"> 
                        Assign&ensp;<i class="fa-solid fa-plus"></i> 
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection