@extends('backend.layouts.default')
@section('content')
<div class="content">
<!-- Start Content-->
<div class="container-fluid">
    <form action="?">
<div class="row">

    <div class="col-md-2">
        <div class="form-group">
        <label for="projectinput1"><i class="fa fa-list"></i> {{__('lang.sector')}} </label>
        {!! Form::select('sector', $sectors,Arr::get($filter,'sector'), ['class' => 'form-control'  , 'placeholder'=> __('lang.sector')] ) !!}
        </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
        <label for="projectinput1"><i class="fa fa-list"></i> {{__('lang.workplace_address')}} </label>
        {!! Form::select('workplace_id', $workplaces,Arr::get($filter,'workplace_id'), ['class' => 'form-control'  , 'placeholder'=> __('lang.workplace_address')] ) !!}
        </div>
        </div>
                <div class="col-md-2">
        <div class="form-group">
        <label for="projectinput1"><i class="fa fa-list"></i> {{__('lang.type_of_requests')}} </label>
        {!! Form::select('type_of_requests', [
                'routine' => 'روتينيه',
                'emergency' => 'طوارئ',
                'monitor' => 'رصد وتقصي',
                'report' => 'بلاغات وشكاوي',
                'poisoning_incidents' => 'حوادث تسمم',
                'export' => 'تصدير',
                'license' => 'ترخيص',
                'inspection_and_clearance_of_shipment' => 'معاينة وفسح إرسالية',
                'inspection_campaigns' => 'حملات تفتيشيه',
                'Product_withdrawal_and_analysis' => 'سحب وتحليل منتج',
                'efficiency'=> 'التحقق من كفاْة شهادة المطابقه',
                'other'=> 'اخري'
            ],
            Arr::get($filter,'type_of_requests'), ['class' => 'form-control'  , 'placeholder'=> __('lang.type_of_requests')] ) !!}
        </div>
        </div>

        <div class="col-md-2">
        <div class="form-group">
        <label for="projectinput1"><i class="fa fa-list"></i> {{__('lang.type_of_samples')}} </label>
        {!! Form::select('type_of_samples', [
                'غذائيه' => 'غذائيه',
                'دوائيه' => 'دوائيه',
                'مستحضرات تجميل' => 'مستحضرات تجميل',
                'تبغ' => 'تبغ',
                'اعلاف' => 'اعلاف',
                'مبيدات' => 'مبيدات',
                'مواد بيطرية' => 'مواد بيطرية',
                'اجهزة طبية'=>'اجهزة طبية',
                'اخري' => 'اخري',
            ],
            Arr::get($filter,'type_of_samples'), ['class' => 'form-control'  , 'placeholder'=> __('lang.type_of_samples')] ) !!}
        </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
        <label for="projectinput1"><i class="fa fa-list"></i> {{__('lang.status')}} </label>
        {!! Form::select('status',['delivered' => 'تم تسليمها ','not_delivered' => 'لم يتم تسليمها ','not_been_withdrawn' => 'لم يتم سحبها ','rejected' => 'رفض' ,  'photo_only'=>'تصوير فقط'],Arr::get($filter,'status'), ['class' => 'form-control'  , 'placeholder'=> __('lang.status')] ) !!}
        </div>
        </div>
                <div class="col-md-2">
            <div class="form-group">
            <label for="projectinput1"><i class="fa fa-list"></i> رقم الطلب </label>
            {!! Form::text('order_number',Arr::get($filter,'order_number'), ['class' => 'form-control'  , 'placeholder'=>"رقم الطلب "] ) !!}
            </div>
            </div>
            <div class="col-md-2">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fa fa-date"></i> البيان الجمركي / رقم البلاغ</label>
                            {!! Form::text('commercial_registration_number', Arr::get($filter, 'commercial_registration_number'), ['class' => 'form-control', 'البيان الجمركي']) !!}
                        </div>
                    </div>
        <div class="col-md-2">
            <div class="form-group">
            <label for="projectinput1"><i class="fa fa-date"></i> من </label>
            {!! Form::date('from', Arr::get($filter, 'from'), ['class' => 'form-control'  , 'من'] ) !!}
            </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                <label for="projectinput1"><i class="fa fa-date"></i> الي </label>
                {!! Form::date('to', Arr::get($filter, 'to'), ['class' => 'form-control'  , 'الي'] ) !!}
                </div>
                </div>
                
                <div class="col-md-2">
    <div class="form-group">
        <label for="sample_collection_location"><i class="fa fa-building"></i> اسم الشركة </label>
        {!! Form::text('sample_collection_location', Arr::get($filter, 'sample_collection_location'), ['class' => 'form-control', 'placeholder' => 'اسم الشركة']) !!}
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
        <label for="request_sender_name"><i class="fa fa-user"></i> اسم مرسل الطلب </label>
        {!! Form::text('request_sender_name', Arr::get($filter, 'request_sender_name'), ['class' => 'form-control', 'placeholder' => 'اسم مرسل الطلب']) !!}
    </div>
</div>

<div class="col-md-1">
    <div class="form-group">
        <label for="collection_staff_name"><i class="fa fa-user"></i> موظف السحب </label>
        {!! Form::text('collection_staff_name', Arr::get($filter, 'collection_staff_name'), ['class' => 'form-control', 'placeholder' => 'اسم موظف السحب']) !!}
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
</div>
<div class="col-12">
<div class="card-box">

