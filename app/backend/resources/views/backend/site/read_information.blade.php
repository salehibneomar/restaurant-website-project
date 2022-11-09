@extends('backend.layout')

@section('title')
General Site Information
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">General Information</h2>
            <a class="btn btn-primary btn-pill"  href="{{route('siteinformation.edit')}}" role="button"> Edit&ensp;<i class="fa-regular fa-pen-to-square"></i> </a>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item text-dark">
                    <b class="d-inline-block mb-2">Name:</b><br>
                    {{$informations->name}}
                </li>
                <li class="list-group-item text-dark">
                    <b class="d-inline-block mb-2">Email:</b><br>
                    {{$informations->email}}
                </li>
                <li class="list-group-item text-dark">
                    <b class="d-inline-block mb-2">Phone:</b><br>
                    {{$informations->phone}}
                </li>
                <li class="list-group-item text-dark">
                    <b class="d-inline-block mb-2">Address:</b><br>
                    {{$informations->address}}
                </li>
                <li class="list-group-item text-dark">
                    <b class="d-inline-block mb-2">About:</b><br>
                    {{$informations->about}}
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection