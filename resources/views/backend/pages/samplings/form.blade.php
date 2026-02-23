<div class="form-body">

    <div class="row">

        <div class="col-xl-12">
            <div class="card-box">

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.sector') }} <span
                                    class="text-danger">*</span></label>

                            {!! Form::select('sector_id', $sectors, isset($data) ? $data->sector_id : null, [
                                'id' => 'sector_id',
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('lang.sector'),
                            ]) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.city') }} <span
                                    class="text-danger">*</span></label>

                            {!! Form::select('city_id', $cities, isset($data) ? $data->city_id : null, [
                                'id' => 'city_id',
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('lang.city'),
                            ]) !!}

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.workplace_address') }} <span
                                    class="text-danger">*</span></label>
                            {!! Form::select('workplace_id', $workplaces, isset($data) ? $data->workplace_id : null, [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('lang.workplace_address'),
                            ]) !!}

                        </div>
                    </div>
                    <!-- 'commercial_registration_number' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                {{ __('lang.commercial_registration_number') }}</label>
                            {!! Form::text('commercial_registration_number', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.commercial_registration_number'),
                            ]) !!}
                        </div>
                    </div>

                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.form_submission_time') }}</label>
                            @can('edit_sampling_datetime')
                                {!! Form::time('form_submission_time', Request::is('*/samplings/*/edit') ? null : now('Asia/Riyadh')->format('H:i'), [
                                    'class' => 'form-control',
                                    'placeholder' => __('lang.form_submission_time'),
                                    'disabled' => null,

                                ]) !!}
                            @else
                                {!! Form::time('form_submission_time', Request::is('*/samplings/*/edit') ? null : now('Asia/Riyadh')->format('H:i'), [
                                    'class' => 'form-control',
                                    'placeholder' => __('lang.form_submission_time'),
                                    'disabled' => Request::is('*/samplings/*/edit') ? 'disabled' : null,
                                ]) !!}
                            @endcan
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.form_submission_date') }}</label>
                            @can('edit_sampling_datetime')
                                {!! Form::date('form_submission_date', Request::is('*/samplings/*/edit') ? null : now()->format('Y-m-d'), [
                                    'class' => 'form-control',
                                    'placeholder' => __('lang.form_submission_date'),
                                     'disabled' => null,

                                ]) !!}
                            @else
                                {!! Form::date('form_submission_date', Request::is('*/samplings/*/edit') ? null : now()->format('Y-m-d'), [
                                    'class' => 'form-control',
                                    'placeholder' => __('lang.form_submission_date'),
                                    'disabled' => Request::is('*/samplings/*/edit') ? 'disabled' : null,
                                ]) !!}
                            @endcan
                        </div>
                    </div>


                    <!-- 'container_responsible_contact_number' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                {{ __('lang.container_responsible_contact_number') }} </label>
                            {!! Form::text('container_responsible_contact_number', null, [
                                'class' => 'form-control',

                                'placeholder' => __('lang.container_responsible_contact_number'),
                            ]) !!}
                        </div>
                    </div>

                    <!-- 'customs_clearance_contact_number' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                {{ __('lang.customs_clearance_contact_number') }} <span class="text-danger">*</span></label>
                            {!! Form::text('customs_clearance_contact_number', null, [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('lang.customs_clearance_contact_number'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'shipping_bill_number' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.shipping_bill_number') }}
                            </label>
                            {!! Form::text('shipping_bill_number', null, [
                                'class' => 'form-control',

                                'placeholder' => __('lang.shipping_bill_number'),
                            ]) !!}
                        </div>
                    </div>


                    <!-- 'container_number' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.container_number') }}
                            </label>
                            {!! Form::text('container_number', null, [
                                'class' => 'form-control',

                                'placeholder' => __('lang.container_number'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'sample_collection_location' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                {{ __('lang.sample_collection_location') }}<span
                                    class="text-danger">*</span></label>
                            {!! Form::text('sample_collection_location', null, [
                                'class' => 'form-control',
                                 'required' => 'required',
                                'placeholder' => __('lang.sample_collection_location'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'container_location' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.container_location') }}<span
                                    class="text-danger">*</span>
                            </label>
                            {!! Form::text('container_location', null, [
                                'class' => 'form-control',
                                   'required' => 'required',
                                'placeholder' => __('lang.container_location'),
                            ]) !!}
                        </div>
                    </div>


                    <!-- 'required_test_types' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.required_test_types') }}
                            </label>
                            {!! Form::text('required_test_types', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.required_test_types'),
                            ]) !!}
                        </div>
                    </div>


                    <!-- 'sample_transport_packaging' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                {{ __('lang.sample_transport_packaging') }} <span class="text-danger">*</span></label>
                            {!! Form::select('sample_transport_packaging', ['sanitized' => 'معقمه', 'not_sanitized' => 'غير معقمه'], null, [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('lang.sample_transport_packaging'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'transportation_method' field -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.transportation_method') }}
                            </label>
                            {!! Form::text('transportation_method', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.transportation_method'),

                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.temperature') }} <span
                                    class="text-danger">*</span></label>
                            {!! Form::select(
                                'temperature',
                                ['1' => 'مبرد', '2' => 'مجمد', '3' => 'درجه حراره الغرفه'],
                                $data->temperature ?? null,
                                [
                                    'class' => 'form-control',
                                    'required' => 'required',
                                    'placeholder' => __('lang.temperature'),
                                ],
                            ) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.type_of_requests') }} <span
                                    class="text-danger">*</span></label>
                            {!! Form::select(
                                'type_of_requests',
                                [
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
                                $data->type_of_requests ?? null,
                                [
                                    'class' => 'form-control',
                                    'placeholder' => __('lang.type_of_requests'),
                                    'required' => 'required',
                                ],
                            ) !!}
                        </div>
                    </div>

                <div id="formContainer">
                @if(isset($data->samplingItems) && count($data->samplingItems) > 0)
                @foreach($data->samplingItems as $key => $value)
                    <div class="row sampling-row">
                        {!! Form::hidden('sampling_item_id[]', $value->id) !!}
                    <!-- 'product_name' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.product_name') }}<span class="text-danger">*</span>
                            </label>
                            {!! Form::text('product_name[]', $value->product_name, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.product_name'),
                                 'required' => 'required',
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <!-- 'product_type' field -->
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.product_type') }}
                            </label>
                            {!! Form::text('product_type[]',  $value->product_type, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.product_type'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group[]">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.type_of_samples') }}
                                <span class="text-danger">*</span>
                            </label>
                            {!! Form::select(
                                'type_of_samples[]',
                                [
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
                                $value->type_of_samples ?? null,
                                [
                                    'class' => 'form-control',
                                    'placeholder' => __('lang.type_of_samples'),
                                    'required' => 'required',
                                ],
                            ) !!}
                        </div>
                    </div>
                    <!-- 'manufacturer_company' field -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.manufacturer_company') }}
                            </label>
                            {!! Form::text('manufacturer_company[]', $value->manufacturer_company, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.manufacturer_company'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'batch_serial_numbers' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.batch_serial_numbers') }}
                            </label>
                            {!! Form::text('batch_numbers[]', $value->batch_numbers, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.batch_serial_numbers'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'production_date' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.production_date') }}
                            </label>
                            {!! Form::date('production_date[]', $value->production_date, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.production_date'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'expiration_date' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.expiration_date') }}
                            </label>
                            {!! Form::date('expiry_date[]', $value->expiry_date, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.expiration_date'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- Second Column -->
                    <div class="col-md-3">
                        <!-- 'sample_quantity' field -->
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.sample_quantity') }}
                            </label>
                            {!! Form::number('number_of_samples[]', $value->number_of_samples, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.sample_quantity'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'sample_weight_quantity' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.sample_weight_quantity') }}
                            </label>
                            {!! Form::text('weight[]', $value->weight, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.sample_weight_quantity'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary repeatButton">إضافة عينة</button>
                        @can('delete_sampling_item')
                        <button type="button" class="btn btn-danger removeButton">حذف عينة</button>
                        @endcan
                    </div>
                </div>
                @endforeach
               @else
                <div class="row sampling-row">
                    {!! Form::hidden('sampling_item_id[]', null) !!}
                <!-- 'product_name' field -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> {{ __('lang.product_name') }}
                        </label>
                        {!! Form::text('product_name[]', isset($data)? $value->product_name : null , [
                            'class' => 'form-control',
                            'placeholder' => __('lang.product_name'),
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <!-- 'product_type' field -->
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> {{ __('lang.product_type') }}
                        </label>
                        {!! Form::text('product_type[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.product_type'),
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group[]">
                        <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.type_of_samples') }}
                        </label>
                        {!! Form::select(
                            'type_of_samples[]',
                            [
                                'غذائيه' => 'غذائية',
                                'دوائيه' => 'دوائية',
                                'مستحضرات تجميل' => 'مستحضرات تجميل',
                                'تبغ' => 'تبغ',
                                'اعلاف' => 'اعلاف',
                                'مبيدات' => 'مبيدات',
                                'مواد بيطرية' => 'مواد بيطرية',
                                 'اجهزة طبية'=>'اجهزة طبية',
                                'اخري' => 'أخرى',
                            ],
                            $data->type_of_samples ?? null,
                            [
                                'class' => 'form-control',
                                'placeholder' => __('lang.type_of_samples'),
                                'required' => 'required',
                            ],
                        ) !!}
                    </div>
                </div>
                <!-- 'manufacturer_company' field -->
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> {{ __('lang.manufacturer_company') }}
                        </label>
                        {!! Form::text('manufacturer_company[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.manufacturer_company'),
                        ]) !!}
                    </div>
                </div>
                <!-- 'batch_serial_numbers' field -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> {{ __('lang.batch_serial_numbers') }}
                        </label>
                        {!! Form::text('batch_numbers[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.batch_serial_numbers'),
                        ]) !!}
                    </div>
                </div>
                <!-- 'production_date' field -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> {{ __('lang.production_date') }}
                        </label>
                        {!! Form::date('production_date[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.production_date'),
                        ]) !!}
                    </div>
                </div>
                <!-- 'expiration_date' field -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> {{ __('lang.expiration_date') }}
                        </label>
                        {!! Form::date('expiry_date[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.expiration_date'),
                        ]) !!}
                    </div>
                </div>
                <!-- Second Column -->
                <div class="col-md-3">
                    <!-- 'sample_quantity' field -->
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> {{ __('lang.sample_quantity') }}
                        </label>
                        {!! Form::number('number_of_samples[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.sample_quantity'),
                        ]) !!}
                    </div>
                </div>
                <!-- 'sample_weight_quantity' field -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> {{ __('lang.sample_weight_quantity') }}
                        </label>
                        {!! Form::text('weight[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.sample_weight_quantity'),
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary repeatButton">إضافة عينة</button>
                    <button type="button" class="btn btn-danger removeButton">حذف عينة</button>
                </div>
            </div>
                @endif
            </div>
                {{-- <div id="formContainer">
                    <div class="row" id="originalDiv">
                    <!-- 'product_name' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.product_name') }}
                            </label>
                            {!! Form::text('product_name[]', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.product_name'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <!-- 'product_type' field -->
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.product_type') }}
                            </label>
                            {!! Form::text('product_type[]', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.product_type'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group[]">
                            <label for="projectinput1"><i class="fe-list"></i> {{ __('lang.type_of_samples') }}
                            </label>
                            {!! Form::select(
                                'type_of_samples[]',
                                [
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
                                $data->type_of_samples ?? null,
                                [
                                    'class' => 'form-control',
                                    'placeholder' => __('lang.type_of_samples'),
                                ],
                            ) !!}
                        </div>
                    </div>
                    <!-- 'manufacturer_company' field -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.manufacturer_company') }}
                            </label>
                            {!! Form::text('manufacturer_company[]', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.manufacturer_company'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'batch_serial_numbers' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.batch_serial_numbers') }}
                            </label>
                            {!! Form::text('batch_numbers[]', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.batch_serial_numbers'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'production_date' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.production_date') }}
                            </label>
                            {!! Form::date('production_date', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.production_date'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'expiration_date' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.expiration_date') }}
                            </label>
                            {!! Form::date('expiry_date', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.expiration_date'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- Second Column -->
                    <div class="col-md-3">
                        <!-- 'sample_quantity' field -->
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.sample_quantity') }}
                            </label>
                            {!! Form::number('number_of_samples[]', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.sample_quantity'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'sample_weight_quantity' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.sample_weight_quantity') }}
                            </label>
                            {!! Form::text('weight[]', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.sample_weight_quantity'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary repeatButton">إضافة عينة</button>
                        @can('delete_sampling_item')
                        <button type="button" class="btn btn-danger removeButton">حذف عينة</button>
                        @endcan
                    </div>
                </div>
                </div> --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.reason_for_analysis_request') }}
                            </label>
                            {!! Form::text('reason_for_analysis_request', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.reason_for_analysis_request'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.laboratory_name') }}
                            </label>
                            {!! Form::text('laboratory_name', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.laboratory_name'),
                            ]) !!}
                        </div>
                    </div>

                              <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('البريد الالكتروني') }}<span
                                    class="text-danger">*</span>
                            </label>
                            {!! Form::text('email', null, [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('البريد الالكتروني'),
                            ]) !!}
                        </div>
                    </div>

                    {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">
                                    <i class="fe-list"></i> {{ __('lang.product_safety_verification') }}
                                </label>
                                {!! Form::text('product_safety_verification', null, [
                                    'class' => 'form-control',
                                    'placeholder' => __('lang.product_safety_verification'),
                                ]) !!}
                            </div>
                        </div>       --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.request_sender_name') }}<span
                                    class="text-danger">*</span>
                            </label>
                            {!! Form::text('request_sender_name', null, [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('lang.request_sender_name'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.request_date') }}
                            </label>
                            {!! Form::date('request_date', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.request_date'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.request_contact_number') }}
                            </label>
                            {!! Form::text('request_contact_number', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.request_contact_number'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.collection_staff_name') }}
                            </label>
                            {!! Form::text('collection_staff_name', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.collection_staff_name'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.collection_date') }}
                            </label>
                            {!! Form::date('collection_date', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.collection_date'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.collection_contact_number') }}
                            </label>
                            {!! Form::text('collection_contact_number', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.collection_contact_number'),
                            ]) !!}
                        </div>
                    </div>
                    <!-- 'additional_comments' field -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                {{ __('lang.notes') }}</label>
                            {!! Form::textarea('notes', null, [
                                'class' => 'form-control',
                                'rows' => 4,
                                'placeholder' => __('lang.notes'),
                            ]) !!}
                        </div>
                    </div>
                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.sample_delivery_date') }}
                            </label>
                            {!! Form::date('sample_delivery_date', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.sample_delivery_date'),
                            ]) !!}
                        </div>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> {{ __('lang.sample_delivery_time') }}
                            </label>
                            {!! Form::time('sample_delivery_time', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.sample_delivery_time'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                {{ __('lang.status') }}</label>
                            {!! Form::select(
                                'status',
                                [
                                    'delivered' => 'تم تسليمها ',
                                    'not_delivered' => 'لم يتم تسليمها ',
                                    'not_been_withdrawn' => 'لم يتم سحبها ',
                                    'rejected' => 'رفض',
                                    'photo_only'=>'تصوير فقط',
                                ],
                                null,
                                ['class' => 'form-control', 'placeholder' => __('lang.status')],
                            ) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput4">{{ __('lang.image1') }}</label>
                            @if(isset($data->image1) && is_file(public_path('assets/web/theme_1/img/' . $data->image1)))
                                <img src="{{ url('') }}/assets/web/theme_1/img/{{ $data->image1 }}" alt="" style="width:400px; height:200px;">
                            @elseif(isset($data->image1) && is_file(public_path('assets/web/theme_1/pdf/' . $data->image1)))
                                <!-- عرض رابط لملف PDF -->
                                <a href="{{ url('') }}/assets/web/theme_1/pdf/{{ $data->image1 }}" target="_blank">{{ __('lang.pdf_link') }}</a>
                            @else
                                {{-- <p>{{ __('lang.no_file_uploaded') }}</p> --}}
                            @endif
                            {!! Form::file('image1', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput4">{{ __('lang.image2') }}</label>
                            @if(isset($data->image2) && is_file(public_path('assets/web/theme_1/img/' . $data->image2)))
                                <img src="{{ url('') }}/assets/web/theme_1/img/{{ $data->image2 }}" alt="" style="width:400px; height:200px;">
                            @elseif(isset($data->image2) && is_file(public_path('assets/web/theme_1/pdf/' . $data->image2)))
                                <!-- عرض رابط لملف PDF -->
                                <a href="{{ url('') }}/assets/web/theme_1/pdf/{{ $data->image2 }}" target="_blank">رابط ملف</a>
                            @else
                                {{-- <p>{{ __('lang.no_file_uploaded') }}</p> --}}
                            @endif
                            {!! Form::file('image2', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    {{-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput4"> {{ __('lang.image3') }} </label>
                            <img src="{{ url('') }}/assets/web/theme_1/img/{{ $data->image3 ?? '' }}"
                                alt="" style="width:400px; height:200px;">
                            {!! Form::file('image3', null, ['class' => 'form-control']) !!}
                        </div>
                    </div> --}}
         <div class="col-md-4">
    <div class="form-group">
        <label for="projectinput4">{{ __('lang.image3') }}</label>
        @if(isset($data->image3))
            @php
                $imagePath = public_path('assets/web/theme_1/' . (strpos($data->image3, '.pdf') !== false ? 'pdf' : 'img') . '/' . $data->image3);
            @endphp
            @if(is_file($imagePath))
                @if(strpos($data->image3, '.pdf') !== false)
                    <!-- عرض رابط لملف PDF -->
                    <a href="{{ url('') }}/assets/web/theme_1/pdf/{{ $data->image3 }}" target="_blank">{{ __('lang.pdf_link') }}</a>
                @else
                    <!-- عرض صورة -->
                    <img src="{{ url('') }}/assets/web/theme_1/img/{{ $data->image3 }}" alt="" style="width:400px; height:200px;">
                @endif
            @else
                {{-- لا يوجد ملف --}}
            @endif
        @endif
        {!! Form::file('image3', null, ['class' => 'form-control']) !!}
    </div>
</div>


                    <input type="hidden" name="repate" value="{{ request()->repate ?? 0 }}">

                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> {{ __('lang.save') }}
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $(document).ready(function() {
                console.log('sectorId');

                $('#sector_id').change(function() {
                    var sectorId = $(this).val();
                    console.log(sectorId); // Log the actual sectorId variable
                    console.log('Before change event'); // Log before the change event

                    $.get('get-cities/' + sectorId, function(data) {
                        // Update the city dropdown with new options based on the AJAX response
                        $('#city_id').empty();
                        $.each(data, function(key, value) {
                            $('#city_id').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    });
                });

                $('#city_id').change(function() {
                    var cityId = $(this).val();
                    $.get('{{ config('settings.BackendPath') }}/get-workplaces/' + cityId, function(data) {
                        // Update the workplace dropdown with new options based on the AJAX response
                        $('#workplace_id').empty();
                        $.each(data, function(key, value) {
                            $('#workplace_id').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    });
                });
            });
        </script>

<script>
    $(document).ready(function () {
        // Handle repeat button click
        $(document).on("click", ".repeatButton", function () {
            // Clone the first row template
            var clonedForm = $(".sampling-row").first().clone();

            // Clear input values in the cloned form
            clonedForm.find('input, select').val('');

            // Append the cloned form to the container
            $("#formContainer").append(clonedForm);
        });

        // Handle remove button click
        $(document).on("click", ".removeButton", function () {
            // Count the number of form rows
            var formRows = $(".sampling-row").length;

            // Only allow removal if there's more than one row
            if (formRows > 1) {
                // Remove the parent div of the clicked remove button
                $(this).closest(".sampling-row").remove();
            } else {
                // Show alert message in Arabic
                alert("لا يمكن حذف العنصر الأخير. يجب أن يبقى عنصر واحد على الأقل.");
            }
        });
    });
    </script>


    <script>
        $(document).ready(function() {
            $('form').on('submit', function() {
                var $btn = $(this).find('button[type="submit"]');
                $btn.prop('disabled', true);
                $btn.html('<i class="fa fa-spinner fa-spin"></i> ' + $btn.text());
            });
        });
    </script>
    @endsection
