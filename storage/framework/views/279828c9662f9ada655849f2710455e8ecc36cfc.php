<div class="form-body">

    <div class="row">

        <div class="col-xl-12">
            <div class="card-box">

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.sector')); ?> <span
                                    class="text-danger">*</span></label>

                            <?php echo Form::select('sector_id', $sectors, isset($data) ? $data->sector_id : null, [
                                'id' => 'sector_id',
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('lang.sector'),
                            ]); ?>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.city')); ?> <span
                                    class="text-danger">*</span></label>

                            <?php echo Form::select('city_id', $cities, isset($data) ? $data->city_id : null, [
                                'id' => 'city_id',
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('lang.city'),
                            ]); ?>


                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.workplace_address')); ?> <span
                                    class="text-danger">*</span></label>
                            <?php echo Form::select('workplace_id', $workplaces, isset($data) ? $data->workplace_id : null, [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('lang.workplace_address'),
                            ]); ?>


                        </div>
                    </div>
                    <!-- 'commercial_registration_number' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                <?php echo e(__('lang.commercial_registration_number')); ?></label>
                            <?php echo Form::text('commercial_registration_number', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.commercial_registration_number'),
                            ]); ?>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.form_submission_time')); ?>

                            </label>
                            <?php echo Form::time('form_submission_time', Request::is('*/samplings/*/edit') ? null : now('Asia/Riyadh')->format('H:i'), [
                                'class' => 'form-control',
                                'placeholder' => __('lang.form_submission_time'),
                                          'disabled' => Request::is('*/samplings/*/edit')  ? 'disabled' : null,
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.form_submission_date')); ?>

                            </label>
                            <?php echo Form::date('form_submission_date', Request::is('*/samplings/*/edit') ? null : now()->format('Y-m-d') , [
                                'class' => 'form-control',
                                'placeholder' => __('lang.form_submission_date'),
                                          'disabled' => Request::is('*/samplings/*/edit')  ? 'disabled' : null,
        
                            ]); ?>

                        </div>
                    </div>


                    <!-- 'container_responsible_contact_number' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                <?php echo e(__('lang.container_responsible_contact_number')); ?> </label>
                            <?php echo Form::text('container_responsible_contact_number', null, [
                                'class' => 'form-control',
                            
                                'placeholder' => __('lang.container_responsible_contact_number'),
                            ]); ?>

                        </div>
                    </div>

                    <!-- 'customs_clearance_contact_number' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                <?php echo e(__('lang.customs_clearance_contact_number')); ?> </label>
                            <?php echo Form::text('customs_clearance_contact_number', null, [
                                'class' => 'form-control',
                            
                                'placeholder' => __('lang.customs_clearance_contact_number'),
                            ]); ?>

                        </div>
                    </div>
                    <!-- 'shipping_bill_number' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.shipping_bill_number')); ?>

                            </label>
                            <?php echo Form::text('shipping_bill_number', null, [
                                'class' => 'form-control',
                            
                                'placeholder' => __('lang.shipping_bill_number'),
                            ]); ?>

                        </div>
                    </div>


                    <!-- 'container_number' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.container_number')); ?>

                            </label>
                            <?php echo Form::text('container_number', null, [
                                'class' => 'form-control',
                            
                                'placeholder' => __('lang.container_number'),
                            ]); ?>

                        </div>
                    </div>
                    <!-- 'sample_collection_location' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                <?php echo e(__('lang.sample_collection_location')); ?><span
                                    class="text-danger">*</span></label>
                            <?php echo Form::text('sample_collection_location', null, [
                                'class' => 'form-control',
                                 'required' => 'required',
                                'placeholder' => __('lang.sample_collection_location'),
                            ]); ?>

                        </div>
                    </div>
                    <!-- 'container_location' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.container_location')); ?><span
                                    class="text-danger">*</span>
                            </label>
                            <?php echo Form::text('container_location', null, [
                                'class' => 'form-control',
                                   'required' => 'required',
                                'placeholder' => __('lang.container_location'),
                            ]); ?>

                        </div>
                    </div>


                    <!-- 'required_test_types' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.required_test_types')); ?>

                            </label>
                            <?php echo Form::text('required_test_types', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.required_test_types'),
                            ]); ?>

                        </div>
                    </div>


                    <!-- 'sample_transport_packaging' field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                <?php echo e(__('lang.sample_transport_packaging')); ?> <span class="text-danger">*</span></label>
                            <?php echo Form::select('sample_transport_packaging', ['sanitized' => 'معقمه', 'not_sanitized' => 'غير معقمه'], null, [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('lang.sample_transport_packaging'),
                            ]); ?>

                        </div>
                    </div>
                    <!-- 'transportation_method' field -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.transportation_method')); ?>

                            </label>
                            <?php echo Form::text('transportation_method', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.transportation_method'),
                                   
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.temperature')); ?> <span
                                    class="text-danger">*</span></label>
                            <?php echo Form::select(
                                'temperature',
                                ['1' => 'مبرد (2-8)', '2' => 'مجمد -18', '3' => 'درجه حراره الغرفه 25'],
                                $data->temperature ?? null,
                                [
                                    'class' => 'form-control',
                                    'required' => 'required',
                                    'placeholder' => __('lang.temperature'),
                                ],
                            ); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.type_of_requests')); ?> </label>
                            <?php echo Form::select(
                                'type_of_requests',
                                [
                                    'routine' => 'روتينيه',
                                    'emergency' => 'طوارئ',
                                    'monitor' => 'رصد',
                                    'report' => 'بلاغ',
                                    'inspection_campaigns' => 'حملات تفتيشيه',
                                    'efficiency'=> 'التحقق من كفاْة شهادة المطابقه',
                                    'other'=> 'اخري'
                                ],
                                $data->type_of_requests ?? null,
                                [
                                    'class' => 'form-control',
                                    'placeholder' => __('lang.type_of_requests'),
                                ],
                            ); ?>

                        </div>
                    </div>
             
                <?php if(isset($data->samplingItems)): ?>   
                <?php $__currentLoopData = $data->samplingItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="formContainer">
                    <div class="row" id="originalDiv">
                    <!-- 'product_name' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.product_name')); ?><span class="text-danger">*</span>
                            </label>
                            <?php echo Form::text('product_name[]', $value->product_name, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.product_name'),
                                 'required' => 'required',
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <!-- 'product_type' field -->
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.product_type')); ?>

                            </label>
                            <?php echo Form::text('product_type[]',  $value->product_type, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.product_type'),
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group[]">
                            <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.type_of_samples')); ?>

                            </label>
                            <?php echo Form::select(
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
                                ],
                            ); ?>

                        </div>
                    </div>
                    <!-- 'manufacturer_company' field -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.manufacturer_company')); ?>

                            </label>
                            <?php echo Form::text('manufacturer_company[]', $value->manufacturer_company, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.manufacturer_company'),
                            ]); ?>

                        </div>
                    </div>
                    <!-- 'batch_serial_numbers' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.batch_serial_numbers')); ?>

                            </label>
                            <?php echo Form::text('batch_numbers[]', $value->batch_numbers, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.batch_serial_numbers'),
                            ]); ?>

                        </div>
                    </div>
                    <!-- 'production_date' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.production_date')); ?>

                            </label>
                            <?php echo Form::date('production_date[]', $value->production_date, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.production_date'),
                            ]); ?>

                        </div>
                    </div>
                    <!-- 'expiration_date' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.expiration_date')); ?>

                            </label>
                            <?php echo Form::date('expiry_date[]', $value->expiry_date, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.expiration_date'),
                            ]); ?>

                        </div>
                    </div>
                    <!-- Second Column -->
                    <div class="col-md-3">
                        <!-- 'sample_quantity' field -->
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.sample_quantity')); ?>

                            </label>
                            <?php echo Form::number('number_of_samples[]', $value->number_of_samples, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.sample_quantity'),
                            ]); ?>

                        </div>
                    </div>
                    <!-- 'sample_weight_quantity' field -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.sample_weight_quantity')); ?>

                            </label>
                            <?php echo Form::text('weight[]', $value->weight, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.sample_weight_quantity'),
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary repeatButton">إضافة عينة</button>
                        <button type="button" class="btn btn-danger removeButton">حذف عينة</button>
                    </div>
                </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
               <?php else: ?>
               <div id="formContainer">
                <div class="row" id="originalDiv">
                <!-- 'product_name' field -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> <?php echo e(__('lang.product_name')); ?>

                        </label>
                        <?php echo Form::text('product_name[]', isset($data)? $value->product_name : null , [
                            'class' => 'form-control',
                            'placeholder' => __('lang.product_name'),
                        ]); ?>

                    </div>
                </div>
                <div class="col-md-2">
                    <!-- 'product_type' field -->
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> <?php echo e(__('lang.product_type')); ?>

                        </label>
                        <?php echo Form::text('product_type[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.product_type'),
                        ]); ?>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group[]">
                        <label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.type_of_samples')); ?>

                        </label>
                        <?php echo Form::select(
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
                            ],
                        ); ?>

                    </div>
                </div>
                <!-- 'manufacturer_company' field -->
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> <?php echo e(__('lang.manufacturer_company')); ?>

                        </label>
                        <?php echo Form::text('manufacturer_company[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.manufacturer_company'),
                        ]); ?>

                    </div>
                </div>
                <!-- 'batch_serial_numbers' field -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> <?php echo e(__('lang.batch_serial_numbers')); ?>

                        </label>
                        <?php echo Form::text('batch_numbers[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.batch_serial_numbers'),
                        ]); ?>

                    </div>
                </div>
                <!-- 'production_date' field -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> <?php echo e(__('lang.production_date')); ?>

                        </label>
                        <?php echo Form::date('production_date[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.production_date'),
                        ]); ?>

                    </div>
                </div>
                <!-- 'expiration_date' field -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> <?php echo e(__('lang.expiration_date')); ?>

                        </label>
                        <?php echo Form::date('expiry_date[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.expiration_date'),
                        ]); ?>

                    </div>
                </div>
                <!-- Second Column -->
                <div class="col-md-3">
                    <!-- 'sample_quantity' field -->
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> <?php echo e(__('lang.sample_quantity')); ?>

                        </label>
                        <?php echo Form::number('number_of_samples[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.sample_quantity'),
                        ]); ?>

                    </div>
                </div>
                <!-- 'sample_weight_quantity' field -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="projectinput1">
                            <i class="fe-list"></i> <?php echo e(__('lang.sample_weight_quantity')); ?>

                        </label>
                        <?php echo Form::text('weight[]', null, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.sample_weight_quantity'),
                        ]); ?>

                    </div>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary repeatButton">إضافة عينة</button>
                    <button type="button" class="btn btn-danger removeButton">حذف عينة</button>
                </div>
            </div>
            </div>
                <?php endif; ?>
                
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.reason_for_analysis_request')); ?>

                            </label>
                            <?php echo Form::text('reason_for_analysis_request', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.reason_for_analysis_request'),
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.laboratory_name')); ?>

                            </label>
                            <?php echo Form::text('laboratory_name', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.laboratory_name'),
                            ]); ?>

                        </div>
                    </div>
                    
                              <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('البريد الالكتروني')); ?><span
                                    class="text-danger">*</span>
                            </label>
                            <?php echo Form::text('email', null, [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('البريد الالكتروني'),
                            ]); ?>

                        </div>
                    </div>

                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.request_sender_name')); ?><span
                                    class="text-danger">*</span>
                            </label>
                            <?php echo Form::text('request_sender_name', null, [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('lang.request_sender_name'),
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.request_date')); ?>

                            </label>
                            <?php echo Form::date('request_date', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.request_date'),
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.request_contact_number')); ?>

                            </label>
                            <?php echo Form::text('request_contact_number', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.request_contact_number'),
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.collection_staff_name')); ?>

                            </label>
                            <?php echo Form::text('collection_staff_name', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.collection_staff_name'),
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.collection_date')); ?>

                            </label>
                            <?php echo Form::date('collection_date', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.collection_date'),
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.collection_contact_number')); ?>

                            </label>
                            <?php echo Form::text('collection_contact_number', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.collection_contact_number'),
                            ]); ?>

                        </div>
                    </div>
                    <!-- 'additional_comments' field -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                <?php echo e(__('lang.notes')); ?></label>
                            <?php echo Form::textarea('notes', null, [
                                'class' => 'form-control',
                                'rows' => 4,
                                'placeholder' => __('lang.notes'),
                            ]); ?>

                        </div>
                    </div>
                         <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.sample_delivery_date')); ?>

                            </label>
                            <?php echo Form::date('sample_delivery_date', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.sample_delivery_date'),
                            ]); ?>

                        </div>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1">
                                <i class="fe-list"></i> <?php echo e(__('lang.sample_delivery_time')); ?>

                            </label>
                            <?php echo Form::time('sample_delivery_time', null, [
                                'class' => 'form-control',
                                'placeholder' => __('lang.sample_delivery_time'),
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectinput1"><i class="fe-list"></i>
                                <?php echo e(__('lang.status')); ?></label>
                            <?php echo Form::select(
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
                            ); ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput4"><?php echo e(__('lang.image1')); ?></label>
                            <?php if(isset($data->image1) && is_file(public_path('assets/web/theme_1/img/' . $data->image1))): ?>
                                <img src="<?php echo e(url('')); ?>/assets/web/theme_1/img/<?php echo e($data->image1); ?>" alt="" style="width:400px; height:200px;">
                            <?php elseif(isset($data->image1) && is_file(public_path('assets/web/theme_1/pdf/' . $data->image1))): ?>
                                <!-- عرض رابط لملف PDF -->
                                <a href="<?php echo e(url('')); ?>/assets/web/theme_1/pdf/<?php echo e($data->image1); ?>" target="_blank"><?php echo e(__('lang.pdf_link')); ?></a>
                            <?php else: ?>
                                
                            <?php endif; ?>
                            <?php echo Form::file('image1', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="projectinput4"><?php echo e(__('lang.image2')); ?></label>
                            <?php if(isset($data->image2) && is_file(public_path('assets/web/theme_1/img/' . $data->image2))): ?>
                                <img src="<?php echo e(url('')); ?>/assets/web/theme_1/img/<?php echo e($data->image2); ?>" alt="" style="width:400px; height:200px;">
                            <?php elseif(isset($data->image2) && is_file(public_path('assets/web/theme_1/pdf/' . $data->image2))): ?>
                                <!-- عرض رابط لملف PDF -->
                                <a href="<?php echo e(url('')); ?>/assets/web/theme_1/pdf/<?php echo e($data->image2); ?>" target="_blank">رابط ملف</a>
                            <?php else: ?>
                                
                            <?php endif; ?>
                            <?php echo Form::file('image2', null, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    
                    
         <div class="col-md-4">
    <div class="form-group">
        <label for="projectinput4"><?php echo e(__('lang.image3')); ?></label>
        <?php if(isset($data->image3)): ?>
            <?php
                $imagePath = public_path('assets/web/theme_1/' . (strpos($data->image3, '.pdf') !== false ? 'pdf' : 'img') . '/' . $data->image3);
            ?>
            <?php if(is_file($imagePath)): ?>
                <?php if(strpos($data->image3, '.pdf') !== false): ?>
                    <!-- عرض رابط لملف PDF -->
                    <a href="<?php echo e(url('')); ?>/assets/web/theme_1/pdf/<?php echo e($data->image3); ?>" target="_blank"><?php echo e(__('lang.pdf_link')); ?></a>
                <?php else: ?>
                    <!-- عرض صورة -->
                    <img src="<?php echo e(url('')); ?>/assets/web/theme_1/img/<?php echo e($data->image3); ?>" alt="" style="width:400px; height:200px;">
                <?php endif; ?>
            <?php else: ?>
                
            <?php endif; ?>
        <?php endif; ?>
        <?php echo Form::file('image3', null, ['class' => 'form-control']); ?>

    </div>
</div>

                    
                    <input type="hidden" name="repate" value="<?php echo e(request()->repate ?? 0); ?>">

                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> <?php echo e(__('lang.save')); ?>

                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <?php $__env->startSection('scripts'); ?>
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
                    $.get('<?php echo e(config('settings.BackendPath')); ?>/get-workplaces/' + cityId, function(data) {
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
            // Clone the original form content
            var clonedForm = $("#originalDiv").clone();
    
            // Clear input values in the cloned form
            clonedForm.find('input, select').val('');
    
            // Append the cloned form to the container
            $("#formContainer").append(clonedForm);
        });
    
        // Handle remove button click
        $(document).on("click", ".removeButton", function () {
            // Remove the parent div of the clicked remove button
            $(this).closest(".row").remove();
        });
    });
    </script>

 
    <?php $__env->stopSection(); ?>
<?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/test1/resources/views/backend/pages/samplings/form.blade.php ENDPATH**/ ?>