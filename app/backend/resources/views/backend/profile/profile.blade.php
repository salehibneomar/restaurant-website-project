@extends('backend.layout')

@section('title')
Profile | {{Auth::user()->name}}
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">{{ucfirst(Auth::user()->role)}} Profile</h2>
            <a class="btn btn-primary btn-pill"  href="{{route('profile.edit')}}" role="button"> Edit&ensp;<i class="fa-regular fa-pen-to-square"></i> </a>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item text-dark">
                    <b class="d-inline-block mb-2">Name:</b><br>
                    {{$user->name}}
                </li>
                <li class="list-group-item text-dark">
                    <b class="d-inline-block mb-2">Email:</b><br>
                    {{$user->email}}
                </li>
                <li class="list-group-item text-dark">
                    <b class="d-inline-block mb-2">Phone:</b><br>
                    {{$user->phone}}
                </li>
                <li class="list-group-item text-dark">
                    <b class="d-inline-block mb-2">Joined:</b><br>
                    {{Carbon\Carbon::create($user->created_at)->diffForHumans()}}
                </li>

            </ul>
        </div>
    </div>
</div>
@endsection