@can('create_samplings')
<a href="{{url('')}}/{{config('settings.BackendPath')}}/samplings/create" class="btn btn-sm btn-blue waves-effect     waves-light float-right">
<i class="mdi mdi-plus-circle"></i> {{__('lang.add_new')}}
</a>
@endcan

<h3 class="header-title mb-4">{{__('lang.samplings')}}</h4>

<table class="table table-hover dt-responsive m-2 table-centered nowrap w-100" id="tickets-table">
<thead>
<tr>
<th> # </th>   
{{-- <th> {{__('lang.name')}} </th> --}}
<th> اسم المنتج </th>
<th> اسم المستورد</th>
<th> {{__('lang.request_date')}} </th>
<th> {{__('lang.request_sender_name')}} </th>
<th> {{ __('lang.collection_staff_name') }} </th>
<th> {{__('lang.workplace_address')}} </th>
<th> حاله الطلب </th>
<th> الحاله  </th>



{{-- <th> {{__('lang.status')}} </th> --}}
{{-- @can('order_samplings')
<th> {{__('lang.order_list')}} </th>
@endcan --}}
@canany(['edit_samplings','publish_samplings','delete_samplings'])
<th> {{__('lang.options')}}</th>
@endcanany

</tr>
</thead>

<tbody>


@foreach ( $data as $row )

<tr >
<td><a href="{{url('')}}/{{config('settings.BackendPath')}}/samplings/{{$row->id}}">{{$row->id}}</a></td>
{{-- <td>{{$row->name}}</td> --}}

<td>{{$row->samplingItems()->first()->product_name ?? '-'}}</td>
<td>
    @if(!empty($row->customs_clearance_contact_number))
        {{$row->customs_clearance_contact_number}}
    @else
        {{$row->sample_collection_location ?? '-'}}-{{$row->container_location ?? '-'}}
    @endif
</td>
<td>{{ $row->collection_date ?? '-' }}</td>
<td>{{$row->request_sender_name}}</td>
<td>{{$row->collection_staff_name ?? '-'}}</td>
<td>{{$row->workplace->name ?? '-'}}</td>
<td>   

@if($row->status_order == 1)
    <h2 class="badge badge-info">طلب جديد</h2>
@elseif(is_null($row->status))
    <h2 class="badge badge-success">مكتمل</h2>
@else
    <h2 class="badge badge-success">{{ __('lang.statuss.' . $row->status) }}</h2>
@endif


    
<td>
    @if($row->closed == 0)
        <h2 class="badge badge-danger">لم يتم التدقيق</h2>
    @else
    <h2 class="badge badge-success"> تم التدقيق</h2>    
    @endif
    
</td>
{{-- <td style="padding:2px;vertical-align: middle;">
@if( $row->status == 1 )
<span class="label label-sm label-success"> <span class="badge badge-success"> <i class="fe-check"></i></span>
@else
<span class="label label-sm label-danger"> <span class="badge badge-danger"> <i class="fe-eye-off"></i> </span>
@endif
</td> --}}


{{-- @can('order_samplings')
<td style="padding:2px;vertical-align: middle;">
<div class="btn-group dropdown">
<a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-danger btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i> @if (isset($row->order_list)) {{$row->order_list}} @endif </a>
<div class="dropdown-menu dropdown-menu-right">
@for ($i = 1; $i <= count($data) ; $i++)
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/samplings/order/{{$row->id}}/{{$i}}"> {{$i}}   </a>
@endfor
</div>
</div>
</td>
@endcan --}}

@canany(['edit_samplings','publish_samplings','delete_samplings'])
<td style="padding:2px;vertical-align: middle;">
<div class="btn-group dropdown">
<a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light  btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
<div class="dropdown-menu dropdown-menu-right">

@can('edit_samplings')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/samplings/{{$row->id}}/edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.edit')}}</a>
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/samplings/{{$row->id}}/edit?repate=1"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.repate')}}</a>
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/samplings/{{$row->id}}"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.details')}}</a>

@endcan
@can('new_order_samplings')  
@if( $row->status_order == 1 )
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/samplings/status_order/{{$row->id}}/0"><i class="mdi mdi-close mr-2 text-muted font-18 vertical-middle"></i>مكتمل</a>
@endif
@endcan

@can('auditing_samplings') 
@if( $row->closed == 1 )
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/samplings/closed/{{$row->id}}/0"><i class="mdi mdi-close mr-2 text-muted font-18 vertical-middle"></i>لم يتم التدقيق</a>
@else
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/samplings/closed/{{$row->id}}/1"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>تم التدقيق</a>
@endif
@endcan


@can('delete_samplings')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/samplings/delete/{{$row->id}}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.delete')}}</a>
@endcan

</div>
</div>
</td>
@endcanany

</tr>

@endforeach


</tbody>
</table>



</div>
</div><!-- end col -->
</div>
<!-- end row -->


        <div class="row">
            <div class="col-8">
                <div class="text-center mb-3">
                    {{ $data->links() }}
                </div>
            </div>
            <div class="col-4">
               <div class="text-center mb-3">
                   العينات - {{ $data->total() }}
                </div>
            </div>
        </div>
    
</div> <!-- container -->

</div> <!-- content -->

@endsection


@section('head')

<title>{{__('lang.samplings')}} | {{config('settings.ProjectName')}}</title>

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
