@extends('backend.layout')

@section('title')
Edit Editor
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">Edit The Editor</h2>
        </div>
        <div class="card-body">
            <form action="{{route('editor.update', ['id'=>$editor->id])}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Status</label>
                    
                    <select name="status" class="form-control">
                        <option value="1" @if ($editor->status==1)
                            selected
                        @endif >Live</option>
                        <option value="0" @if ($editor->status==0)
                            selected
                        @endif >Locked</option>
                    </select>

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