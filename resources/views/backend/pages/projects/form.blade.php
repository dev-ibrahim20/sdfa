
<div class="form-body">

<div class="row">



<div class="col-xl-12">
<div class="card-box">

<div class="row">


<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.title_ar')}} <span class="text-danger">*</span> </label>
{!! Form::text('title_ar', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('lang.title_ar')] ) !!}
</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.title_en')}} </label>
{!! Form::text('title_en', null , ['class' => 'form-control', 'placeholder'=> __('lang.title_en')] ) !!}
</div>
</div>



</div>

<hr>

<div class="row">


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-user"></i> {{__('lang.supervisor_name_ar')}} </label>
{!! Form::text('supervisor_name_ar', null , ['class' => 'form-control' , 'placeholder'=> __('lang.supervisor_name_ar')] ) !!}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-user"></i> {{__('lang.supervisor_name_en')}} </label>
{!! Form::text('supervisor_name_en', null , ['class' => 'form-control' , 'placeholder'=> __('lang.supervisor_name_en')] ) !!}
</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fa fa-envelope"></i> {{__('lang.supervisor_email')}} </label>

{!! Form::email('supervisor_email', null , ['class' => 'form-control' , 'placeholder'=> __('lang.supervisor_email')] ) !!}

</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"> <i class="fe-phone"></i> {{__('lang.supervisor_phone')}} </label>

{!! Form::text('supervisor_phone', null , ['class' => 'form-control' , 'placeholder'=> __('lang.supervisor_phone')] ) !!}

</div>
</div>


</div>


<hr>

<div class="row">


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-calendar"></i> {{__('lang.planned_start_date')}} </label>
{!! Form::date('planned_start_date', null , ['class' => 'form-control flatpickr-input active' , 'placeholder'=> __('lang.planned_start_date')] ) !!}
</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fa fa-calendar"></i> {{__('lang.actual_start_date')}} </label>
{!! Form::date('actual_start_date', null , ['class' => 'form-control' , 'placeholder'=> __('lang.actual_start_date')] ) !!}
</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-calendar"></i> {{__('lang.planned_finish_date')}} </label>

{!! Form::date('planned_finish_date', null , ['class' => 'form-control' , 'placeholder'=> __('lang.planned_finish_date')] ) !!}

</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"> <i class="fa fa-calendar"></i> {{__('lang.actual_finish_date')}} </label>

{!! Form::date('actual_finish_date', null , ['class' => 'form-control' , 'placeholder'=> __('lang.actual_finish_date')] ) !!}

</div>
</div>


</div>


<div class="row">
<div class="col-md-12">
<div class="form-group">

<button style="float:{{\Auth::user()->language == 'en' ? 'right' : 'left'}}" type="submit" class="btn btn-primary">
@if( !isset($project) )
{{ __('lang.next')}} <i class="fa fa-arrow-{{\Auth::user()->language == 'en' ? 'right' : 'left'}}"></i>
@else
{{ __('lang.update')}} <i class="fa fa-save"></i>
@endif
</button>
</div>

</div>
</div>


</div>


 



</div>

</div>

