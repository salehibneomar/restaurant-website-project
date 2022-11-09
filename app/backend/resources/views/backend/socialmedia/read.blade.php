@extends('backend.layout')

@section('title')
Social Media
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">Social Media</h2>
            <a class="btn btn-primary btn-pill"  href="{{route('socialmedia.create')}}" role="button">Add New&ensp;<i class="fa-solid fa-plus"></i> </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Platform</th>
                        <th scope="col">URL</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medias as $media)
                        <tr>
                            <td>{{$media->platform}}</td>
                            <td><a href="{{$media->url}}">
                                <small><i>{{$media->url}}</i></small></a>
                            </td>
                            <td>{!! html_entity_decode($media->icon) !!}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-pill btn-danger" data-toggle="modal" data-target="#delete_{{$media->id}}" href="" class="btn btn-sm btn-danger btn-pill">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="delete_{{$media->id}}" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        You won't be able to revert this operation!
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">Close</button>
                                        <a href="{{route('socialmedia.destroy', ['id'=>$media->id])}}" class="btn btn-danger btn-pill">OKAY</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection