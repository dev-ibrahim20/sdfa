@extends('backend.layouts.default')

@section('content')
<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
<div class="col-12">




<p class="header-title mb-6"> <B>{{$project->title}} | {{__('lang.products')}} </B> </p>


<div class="card">
<div class="card-body">
<div class="row">


<div class="col-3">
{{__('lang.vendor')}} :
{!! Form::select('vendor_id' , $vendors->pluck('title','id') , null , ['id'=>'vendors','class' => 'form-control ', 'placeholder'=> __('lang.select')] ) !!}
</div>


<div class="col-3">
{{__('lang.warehouse')}} :
{!! Form::select('warehouse_id' , $project->warehouses->pluck('title','id') , null , ['id'=>'warehouse_id','class' => 'form-control ', 'placeholder'=> __('lang.select')] ) !!}
</div>


<div class="col-3">
{{__('lang.search_and_add')}} :
{!! Form::text('search', null , ['class' => 'form-control search_in_products', 'placeholder'=> __('lang.search_with_word_or_more')] ) !!}
</div>


<div id="search_result" class="col-12">

</div>

</div>  <!-- end row -->
</div> <!-- end card body-->
</div> <!-- end card -->



<div class="card">
<div class="card-body">
<div  class="row">

{{__('lang.project_products')}}

<table id="div_task_products_table" class="table table-hover mt-1 mb-0">
<thead class="thead-light">
<tr>
<th>#</th>
<th>{{__('lang.title')}}</th>

<th>{{__('lang.vendor')}}</th>

<th>{{__('lang.warehouse')}}</th>

<th style="width:10%">{{__('lang.planned_qty')}}</th>
<th style="width:10%">{{__('lang.received_qty')}}</th>
<th style="width:10%">{{__('lang.remaining_qty')}}</th>

<th style="width:10%">{{__('lang.current_qty')}}</th>
<th></th>
</tr>
</thead>
<tbody >

@foreach( $project->vendors_products as $k=>$product )
@php $current_qty = \App\Models\WarehouseProduct::whereIn('warehouse_id',$product->project->warehouses->pluck('id'))->where('product_id',$product->product_id)->sum('qty');

$received_qty = \App\Models\WarehouseTransactions::whereIn('warehouse_id',$product->project->warehouses->pluck('id'))->where('product_id',$product->product_id)->where('vendor_id',$product->vendor_id)->where('type','in_qty')->sum('qty');
@endphp
<tr>
<th scope="row">{{$k+1}}</th>
<td>
<a class="get_activity_log" subject_id="{{$product->id}}" subject_type="{{get_class($product)}}" data-toggle="modal" data-target="#activityLogModal"> <i class="fa fa-history"> </i> </a> 

 {{$product->product->title ?? ''}}</td>          
<td>{{$product->vendor->title ?? ''}}</td>    
<td>{{$product->warehouse->title ?? ''}}</td>              
<td>{{$product->qty}}</td>
<td>{{$received_qty}}</td>
<td>{{ $product->qty - $received_qty}} <a job_order_id="114" job_order_title="{{$product->vendor->title ?? ''}}" style="color:#6C757D" href="#" class="list_files" style="color:#6C757D" data-toggle="modal" data-target="#list_filesexampleModal" > <i class="fa fa-paperclip" aria-hidden="true"></i> </a></td>


<td>{{$current_qty}}</td>   
<td>
<a href="#" row_id="{{$product->id}}" class="text-danger delete_product_table"><i class="fe-trash"></i></a>
</td>
</tr>
@endforeach

</tbody>
</table>


</div>  <!-- end row -->
</div> <!-- end card body-->
</div> <!-- end card -->


</div><!-- end col -->
</div>
<!-- end row -->

</div> <!-- container -->

</div> <!-- content -->


<!-- Modal -->
<div class="modal fade" id="list_filesexampleModal" tabindex="-1" role="dialog" aria-labelledby="list_filesexampleModal" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title list_files_title" id="list_filesexampleModal">   </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">


