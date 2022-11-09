@extends('backend.layout')

@section('title')
{{Auth::user()->name}} | Password Edit
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">{{ucfirst(Auth::user()->role)}} Password Edit</h2>
        </div>
        <div class="card-body">
            <form action="{{route('profile.pass.update')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label >Current Password</label>
                    <input type="password" class="form-control" placeholder="Enter Current Password" name="current_password">
                    @error('current_password')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >New Password</label>
                    <input type="password" class="form-control" placeholder="Enter New Password" name="new_password">
                    @error('new_password')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Retype New Password</label>
                    <input type="password" class="form-control" placeholder="Retype New Password" name="new_password_confirmation">
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