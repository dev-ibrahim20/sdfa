@extends('backend.layouts.default')
@section('content')


<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<!-- end page title --> 

<div class="row ">
<div class="col-sm-4">
<h4 class="page-title"> 
    <i class="mdi mdi-apps"></i> 
    @if(isset($product))
    {{__('lang.products')}} | 
    @endif
    {{$product->title ?? __('lang.all_products')}}  
</h4>
</div>
<div class="col-sm-8">
<div class="text-sm-right">

<a href="{{url('')}}/{{config('settings.BackendPath')}}/products/create"><button type="button" class="btn btn-danger btn-rounded mb-3"><i class="mdi mdi-plus"></i> {{__('lang.create_product')}} </button></a>


<!-- Modal -->
<div class="modal fade" id="update_products_from_xls" tabindex="-1" role="dialog" aria-labelledby="update_products_from_xls" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="update_products_from_xls">   {{__('lang.import_products_xls')}}    </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
{!! Form::open([ 'route' => 'update_products_from_xls', 'role' => 'form' , 'class' => 'form' , 'files'=>'true' ]) !!}

<div class="col-md-12">
<div class="form-group">
<label for="projectinput1"><i class="fe-file"></i> {{__('lang.choose_file')}} <span class="text-danger">*</span> </label>
{!! Form::file('products_xls', null , ['class' => 'form-control', 'required'=>'required'] ) !!}
</div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> {{__('lang.close')}}</button>
        <button type="submit" class="btn btn-primary">  {{__('lang.update')}}  </button>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>


<div class="btn-group mb-3 ml-2 d-none d-sm-inline-block">
<button type="button" class="btn btn-dark"><i class="mdi mdi-apps"></i></button>
</div>
<div class="btn-group mb-3 d-none d-sm-inline-block">
<button type="button" class="btn btn-link text-dark"><i class="mdi mdi-format-list-bulleted-type"></i></button>
</div>



<div  class="mb-3 dropdown float-right">
<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
<i class="fas fa-file-export m-0  h3"></i>
</a>
<div  class="dropdown-menu dropdown-menu-right">


<a href="{{route('download_template_excel')}}"><button type="button" class="btn btn-link text-dark"><i class="fa fa-arrow-down"></i> {{__('lang.products_xls_template')}} </button></a>


<a href="{{route('download_products_excel')}}"><button  type="button" class="btn btn-link text-dark"><i class="fa fa-arrow-down"></i> {{__('lang.export_products_xls')}}   </button></a>

 

<a href="#"><button type="button"  data-toggle="modal" data-target="#update_products_from_xls" class="btn btn-link text-dark"><i class="fa fa-arrow-up"></i> {{__('lang.import_products_xls')}}  </button></a>



</div>
</div> <!-- end dropdown -->



</div>



</div><!-- end col-->
</div> 
<!-- end row-->




<form action="?">
<div class="row">

<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fa fa-barcode"></i> {{__('lang.sku')}} </label>
{!! Form::text('sku', Arr::get($filter,'sku') , ['class' => 'form-control'  , 'placeholder'=> __('lang.sku')] ) !!}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fa fa-list"></i> {{__('lang.name')}} </label>
{!! Form::text('name', Arr::get($filter,'name') , ['class' => 'form-control'  , 'placeholder'=> __('lang.sku')] ) !!}
</div>
</div>


<div class="col-md-1 ">
<div class="form-group">
</br>
<button style="float:{{\Auth::user()->language == 'en' ? 'right' : 'left'}}" type="submit" class="btn btn-primary">
<i class="fa fa-filter"></i>
</button>


</div>
</div>
</form>

</div>

<div class="row">


@foreach($products as $product)
<!--  Start projects -->
<div class="col-xl-4">
<div class="card-box project-box">
<div class="dropdown float-right">
<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
<i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
</a>
<div class="dropdown-menu dropdown-menu-right">

@can('edit_products')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/products/{{$product->id}}/edit"> <i class="fas fa-pencil-alt"> </i> {{__('lang.edit')}}</a>
@endcan


<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/products/warehouses/{{$product->id}}"> <i class="mdi mdi-adjust"> </i> {{__('lang.warehouses')}}</a>
 

@can('delete_products')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/products/delete/{{$product->id}}">  <i class="fas fa-trash"> </i> {{__('lang.delete')}}</a>
@endcan

<a href="#" class="dropdown-item get_activity_log" subject_id="{{$product->id}}" subject_type="{{get_class($product)}}" data-toggle="modal" data-target="#activityLogModal"> <i class="fa fa-history"> </i> {{__('lang.activity_list')}} </a> 


</div>
</div> <!-- end dropdown -->
<!-- Title-->
<h5 class="mt-0"><a href="javascript: void(0);" class="text-dark">  {{$product->title}}</a></h5>
<p class="text-muted text-uppercase"> <small>{{$product->sku}}</small></p>

<!-- Task info-->
<p class="mb-1">
<span class="pr-2 text-nowrap mb-2 d-inline-block">
<i class="mdi mdi-format-list-bulleted-type text-muted"></i>
<b>{{$product->warehouses->sum('qty')}}</b> {{__('lang.qty')}}
</span>
<span class="text-nowrap mb-2 d-inline-block">
<i class="mdi mdi-arrow-down text-muted"></i>
<b>{{$product->warehouses->sum('min_limit')}}</b> {{__('lang.min_limit')}}
</span>
 

</p>


</div> <!-- end card box-->
</div><!-- end col-->

@endforeach

</div>
<!-- end row -->



<div class="row">
<div class="col-12">
<div class="text-center mb-3">
{{$products->links()}}
</div>
</div> 
</div>



<!-- end row -->

</div> <!-- container -->

</div> <!-- content -->

@endsection


@section('head')

<title> {{__('lang.products')}} | {{config('settings.ProjectName')}}</title>

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
