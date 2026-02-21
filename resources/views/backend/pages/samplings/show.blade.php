@extends('backend.layouts.default')

@section('content')
<style>
    body {
        font-size: 14px;
    }

    .card-box {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .black-line {
        border: 0;
        border-top: 1px solid #000;
        margin: 20px 0;
    }

    .table td {
        padding: 10px;
        font-size: 15px;
    }

    .header-title {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .col-md-6 {
        padding: 10px;
    }

    hr {
        margin: 10px 0;
    }

    .print-btn-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .print-btn-container button {
        padding: 15px 30px;
        font-size: 18px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
         margin-top: 10px;

    }

    .print-btn-container button:hover {
        background-color: #45a049;
    }

    @media print {
        .print-btn-container {
            display: none;
        }

        .no-print {
            display: none;
        }

        .print-only {
            display: block !important;
        }

        body {
            font-size: 12px;
        }

        .card-box {
            padding: 10px;
            margin-bottom: 10px;
        }

        .table td {
            padding: 4px;
            font-size: 14px;
        }

        hr {
            margin: 5px 0;
        }
    }
</style>

<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card-box">



            <table style="width: 100%;">
                <tr>
                    <td style="text-align: right; padding-right: 20px;">
                        <p class="header-title mb-6"> <B> الهيئه العامه للغذاء والدواء - نموذج سحب عينه </B> </p>
                        <p class="header-title mb-6"> <B> السادة مكتب د. علي الدهيمان للاستشارات البيئية￼￼￼￼￼</B> </p>
                    </td>
                    <td style="text-align: left; padding-left: 20px;">
                        <img src="{{url('/assets/admin/images/sdf.png')}}" alt="شعار" style="width: 100px; height: 100px;">
                    </td>
                </tr>
            </table>
            
￼￼￼￼￼<p class="header-title mb-6"> <B>
     السلام عليكم ورحمة الله وبركاته
    إشارة الى ترسيه مشروع تعيين طرف ثالث لسحب العينات من المنافذ والمنشأة الخاضعة لرقابة الهيئة على مكتبكم بموجب التعميد رقم 1444/2302060هـ وتاريخ 1444/08/29هـ وعقد المشروع الموقع بين الهيئة العامة للغذاء والدواء ومكتبكم بتاريخ 1444/10/24هــ</B> </p>


    <hr class="black-line">

<div class="row">

 
            <div class="col-md-6 border-right border-bottom">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Serial:</td>
                            <td>{{$data->id}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.sector') }}</td>
                            <td>{{$data->sector->name}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.commercial_registration_number') }}</td>
                            <td>{{$data->commercial_registration_number}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.form_submission_date') }}</td>
                            <td>{{$data->form_submission_date}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.customs_clearance_contact_number') }}</td>
                            <td>{{$data->customs_clearance_contact_number}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.container_number') }}</td>
                            <td>{{$data->container_number}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.required_test_types') }}</td>
                            <td>{{$data->required_test_types}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.sample_transport_packaging') }}</td>
                            <td>{{$data->sample_transport_packaging}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.temperature') }}</td>
                            <td>{{ trans('lang.temperatures.' . $data->temperature) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 border-left border-bottom">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>{{ __('lang.city') }}</td>
                            <td>{{$data->city->name}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.workplace_address') }}</td>
                            <td>{{$data->workplace->name}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.form_submission_time') }}</td>
                            <td>{{$data->form_submission_time}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.container_responsible_contact_number') }}</td>
                            <td>{{$data->container_responsible_contact_number}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.shipping_bill_number') }}</td>
                            <td>{{$data->shipping_bill_number}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.sample_collection_location') }}</td>
                            <td>{{$data->sample_collection_location}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.container_location') }}</td>
                            <td>{{$data->container_location}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('lang.transportation_method') }}</td>
                            <td>{{$data->transportation_method}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
      
    


<hr style="width:100%;height:2px;text-align:left;margin-left:0">  


<div class="col-md-12">
    <h3>بيانات المنتج</h3>
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('lang.product_name') }}</th>
                    <th>{{ __('lang.product_type') }}</th>
                    <th>{{ __('lang.type_of_samples') }}</th>
                    <th>{{ __('lang.manufacturer_company') }}</th>
                    <th>{{ __('lang.batch_serial_numbers') }}</th>
                    <th>{{ __('lang.production_date') }}</th>
                    <th>{{ __('lang.expiration_date') }}</th>
                    <th>{{ __('lang.sample_quantity') }}</th>
                    <th>{{ __('lang.sample_weight_quantity') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data->samplingItems as $item)
                <tr>
                    <td>{{ $item['product_name'] }}</td> <!-- product_name -->
                    <td>{{ $item['product_type'] }}</td> <!-- product_type -->
                    <td>{{ $item['type_of_samples'] }}</td> <!-- type_of_samples -->
                    <td>{{ $item['manufacturer_company'] }}</td> <!-- manufacturer_company -->
                    <td>{{ $item['batch_numbers'] }}</td> <!-- batch_numbers -->
                    <td>{{ $item['production_date'] }}</td> <!-- production_date -->
                    <td>{{ $item['expiry_date'] }}</td> <!-- expiry_date -->
                    <td>{{ $item['number_of_samples'] }}</td> <!-- number_of_samples -->
                    <td>{{ $item['weight'] }}</td> <!-- weight -->
                          
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</div>

<hr style="width:100%;height:2px;text-align:left;margin-left:0">  


        <div class="col-md-6 border-right border-bottom">
            <table class="table">
                <tbody>
                    <tr>
                        <td>{{ __('lang.reason_for_analysis_request') }}</td>
                        <td>{{$data->reason_for_analysis_request}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lang.request_sender_name') }}</td>
                        <td>{{$data->request_sender_name}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lang.request_contact_number') }}</td>
                        <td>{{$data->request_contact_number}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lang.collection_date') }}</td>
                        <td>{{$data->collection_date}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lang.sample_delivery_date') }}</td>
                        <td>{{$data->sample_delivery_date}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lang.status') }}</td>
                        <td>{{$data->status}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 border-left border-bottom">
            <table class="table">
                <tbody>
                    <tr>
                        <td>{{ __('lang.laboratory_name') }}</td>
                        <td>{{$data->laboratory_name}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lang.request_date') }}</td>
                        <td>{{$data->request_date}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lang.collection_staff_name') }}</td>
                        <td>{{$data->collection_staff_name}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lang.collection_contact_number') }}</td>
                        <td>{{$data->collection_contact_number}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lang.sample_delivery_time') }}</td>
                        <td>{{$data->sample_delivery_time}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lang.notes') }}</td>
                        <td>{{$data->notes}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
 
<div class="print-btn-container">
    <button onclick="window.print()">طباعة</button>
</div>

<!-- نموذج الفحص النهائي للطباعة فقط -->
<!--<div class="print-only" style="display: none;">-->
<!--    <hr style="width:100%;height:2px;text-align:left;margin-left:0;margin-top:30px;">-->
    
<!--    <div style="text-align: center; font-weight: bold; font-size: 16px; margin: 20px 0;">-->
<!--        الاستخدام المتقن لقيم عند استلام العينات من الشركة المعروضة-->
<!--    </div>-->
    
<!--    <div class="row" style="margin: 20px 0;">-->
<!--        <div class="col-md-12">-->
<!--            <div style="border: 2px solid #000; padding: 15px;">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-6">-->
<!--                        <div style="margin-bottom: 15px;">-->
<!--                            <label style="margin-left: 10px;">☐</label>-->
<!--                            <span>يوجد مؤشر حرارة إلكتروني مفعل</span>-->
<!--                        </div>-->
<!--                        <div style="margin-bottom: 15px;">-->
<!--                            <label style="margin-left: 10px;">☐</label>-->
<!--                            <span>قراءة مؤشر الحرارة والرطوبة الإلكتروني و/أو خطها الكتروني</span>-->
<!--                        </div>-->
<!--                        <div style="margin-bottom: 15px;">-->
<!--                            <label style="margin-left: 10px;">☐</label>-->
<!--                            <span>المنتج متوافق مع المنطقة التجارية للعينة</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-6">-->
<!--                        <div style="margin-bottom: 15px;">-->
<!--                            <label style="margin-left: 10px;">☐</label>-->
<!--                            <span>يوجد مؤشر حرارة إلكتروني مفعل</span>-->
<!--                        </div>-->
<!--                        <div style="margin-bottom: 15px;">-->
<!--                            <label style="margin-left: 10px;">☐</label>-->
<!--                            <span>إيقاف المؤشر الإلكتروني عند استلام العينات</span>-->
<!--                        </div>-->
<!--                        <div style="margin-bottom: 15px;">-->
<!--                            <label style="margin-left: 10px;">☐</label>-->
<!--                            <span>تسجيل قراءة المفتش للحرارة والرطوبة عند وصول العينات</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                
<!--                <div style="margin-top: 20px;">-->
<!--                    <label style="margin-left: 10px;">☐</label>-->
<!--                    <span>عدد كمية العينات المستلمة متوافق مع عدد كمية العينات المرسلة</span>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    
<!--    <div class="row" style="margin: 20px 0;">-->
<!--        <div class="col-md-12">-->
<!--            <div style="border: 2px solid #000; padding: 15px;">-->
<!--                <h4 style="text-align: center; margin-bottom: 15px;">ملاحظات</h4>-->
                
<!--                <div class="row">-->
<!--                    <div class="col-md-6">-->
<!--                        <div style="margin-bottom: 15px;">-->
<!--                            <label style="margin-left: 10px;">☐</label>-->
<!--                            <span>حالة طبيعية للمنتج/ المنتجات لشروط النقل والتخزين</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-6">-->
<!--                        <div style="margin-bottom: 15px;">-->
<!--                            <label style="margin-left: 10px;">☐</label>-->
<!--                            <span>حالة طبيعية للمنتج/ المنتجات لشروط النقل والتخزين</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                
<!--                <div style="margin: 15px 0;">-->
<!--                    <strong>قرار المطابقة</strong>-->
<!--                </div>-->
                
<!--                <div style="margin: 15px 0;">-->
<!--                    <span>أسباب عدم مطابقة المنتج/ المنتجات:</span>-->
<!--                    <div style="border-bottom: 1px dotted #000; height: 20px; margin: 10px 0;"></div>-->
<!--                    <div style="border-bottom: 1px dotted #000; height: 20px; margin: 10px 0;"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    
<!--    <div class="row" style="margin: 20px 0;">-->
<!--        <div class="col-md-12">-->
<!--            <div style="border: 2px solid #000; padding: 15px;">-->
<!--                <h4 style="text-align: center; margin-bottom: 15px;">القرار النهائي</h4>-->
                
<!--                <div class="row">-->
<!--                    <div class="col-md-6">-->
<!--                        <div style="margin-bottom: 15px;">-->
<!--                            <label style="margin-left: 10px;">☐</label>-->
<!--                            <span>قبول العينات</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-6">-->
<!--                        <div style="margin-bottom: 15px;">-->
<!--                            <label style="margin-left: 10px;">☐</label>-->
<!--                            <span>رفض العينات</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                
<!--                <div style="margin: 15px 0;">-->
<!--                    <span>تاريخ تبليغ الشركة بعدم مطابقة المنتج/ المنتجات لشروط النقل والتخزين (......./......./.......................................................................................................)</span>-->
<!--                </div>-->
<!--                <div style="margin: 15px 0;">-->
<!--                    <span>ملاحظات أخرى (.......................................................................................................................)</span>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    
<!--    <div class="row" style="margin: 20px 0;">-->
<!--        <div class="col-md-12">-->
<!--            <table style="width: 100%; border: 2px solid #000; border-collapse: collapse;">-->
<!--                <thead>-->
<!--                    <tr>-->
<!--                        <th style="border: 1px solid #000; padding: 10px; text-align: center;">اسم المفتش</th>-->
<!--                        <th style="border: 1px solid #000; padding: 10px; text-align: center;">التوقيع</th>-->
<!--                        <th style="border: 1px solid #000; padding: 10px; text-align: center;">التاريخ</th>-->
<!--                    </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                    <tr>-->
<!--                        <td style="border: 1px solid #000; padding: 30px;"></td>-->
<!--                        <td style="border: 1px solid #000; padding: 30px;"></td>-->
<!--                        <td style="border: 1px solid #000; padding: 30px;"></td>-->
<!--                    </tr>-->
<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

</div>
<div class="no-print">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="projectinput4">{{ __('lang.image1') }}</label>
                @if(isset($data->image1))
                    @php
                        $imagePath = public_path('assets/web/theme_1/' . (strpos($data->image1, '.pdf') !== false ? 'pdf' : 'img') . '/' . $data->image1);
                    @endphp
                    @if(is_file($imagePath))
                        @if(strpos($data->image1, '.pdf') !== false)
                            <a href="{{ url('') }}/assets/web/theme_1/pdf/{{ $data->image1 }}" target="_blank">رابط ملف</a>
                        @else
                            <img src="{{ url('') }}/assets/web/theme_1/img/{{ $data->image1 }}" alt="" style="width:100%; height:auto;">
                        @endif
                    @else
                        <p>رابط ملف</p>
                    @endif
                @else
                    <p>رابط ملف</p>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="projectinput4">{{ __('lang.image2') }}</label>
                @if(isset($data->image2))
                    @php
                        $imagePath = public_path('assets/web/theme_1/' . (strpos($data->image2, '.pdf') !== false ? 'pdf' : 'img') . '/' . $data->image2);
                    @endphp
                    @if(is_file($imagePath))
                        @if(strpos($data->image2, '.pdf') !== false)
                            <a href="{{ url('') }}/assets/web/theme_1/pdf/{{ $data->image2 }}" target="_blank">رابط ملف</a>
                        @else
                            <img src="{{ url('') }}/assets/web/theme_1/img/{{ $data->image2 }}" alt="" style="width:100%; height:auto;">
                        @endif
                    @else
                        <p>رابط ملف</p>
                    @endif
                @else
                    <p>رابط ملف</p>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="projectinput4">{{ __('lang.image3') }}</label>
                @if(isset($data->image3))
                    @php
                        $imagePath = public_path('assets/web/theme_1/' . (strpos($data->image3, '.pdf') !== false ? 'pdf' : 'img') . '/' . $data->image3);
                    @endphp
                    @if(is_file($imagePath))
                        @if(strpos($data->image3, '.pdf') !== false)
                            <a href="{{ url('') }}/assets/web/theme_1/pdf/{{ $data->image3 }}" target="_blank">رابط ملف</a>
                        @else
                            <img src="{{ url('') }}/assets/web/theme_1/img/{{ $data->image3 }}" alt="" style="width:100%; height:auto;">
                        @endif
                    @else
                        <p>رابط ملف</p>
                    @endif
                @else
                    <p>رابط ملف</p>
                @endif
            </div>
        </div>
    </div>
</div>


                    
            

</div>
    </div><!-- end col -->
</div>
<!-- end row -->

</div> <!-- container -->

</div> <!-- content -->

@endsection


@section('head')

<title>{{__('lang.update')}}  |  نموذج سحب عينه |{{config('settings.ProjectName')}}</title>


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


        <link href="{{url('')}}/assets/admin/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

        <!-- select css -->
        <link href="{{url('')}}/assets/admin/libs/jquery-nice-select/nice-select.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />


        <!-- picker css -->
        <link href="{{url('')}}/assets/admin/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('scripts')

 <!-- Vendor js -->
 <script src="{{url('')}}/assets/admin/js/vendor.min.js"></script>
        <!-- Chart JS -->
        <script src="{{url('')}}/assets/admin/libs/chart-js/Chart.bundle.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/moment/moment.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- Dashboard init JS -->
        <script src="{{url('')}}/assets/admin/js/pages/dashboard-3.init.js"></script>

        <script src="{{url('')}}/assets/admin/libs/dropzone/dropzone.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/dropify/dropify.min.js"></script>
        <!-- Init js-->
        <script src="{{url('')}}/assets/admin/js/pages/form-fileuploads.init.js"></script>

        <script src="{{url('')}}/assets/admin/libs/jquery-nice-select/jquery.nice-select.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/switchery/switchery.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/multiselect/jquery.multi-select.js"></script>
        <script src="{{url('')}}/assets/admin/libs/select2/select2.min.js"></script>

        <script src="{{url('')}}/assets/admin/libs/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

        <script src="{{url('')}}/assets/admin/libs/flatpickr/flatpickr.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- Init js-->
       <script src="{{url('')}}/assets/admin/js/pages/form-pickers.init.js"></script>

       <!-- App js-->
       <script src="{{url('')}}/assets/admin/js/app.min.js"></script>

@endsection
