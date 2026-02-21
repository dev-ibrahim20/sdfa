
<div class="form-body">

<div class="row">



<div class="col-xl-12">
<div class="card-box">


<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.name')}} <span class="text-danger">*</span></label>
{!! Form::text('name', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('lang.name')] ) !!}
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.order_list')}} </label>

{!! Form::select('city_id', $cities , isset($data) ?$data->city_id: null  ,['class' => 'form-control' ] ) !!}

</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('البريد الالكتروني')}}</label>
{!! Form::email('email', null , ['class' => 'form-control' ,'placeholder'=> __('البريد الالكتروني')] ) !!}
</div>
</div>

<div class="col-md-12">
<div class="form-group mb-3">
<div class="form-actions">
<button type="submit" class="btn btn-primary">
<i class="la la-check-square-o"></i> {{ __('lang.save')}}
</button>
</div>
</div>

</div>

</div>



</div>

</div>


