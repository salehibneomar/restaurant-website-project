@if(session('msg'))
    <div class="alert alert-dismissible fade show alert-{{session('type')}}" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif