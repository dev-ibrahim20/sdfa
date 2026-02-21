@extends('backend.layouts.default')

@section('content')
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">



<p class="header-title mb-6"> <B> {{__('lang.warehouses')}} | {{$product->title}} </B> </p>

{!! Form::model( $product ,[ 'route' => ['product_warehouses_update',$product->id] , 'method'=>'POST' ,  'class' => 'form' ,  'files' => 'true' ]) !!}


<div class="col-xl-12">
<div id="accordion" class="mb-3">


@foreach($projects as $k=>$project)
@can('list_project_'.$project->id)
<div class="card mb-1">
    <div class="card-header" id="heading{{$k}}">
        <h5 class="m-0">
            <a class="text-dark collapsed" data-toggle="collapse" href="#collapse{{$k}}" aria-expanded="false">
                <i class="mdi mdi-pencil-circle mr-1 text-primary"></i> 
                {{$project->title}}
            </a>
        </h5>
    </div>

<div id="collapse{{$k}}" class="collapse" aria-labelledby="heading{{$k}}" data-parent="#accordion" style="">

<table class="table table-hover mt-1 mb-0">
<thead class="thead-light">
<tr>
<th>#</th>
<th>{{__('lang.title')}}</th>
<th style="width:20%">{{__('lang.qty')}}</th>
<th style="width:20%">{{__('lang.min_limit')}}</th>
</tr>
</thead>
<tbody>

@foreach( $project->warehouses as $k=>$warehouse )
{!! Form::hidden('warehouse_id[]', $warehouse->id) !!}
@php $product_warehouse = $warehouse->products()->where('product_id',$product->id)->first(); @endphp
<tr>
<th scope="row">{{$k+1}}</th>
<td>{{$warehouse->title}}</td>
<td>
{!! Form::number('qty[]', $product_warehouse->qty ?? null , ['class' => 'form-control', 'placeholder'=> __('lang.qty')] ) !!}
</td>
<td>
{!! Form::number('min_limit[]', $product_warehouse->min_limit ?? null , ['class' => 'form-control', 'placeholder'=> __('lang.min_limit')] ) !!}
</td>
</tr>
@endforeach


</tbody>
</table>


</div>
</div>
@endcan
@endforeach



    </div> <!-- end #accordions-->
</div> <!-- end col -->



<div class="row">
<div class="col-md-12">
<div class="form-group">

<button style="float:{{\Auth::user()->language == 'en' ? 'right' : 'left'}}" type="submit" class="btn btn-primary">
{{ __('lang.update')}} <i class="fa fa-save"></i>
</button>
</div>

</div>
</div>

{!!Form::close()!!}

</div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

@endsection


@section('head')

<title>{{__('lang.update_product')}} | {{$product->title}} | {{config('settings.ProjectName')}}</title>

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

@endsection