{!! Form::open([ 'route' => 'job_orders.add_file', 'role' => 'form' , 'class' => 'form' , 'files'=>'true' ]) !!}
{!! Form::hidden('job_order_id', null , ['id' => 'job_order_id'] ) !!}

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.title')}} <span class="text-danger">*</span></label>
{!! Form::text('title', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('lang.title')] ) !!}
</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> Files (docx,pdf,xlsx,jpg,png) <span class="text-danger">*</span></label>
</br>
{!! Form::file('file', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('lang.title')] ) !!}
</div>
</div>
</div>
<hr>

<span class="list_files_table">

</span>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Add File</button>
{!!Form::close()!!}


</div>
</div>
</div>
</div>



@endsection


@section('head')

<title>{{__('lang.update_product')}} | {{$project->title}} | {{config('settings.ProjectName')}}</title>

<!-- Plugins css -->
<link href="{{url('')}}/assets/admin/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/assets/admin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- third party css -->
<link href="{{url('')}}/assets/admin/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/assets/admin/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->

<link href="{{url('')}}/assets/admin/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/assets/admin/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

<!-- App css -->
<link href="{{url('')}}/assets/admin/css-{{DirUser()}}/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/assets/admin/css-{{DirUser()}}/icons.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/assets/admin/css-{{DirUser()}}/app.min.css" rel="stylesheet" type="text/css" />


@endsection

@section('scripts')

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<!-- Vendor js -->
<script src="{{url('')}}/assets/admin/js/vendor.min.js"></script>
<!-- Chart JS -->
<script src="{{url('')}}/assets/admin/libs/chart-js/Chart.bundle.min.js"></script>
<script src="{{url('')}}/assets/admin/libs/moment/moment.min.js"></script>
<script src="{{url('')}}/assets/admin/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
<script src="{{url('')}}/assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- Chat app -->
<script src="{{url('')}}/assets/admin/js/pages/jquery.chat.js"></script>
<!-- Todo app -->
<script src="{{url('')}}/assets/admin/js/pages/jquery.todo.js"></script>
<!-- Dashboard init JS -->
<script src="{{url('')}}/assets/admin/js/pages/dashboard-3.init.js"></script>
<!-- App js-->
<script src="{{url('')}}/assets/admin/js/app.min.js"></script>

<script src="{{url('')}}/assets/admin/libs/dropzone/dropzone.min.js"></script>
<script src="{{url('')}}/assets/admin/libs/dropify/dropify.min.js"></script>
<!-- Init js-->
<script src="{{url('')}}/assets/admin/js/pages/form-fileuploads.init.js"></script>

<script>

$(document).on('keyup', '.search_in_products', function(){ 
let word = $(".search_in_products").val();
$('#search_result').load('{{route('products.auto_search')}}?word='+word);

});


//save product to  products table
$(document).on('click', '.add_to_product_table', function(e){ 
e.preventDefault();
let vendor_id = $('#vendors').val();
let warehouse_id = $('#warehouse_id').val();
if( vendor_id == '' ){
    alert('برجاء اختيار مورد');
}else if( warehouse_id == '' ){
    alert('برجاء اختيار المخزن');
}else{
let product_id = $(this).attr('product_id');
let qty = $('#qty_product_'+ product_id).val();
let project_id = "{{$project->id}}";

let _token = "{{ csrf_token() }}";
$('#add_plus_'+ product_id).removeClass('fe-plus');
$('#add_plus_'+ product_id).addClass('fe-check');
$.ajax({
url:"{{ route('add_product_to_project') }}",
method:"POST",
data:{product_id:product_id, _token:_token,warehouse_id:warehouse_id,project_id:project_id,qty:qty,vendor_id:vendor_id},
success:function(){
$("#div_task_products_table").load(location.href + " #div_task_products_table");
}
});

}

});



//delete product from  products table
$(document).on('click', '.delete_product_table', function(e){ 
e.preventDefault();
let row_id = $(this).attr('row_id');
let _token = "{{ csrf_token() }}";
$.ajax({
url:"{{ route('delete_product_from_project') }}",
method:"POST",
data:{row_id:row_id, _token:_token},
success:function(){
$("#div_task_products_table").load(location.href + " #div_task_products_table");
}
});
});


$('.list_files').on('click',function(){

$('.list_files_table').load("{{url('')}}/{{config('settings.BackendPath')}}/job_orders/list_files/114");

});

</script>
</script>
@endsection
