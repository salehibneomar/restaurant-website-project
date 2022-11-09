@extends('backend.layout')

@section('title')
{{$menu->name}}
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">{{$menu->name}}</h2>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-horizontal-lg">
                <li class="list-group-item ">
                    <b class="d-block mb-3">Image:</b>
                    <img src="{{asset($menu->image)}}" class="img" alt="">
                </li>
                <li class="list-group-item w-100">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <b>Menu Type:</b>&ensp;{{$menu->type->name}}
                        </li>
                        <li class="list-group-item">
                            <b>Price:</b>&ensp;{{number_format($menu->price, 2)}}
                        </li>
                        <li class="list-group-item">
                            <b>Status:</b>&ensp;
                            @if ($menu->status==0)
                                <span class="badge badge-pill badge-danger">Unavailable</span>
                            @else
                            <span class="badge badge-pill badge-success">Available</span>   
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Date Added:</b>&ensp;{{date('d M y, h:i:s A', strtotime($menu->created_at))}}
                        </li>
                        <li class="list-group-item">
                            <b>Added By:</b>&ensp;{{$menu->user->name}}
                        </li>
                        @if(is_null($menu->updated_at)==false)
                        <li class="list-group-item">
                            <b>Date Updated:</b>&ensp;{{date('d M y, h:i:s A', strtotime($menu->updated_at))}}
                        </li>
                        <li class="list-group-item">
                            <b>Updated By:</b>&ensp;{{$menu->updater}}
                        </li>
                        @endif
                      </ul>

                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#image').change((e)=>{
            const file = e.target.files[0];

            if(file!==undefined){
                const reader = new FileReader()
                reader.readAsDataURL(file)
                reader.onload = (e)=>{
                    $("#image_preview").attr("src", e.target.result)
                }
            }
        })
    </script>
@endsection