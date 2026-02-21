
<div class="form-body">

<div class="row">



<div class="col-xl-12">
<div class="card-box">


<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.title_en')}} <span class="text-danger">*</span></label>
{!! Form::text('title_en', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('lang.title_en')] ) !!}
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.title_ar')}} </label>

{!! Form::text('title_ar', null , ['class' => 'form-control', 'placeholder'=> __('lang.title_ar')] ) !!}

</div>
</div>


<div class="col-md-2">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.color')}} </label>

{!! Form::color('color', null , ['class' => 'form-control', 'placeholder'=> __('lang.title_ar')] ) !!}

</div>
</div>


<div class="col-md-6">
<div class="form-group">
{!! Form::hidden('is_first', 0) !!}
{!! Form::checkbox('is_first', 1, null) !!}
<label for="projectinput1"> {{__('lang.is_first')}} </label>

</div>
</div>


<div class="col-md-6">
<div class="form-group">
{!! Form::hidden('is_last', 0) !!}
{!! Form::checkbox('is_last', 1, null) !!}
<label for="projectinput1"> {{__('lang.is_last')}} </label>

</div>
</div>


<div class="col-md-6">
<div class="form-group">
{!! Form::hidden('is_editable', 0) !!}
{!! Form::checkbox('is_editable', 1, null) !!}
<label for="projectinput1"> {{__('lang.is_editable')}} </label>

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


