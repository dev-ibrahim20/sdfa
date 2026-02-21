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
                  <div class="col-md-1">
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
    <button type="submit" name="export" value="excel"  class="btn btn-success mb-2 float-left" style="float: left !important">
        تصدير إلى إكسل
    </button>    
    </a>
    @endcan
    
    <h3 class="header-title mb-4">تقارير العينات</h4>
    
    <table class="table table-hover dt-responsive m-2 table-centered nowrap w-100" id="tickets-table">
    <thead>
    <tr>
    <th> # </th>   
    {{-- <th> {{__('lang.name')}} </th> --}}
    <th> اسم المنتج </th>
    <th> اسم المستورد</th>
    <th> {{__('lang.request_date')}} </th>
    <th> {{__('lang.request_sender_name')}} </th>
    <th> {{__('lang.workplace_address')}} </th>
    <th> حاله الطلب </th>
    
    
    
    
    </tr>
    </thead>
    
    <tbody>
    
    
    @foreach ( $data as $row )
    
    <tr >
    <td><a href="{{url('')}}/{{config('settings.BackendPath')}}/samplings/{{$row->id}}">{{$row->id}}</a></td>
    {{-- <td>{{$row->name}}</td> --}}
    
    <td>{{$row->samplingItems()->first()->product_name ?? '-'}}</td>
    <td>{{$row->customs_clearance_contact_number ?? '-'}}</td>
    <td>{{ $row->collection_date ?? '-' }}</td>
    <td>{{$row->request_sender_name}}</td>
    <td>{{$row->workplace->name ?? '-'}}</td>
    <td>   
    
        @if($row->status_order == 1)
            <h2 class="badge badge-info">طلب جديد</h2>
        @else
        <h2 class="badge badge-success">مكتمل</h2>    
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