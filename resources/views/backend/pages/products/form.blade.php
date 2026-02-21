


<div class="form-body">

<div class="row">



<div class="col-xl-12">
<div class="card-box">




<div class="row">
<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fa fa-barcode"></i> {{__('lang.sku')}} </label>
{!! Form::text('sku', null , ['class' => 'form-control'  , 'required'=>'required' , 'placeholder'=> __('lang.sku')] ) !!}
</div>
</div>



</div>


<div class="row">


<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.description_ar')}}  <span class="text-danger">*</span></label>

{!! Form::text('title_ar', null , ['class' => 'form-control', 'required'=>'required', 'placeholder'=> __('lang.title_ar')] ) !!}

</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.description_en')}}</label>
{!! Form::text('title_en', null , ['class' => 'form-control' , 'placeholder'=> __('lang.title_en')] ) !!}
</div>
</div>


</div>
<hr>

@foreach( $categories as $category )
<div style="direction:ltr" class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-plus"></i> {{ $category->title }}</label>
</div>

@foreach( $category->sub_categories as $sub_category )
<div  style="margin-right:30px" class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{ $sub_category->title }}</label>
{!! Form::radio('category_id', $sub_category->id , ['class' => 'form-control' , 'placeholder'=> __('lang.title_en')] ) !!}
</div>
@endforeach

</div>
@endforeach


<hr>




<div class="row">
<div class="col-md-12">
<div class="form-group">

<button style="float:{{\Auth::user()->language == 'en' ? 'right' : 'left'}}" type="submit" class="btn btn-primary">
@if( !isset($product) )
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

