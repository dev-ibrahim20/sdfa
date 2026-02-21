
<div class="form-body">

<div class="row">

<div class="col-xl-12">
<div class="card-box">


<div class="row">



<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i>  Type  <span class="text-danger">*</span> </label>
{!! Form::select('report_type', [
  ''=>'Select Type',
  'pull'=>'سحب كابلات',
  'installation'=>'تركيب الراكات',
  'locking'=>'تقفيل الراكات',
  'internal'=>' الفايبر الداخلى',
  'external'=>' الفايبر الخارجى',
  ] , null , ['class' => 'form-control'] ) !!}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> Floor </label>
{!! Form::select('floor_id', [] , null , ['class' => 'form-control' , 'required'=>'required'] ) !!}
</div>
</div>



<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> LCR </label>
{!! Form::select('lcr_id', [] , null , ['class' => 'form-control' , 'required'=>'required'] ) !!}
</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> Task </label>
{!! Form::select('task_id', [] , null , ['class' => 'form-control' , 'required'=>'required'] ) !!}
</div>
</div>

</div>






<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> Number <span class="text-danger">*</span> </label>
{!! Form::text('title_ar', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('lang.title_ar')] ) !!}
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> Category  </label>
<div  class="col-md-8">
<div class="form-group">
<select  data-live-search="true"  data-actions-box="true" name="category_id" class="selectpicker"  data-selected-text-format="count > 6" data-style="btn-light">
        @foreach( $categories as $category)
        @if( count($category->sub_categories) )
        <optgroup label="{{$category->title}}">
        @foreach( $category->sub_categories as $sub_category)
        <option @if( isset($job_order) && $sub_category->id == $job_order->category_id) ) selected @endif value="{{$sub_category->id}}">{{$sub_category->title}}</option>
        @endforeach
        </optgroup>
        @endif
        @endforeach
        </select>

	</div>
</div>
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

<hr>

<div class="row">

<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"> <i class="fe-user"></i> {{__('lang.contractor')}} </label>

{!! Form::select('contractor_id', $contractors->pluck('title','id')  , null , ['class' => 'form-control' , 'placeholder'=> __('lang.select')] ) !!}

</div>
</div>

</div>




<div class="row">

<div class="col-md-12">
<div class="form-group">
<label for="projectinput1"> <i class="fe-list"></i> {{__('lang.activity_description')}} </label>

{!! Form::textarea('activity_description', null , ['class' => 'summernote' , 'placeholder'=> __('lang.activity_description')] ) !!}

</div>
</div>

</div>




<div class="row">
<div class="col-md-12">
<div class="form-group">

<button style="float:{{\Auth::user()->language == 'en' ? 'right' : 'left'}}" type="submit" class="btn btn-primary">

{{ __('lang.save')}} <i class="fa fa-save"></i>

</button>
</div>

</div>
</div>


</div>

</div>

</div>
@push('scripts')
<script type="text/javascript">

var floors = @json($floors);
var lcrs = @json($lcrs);
var tasks = @json($tasks);

var floors_menu = $('select[name="floor_id"]');
var lcr_id_menu = $('select[name="lcr_id"]');
var task_id_menu = $('select[name="task_id"]');

$('select[name="report_type"]').on('change',function(){
let report_type = $(this).val();
floors_menu.empty().trigger('change');
floors_menu.append("<option value=''> --- </option>");
$.each(floors, function(i,floor) {
if( floor.report_type == report_type ){
floors_menu.append("<option value='"+ floor.id +"'>" + floor.title_ar + "</option>");
}
});


task_id_menu.empty().trigger('change');
task_id_menu.append("<option value=''> --- </option>");
$.each(tasks, function(i,task) {
if( task.report_type == report_type ){
task_id_menu.append("<option value='"+ task.id +"'>" + task.title_ar + "</option>");
}
});


});


$('select[name="floor_id"]').on('change',function(){
let floor_id = $(this).val();
lcr_id_menu.empty().trigger('change');
lcr_id_menu.append("<option value=''> --- </option>");
$.each(lcrs, function(i,lcr) {
if( lcr.floor_id == floor_id ){
lcr_id_menu.append("<option value='"+ lcr.id +"'>" + lcr.title_ar + "</option>");
}
});
});

</script>
@endpush