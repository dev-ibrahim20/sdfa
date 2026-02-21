


<div class="form-body">

<div class="row">



<div class="col-xl-12">
<div class="card-box">

<div class="row">



<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.title_ar')}} <span class="text-danger">*</span></label>

{!! Form::text('title_ar', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('lang.title_ar')] ) !!}

</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.title_en')}} </label>
{!! Form::text('title_en', null , ['class' => 'form-control' , 'placeholder'=> __('lang.title_en')] ) !!}
</div>
</div>

</div>

<div class="row">
<div class="col-md-12">
<div class="form-group">

<button style="float:{{\Auth::user()->language == 'en' ? 'right' : 'left'}}" type="submit" class="btn btn-primary">
@if( !isset($unit) )
{{ __('lang.save')}} <i class="fa fa-save"></i>
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

