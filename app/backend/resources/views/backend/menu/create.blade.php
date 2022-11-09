@extends('backend.layout')

@section('title')
Create {{$menuType->name}} Menu Item
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">Create New {{$menuType->name}} Menu Item</h2>
        </div>
        <div class="card-body">
            <form 
            action="{{route('menu.store', ['type'=>$menuType->slug])}}" method="POST" 
            enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter Item Name" name="name" value="{{old('name')}}">
                        @error('name')
                        <span class="form-text text-danger">{{$message}}</span>
                        @enderror
                    </div>
    
                    <div class="form-group col-md-6">
                        <label>Price</label>
                        <input type="number" class="form-control" placeholder="Enter Price" name="price" value="{{old('price')}}" min="1" step="0.1">
                        @error('price')
                        <span class="form-text text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <img 
                        src="" alt="" 
                        class="d-block img mb-2" 
                        width="120px"
                        id="image_preview">
                        <label>Image</label>
                        <input 
                        type="file" 
                        class="form-control" 
                        name="image"
                        accept=".jpg,.jpeg,.png"
                        id="image"
                        >
                        @error('image')
                        <span class="form-text text-danger">{{$message}}</span>
                        @enderror
                    </div>
    
                    <div class="form-group col-md-6">
                        <label>Ingredients</label>
                        <textarea 
                        name="ingredients" 
                        rows="3" 
                        placeholder="Use comma , to seperate ingredients"
                        class="form-control"
                        >{{old('ingredients')}}</textarea>
                        @error('ingredients')
                        <span class="form-text text-danger">{{$message}}</span>
                        @enderror
                    </div>
    
                    <div class="form-group col-md-6">
                        <label>Description</label>
                        <textarea 
                        name="description" 
                        rows="3" 
                        placeholder="Keep it brief"
                        class="form-control"
                        ></textarea>
                        @error('description')
                        <span class="form-text text-danger">{{$message}}</span>
                        @enderror
                    </div>
    
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary btn-pill"> 
                            Submit&ensp;<i class="fa-solid fa-plus"></i> 
                        </button>
                    </div>
                </div>
            </form>
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