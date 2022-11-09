@extends('backend.layout')

@section('title')
Menu Types Edit
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">Edit Menu Type</h2>
        </div>
        <div class="card-body">
            <form action="{{route('menu.types.update', ['id'=>$type->id])}}" method="POST">
                @csrf

                <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" placeholder="Enter Type Name" name="name" value="{{$type->name}}">
                    @error('name')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control control-checkbox d-inline">
                        @if ($type->status==1)
                            Uncheck to make the Menu Type Inactive
                        @else
                            Check to make the Menu Type Live 
                        @endif
                        <input type="checkbox" name="status" value="1"
                            @if ($type->status==1)
                                checked
                            @endif
                        >
                        <div class="control-indicator"></div>
                    </label>
                    @error('status')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-pill"> 
                        Update&ensp;<i class="fa-regular fa-pen-to-square"></i> 
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection