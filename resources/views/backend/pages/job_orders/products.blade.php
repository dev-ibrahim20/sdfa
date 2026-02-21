@extends('backend.layouts.default')

@section('content')
<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
<div class="col-12">

<p class="header-title mb-6"> <B> {{$job_order->title}} | {{__('lang.products')}} </B> </p>


<div class="card">
<div class="card-body">
<div class="row">

<div class="col-12">
{{__('lang.search_and_add')}}
</div>

<div class="col-12">
{!! Form::text('search', null , ['class' => 'form-control col-3 search_in_products', 'placeholder'=> __('lang.search_with_word_or_more')] ) !!}
</div>

<div id="search_result" class="col-12">

</div>

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
<th>{{__('lang.title')}}</th>
<th style="width:10%">{{__('lang.qty')}}</th>
<th style="width:10%">{{__('lang.received_qty')}}</th>
<th style="width:10%">{{__('lang.remaining_qty')}}</th>
<th></th>
</tr>
</thead>
<tbody >

@foreach( $job_order->products as $k=>$product )
<tr>
<th scope="row">{{$k+1}}</th>
<td> 

<a class="get_activity_log" subject_id="{{$product->id}}" subject_type="{{get_class($product)}}" data-toggle="modal" data-target="#activityLogModal"> <i class="fa fa-history"> </i> </a> 

{{$product->product->title}}</td>                                 
<td>{{$product->qty}}</td>
<td>{{$product->transactions->sum('qty')}}</td>
<td>{{ $product->qty - $product->transactions->sum('qty') }}</td>
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

@endsection


@section('head')

<title>{{__('lang.update_product')}} | {{$job_order->title}} | {{config('settings.ProjectName')}}</title>

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

let product_id = $(this).attr('product_id');
let qty = $('#qty_product_'+ product_id).val();
let job_order_id = "{{$job_order->id}}";
let _token = "{{ csrf_token() }}";
$('#add_plus_'+ product_id).removeClass('fe-plus');
$('#add_plus_'+ product_id).addClass('fe-check');
$.ajax({
url:"{{ route('add_product_to_job_order') }}",
method:"POST",
data:{product_id:product_id, _token:_token,job_order_id:job_order_id,qty:qty},
success:function(){
$('#search_result').html('');
$('.search_in_products').val('');
$("#div_task_products_table").load(location.href + " #div_task_products_table");
}
});
});



//delete product from  products table
$(document).on('click', '.delete_product_table', function(e){ 
e.preventDefault();
let row_id = $(this).attr('row_id');
let _token = "{{ csrf_token() }}";
$.ajax({
url:"{{ route('delete_product_from_job_order') }}",
method:"POST",
data:{row_id:row_id, _token:_token},
success:function(){
$("#div_task_products_table").load(location.href + " #div_task_products_table");
}
});
});



</script>
@endsection
