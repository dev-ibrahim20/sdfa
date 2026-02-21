
<div class="form-body">



<h4 class="form-section"><i class="la la-commenting"></i> {{__('lang.basic_information')}}</h4>



<div class="row">

<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"> {{__('lang.name')}} </label>

{!! Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> __('lang.name')] ) !!}

</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1">  {{__('lang.phone')}}     </label>

{!! Form::number('phone' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: 01000000000'] ) !!}

</div>

</div>





</div>

<h4 class="form-section"><i class="la la-commenting"></i>  {{__('lang.login_information')}}    </h4>


</div>
<div class="row">
<div class="col-md-3">
<div class="form-group">
<label for="projectinput3">  {{__('lang.email')}}   </label>

{!! Form::text('email', null , ['class' => 'form-control' , 'placeholder'=> __('lang.email')] ) !!}

</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1">  {{ __('lang.password')}}    </label>

{!! Form::password('password', ['class' => 'form-control' , 'placeholder'=> __('lang.password')] ) !!}
@if( isset($data) )
اتركها بدون كلمة مرور فى حال عدم تغيير كلمة المرور
@endif
</div>

</div>


</div>

<h4 class="form-section"><i class="la la-key"></i> {{ __('lang.roles')}}    </h4>

<div class="row">




@foreach ($roles as $role)

<div class="form-group  col-md-2">
<label>

<input @if(isset($data->roles)) @foreach ( $data->roles as $current_role )
@if ($current_role->id == $role->id) checked @endif
@endforeach @endif
name='role_id[]' value='{{$role->id}}' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple"> <B
title='@foreach($role->permissions as $permission ) {{ __("lang.".$permission->name) }} | @endforeach' > {{$role->title}}</B>

</label>
</div>

@endforeach


</div>

<div class="form-actions">

<button type="submit" class="btn btn-primary">
<i class="la la-check-square-o"></i> {{ __('lang.save')}}
</button>
</div>
