@extends('backend.layout')

@section('title')
Menu Types
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">Menu Types</h2>
            <a class="btn btn-primary btn-pill"  href="{{route('menu.types.create')}}" role="button">Add New&ensp;<i class="fa-solid fa-plus"></i> </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%;">#SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $key => $type)
                        <tr>
                            <td>
                                <span class="badge bg-secondary badge-pill">
                                    {{'#'.($key+1)}}
                                </span>
                            </td>
                            <td>{{$type->name}}</td>
                            <td>
                                @if($type->status==0)
                                    <span class="badge badge-danger badge-pill">
                                        Inactive
                                    </span>
                                @else
                                    <span class="badge badge-success badge-pill">
                                        Live
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('menu.types.edit', ['id'=>$type->id])}}" class="btn btn-sm btn-pill btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection