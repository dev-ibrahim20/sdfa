@extends('backend.layouts.default')

@section('content')
<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
<div class="col-12">

<p class="header-title mb-6"> <B>{{$warehouse->title}} | {{__('lang.warehouses_transactions')}} </B> </p>


<div class="card">
<div class="card-body">
<div class="row">

<div class="col-12">
{{__('lang.add_transaction')}}
</div>

<div class="col-3">
{!! Form::select('type' , [
    'in_qty'=> __('lang.in_qty'),
    'out_qty'=> __('lang.out_qty'),
    'return_qty'=> __('lang.return_qty'),
    ]
     , null , ['id'=>'type','class' => 'type form-control', 'placeholder'=> __('lang.select')] ) !!}
</div>

<div style="display:none" class="col-3 vendors">
{!! Form::select('vendor_id' , $vendors->pluck('title','id') , null , ['id'=>'vendors','class' => 'form-control', 'placeholder'=> __('lang.select')] ) !!}
</div>

<div style="display:none" class="col-3 task">
{!! Form::text('job_order_id' , null , ['id'=>'task','class' => 'form-control', 'placeholder'=> 'Enter job Order Serial','id'=>'job_order_id'] ) !!}
</div>

<div class="col-3">
{!! Form::text('search', null , ['class' => 'form-control search_in_products', 'placeholder'=> __('lang.search_with_word_or_more')] ) !!}
</div>


<div id="search_result" class="col-12">

</div>

<div id="execute_alert" class="col-12"></div>
 
</div>  <!-- end row -->
</div> <!-- end card body-->
</div> <!-- end card -->



<div class="card">
<div class="card-body">
<div  class="row">

{{__('lang.products')}}

<table id="div_task_products_table" class="table table-hover mt-1 mb-0">
<thead class="thead-light">
<tr>
<th>#</th>
<th>{{__('lang.transaction_type')}}</th>
<th>{{__('lang.product')}}</th>
<th></th>
<th style="width:10%">{{__('lang.qty')}}</th>
<th style="width:10%">{{__('lang.inspection_qty')}}</th>
<th></th>
</tr>
</thead>
<tbody >

@foreach( $warehouse->transactions as $k=>$transaction )
<tr>
<th scope="row">{{$k+1}}</th>
<td>{{__('lang.'.$transaction->type)}}</td>   
<td>
<a class="get_activity_log" subject_id="{{$transaction->id}}" subject_type="{{get_class($transaction)}}" data-toggle="modal" data-target="#activityLogModal"> <i class="fa fa-history"> </i> </a> 

 {{$transaction->product->title ?? ''}}</td>          
<td>{{$transaction->vendor->title ?? ''}} {{$transaction->job_order->title ?? ''}}

@if(isset($transaction->task))
#{{$transaction->task->id}}
@endif


</td>    
<td>{{$transaction->qty}}</td>
<td><a href="{{url('')}}/uploads/job_orders_files/2022/10/635a4b30cebd0_1666861872.pdf" target="_blank">{{$transaction->inspection_qty}}</a></td>
<td>
<a href="#" row_id="{{$transaction->id}}" class="text-danger delete_product_table"><i class="fe-trash"></i></a>
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




@endsection


@section('head')

<title>{{__('lang.update_product')}} | {{$warehouse->title}} | {{config('settings.ProjectName')}}</title>

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


$(document).on('change', '.type', function(){ 
let type = $('#type').val();
if(  type == 'in_qty' ){
    $('.vendors').show();
}else{
    $('.vendors').hide();
}


if(  type == 'out_qty' ){
    $('.task').show();
}else{
    $('.task').hide();
}


});



//save product to  products table
$(document).on('click', '.add_to_product_table', function(e){ 
e.preventDefault();
let vendor_id = $('#vendors').val();
let type = $('#type').val();
if( type == '' ){
    alert('برجاء اختيار نوع الحركة');
}else if( vendor_id == '' && type == 'in_qty' ){
    alert('برجاء اختيار مورد');
}else{
let product_id = $(this).attr('product_id');
let job_order_id = $('#job_order_id').val();
let qty = $('#qty_product_'+ product_id).val();
let inspection = $('#inspection_product_'+ product_id).val();
let warehouse_id = "{{$warehouse->id}}";
let _token = "{{ csrf_token() }}";
$('#add_plus_'+ product_id).removeClass('fe-plus');
$('#add_plus_'+ product_id).addClass('fe-check');
$.ajax({
url:"{{ route('add_product_to_transactions') }}",
method:"POST",
data:{type:type,product_id:product_id, _token:_token,warehouse_id:warehouse_id,qty:qty,vendor_id:vendor_id,job_order_id:job_order_id,inspection:inspection},
success:function(msg){
$("#div_task_products_table").load(location.href + " #div_task_products_table");
$("#search_result").html('');
if( msg.execute == false ){
    $("#execute_alert").html("</br><div class='alert alert-danger' role='alert'>You Can't Out Qty More than the Planned Qty</div>");
}
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
url:"{{ route('delete_product_from_transactions') }}",
method:"POST",
data:{row_id:row_id, _token:_token},
success:function(){
$("#div_task_products_table").load(location.href + " #div_task_products_table");
}
});
});

</script>
@endsection
