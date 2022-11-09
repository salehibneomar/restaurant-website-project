@extends('backend.layout')

@section('title')
{{$menuType->name}} Menu
@endsection

@section('styles')
<link href="{{asset('backend/plugins/data-tables/datatables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/plugins/data-tables/responsive.datatables.min.css')}}" rel="stylesheet">
<style>
    .tbl-img{
        width: 80px;
    }
</style>
@endsection

@section('main')
<div class="col-xl-12">
    <div class="card card-default mb-4 mb-lg-5" >
        <div class="card-header justify-content-between align-items-center card-header-border-bottom">
            <h2 class="d-inline-block">{{$menuType->name}} Menu </h2>
            <a class="btn btn-primary btn-pill"  href="{{route('menu.create', ['type'=>$menuType->slug])}}" role="button">Add New&ensp;<i class="fa-solid fa-plus"></i> </a>
        </div>
        <div class="card-body" style="overflow-x: auto;">
            <table id="data_tables" class="table table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        {{-- <th scope="col">SL</th> --}}
                        <th scope="col" style="width:10%;">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col" style="width:15%;">Price</th>
                        <th scope="col" style="width:10%;">Status</th>
                        <th scope="col" style="width:5%;">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="dlt-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          You won't be able to revert this process!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">Close</button>
          <a href="" id="dlt-confirm-btn" class="btn btn-pill btn-danger" id="confirm_btn">OKAY</a>
        </div>
      </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('backend/plugins/data-tables/jquery.datatables.min.js')}}"></script>
<script src="{{asset('backend/plugins/data-tables/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/data-tables/datatables.responsive.min.js')}}"></script>

<script>
$(document).ready(function(){
    $('#data_tables').DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: ["10", "20"],
        pageLength: 10,
        responsive: true,
        ajax: "{{ route('menu.read', ['type'=>$menuType->slug]) }}",
        columns: [
                    // {data: 'DT_RowIndex'},
            {data: 'image', name: 'image', 
            orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'price', name: 'price'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action',
            orderable: false, searchable: false},
        ],
    });

    $('tbody').on('click', '.dlt-btn', (e)=>{
        e.preventDefault()
        $('#dlt-modal').modal('show')
        $('#dlt-confirm-btn').attr('href', e.target.href)
    })

    $('#dlt-confirm-btn').click((e)=>{
        $('#dlt-modal').modal('hide')
    })

});

</script>

@endsection