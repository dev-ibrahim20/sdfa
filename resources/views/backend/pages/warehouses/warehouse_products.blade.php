@extends('backend.layouts.default')

@section('content')


@php
$vendors = \App\Models\ProjectVendorProduct::groupBy('vendor_id')->get();
$categories = \App\Models\Category::get();
@endphp


<div class="content">

<!-- Start Content-->
<div class="container-fluid">


<div class="row">
<div class="col-12">


@foreach ( $categories as $category )

@foreach($category->sub_categories as $sub_category)

@foreach ( $vendors as $vendor )

<div class="card-box">

<h4 class="header-title mb-4">{{$category->title}} - {{$sub_category->title}} - {{$vendor->vendor->title}} </h4>

<table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
<thead>
<tr>

<th> {{__('lang.title')}} </th>
<th> {{__('lang.qty')}} </th>

</tr>
</thead>

<tbody>

@foreach ( $warehouse->products as $product )

<tr>

<td> {{$product->product->title ?? ''}} </td>
<td> {{$product->qty ?? ''}} </td>

</tr>

@endforeach


</tbody>
</table>


</div>
@endforeach
@endforeach
@endforeach
</div><!-- end col -->
</div>
<!-- end row -->







</div> <!-- container -->

</div> <!-- content -->


@endsection


@section('head')

<title>{{__('lang.app_name')}}</title>

<!-- Plugins css -->
<link href="{{url('')}}/assets/admin/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/assets/admin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- third party css -->
<link href="{{url('')}}/assets/admin/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/assets/admin/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->

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

@endsection
