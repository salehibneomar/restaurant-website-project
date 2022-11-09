@extends('backend.layout')

@section('title')
Menu Types Create
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">Create New Menu Type</h2>
        </div>
        <div class="card-body">
            <form action="{{route('menu.types.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" placeholder="Enter Type Name" name="name" value="{{old('name')}}">
                    @error('name')
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