
<div class="form-body">

<div class="row">



<div class="col-xl-12">
<div class="card-box">




<div class="col-md-6">
<div class="form-group">
<label for="status-select" class="mr-1"> {{__('lang.project')}}  </label>
{!! Form::select('project' , $projects->pluck('title','id') ,  null , ['required','id'=>'project','class' => 'custom-select', 'placeholder'=> '----'] ) !!}
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="status-select" class="mr-1"> {{__('lang.building')}}  </label>
{!! Form::select('building_id' , [] , null , ['required','id'=>'building','class' => 'custom-select', 'placeholder'=> '----'] ) !!}
</div>
</div>

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


