@extends('backend.layout')

@section('title')
All Editors
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">All Editors</h2>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <div class="form-group float-right">
                <form method="GET" action="{{route('editor.read')}}" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search by Name or Phone" aria-label="Search" name="q" >
                    <button class="btn btn-success my-2 my-sm-0 mr-2" type="submit">Search</button>
                    <a href="{{route('editor.read')}}" class="btn btn-danger my-2 my-sm-0" >Clear</a>
                  </form>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="width: 5%;">#SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($editors as $key=> $editor)
                        <tr>
                            <td>
                                <span class="badge bg-secondary badge-pill">
                                    {{'#'.($key + $editors->firstItem())}}
                                </span>
                            </td>
                            <td>{{$editor->name}}</td>
                            <td>{{$editor->phone}}</td>
                            <td>
                                @if($editor->status==0)
                                    <span class="badge badge-danger badge-pill">
                                        Locked
                                    </span>
                                @else
                                    <span class="badge badge-success badge-pill">
                                        Live
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('editor.edit', ['id'=>$editor->id])}}" class="btn btn-sm btn-pill btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
              
                  {{$editors->links()}}
         
        </div>
    </div>
</div>
@endsection