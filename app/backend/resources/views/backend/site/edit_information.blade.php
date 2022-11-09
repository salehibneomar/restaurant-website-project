@extends('backend.layout')

@section('title')
Edit Site Information
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">Edit General Information</h2>
        </div>
        <div class="card-body">
            <form action="{{route('siteinformation.update')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$informations->name}}">
                    @error('name')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Email</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{$informations->email}}">
                    @error('email')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Phone</label>
                    <input type="tel" class="form-control" placeholder="Enter phone" name="phone" value="{{$informations->phone}}">
                    @error('phone')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Address</label>
                    <input type="text" class="form-control" placeholder="Enter address" name="address" value="{{$informations->address}}">
                    @error('address')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >About</label>
                    <textarea class="form-control" name="about" rows="2" >{{$informations->about}}</textarea>
                    @error('about')
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