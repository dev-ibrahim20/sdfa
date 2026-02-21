
<div class="form-body">


    @if (count($errors))


    <div id='msg' class="note note-danger">

     من فضلك أدخل بيانات جميع الحقول المميزة بعلامة *

 </div>


 @endif


 <div class="form-group  margin-top-20 @if ($errors->has('name')) has-error @endif">
    <label class="control-label col-md-3">أسم المجموعة
        <span class="required"> * </span>
    </label>
    <div class="col-md-4">
        <div class="input-icon right">
            <i class="fa"></i>

            {!! Form::text('name', null ,  ['class' => 'form-control' , 'placeholder' => 'Webmasters'] ) !!}
            @if ($errors->has('name'))
            <span class="help-block">
                {{ $errors->first('name') }}
            </span>
            @endif


        </div>
    </div>
</div>


<div class="form-group  margin-top-20 @if ($errors->has('label')) has-error @endif">
    <label class="control-label col-md-3">العنوان
        <span class="required"> * </span>
    </label>
    <div class="col-md-4">
        <div class="input-icon right">
            <i class="fa"></i>

            {!! Form::text('label', null ,  ['class' => 'form-control' , 'placeholder' => 'الويب ماستر'] ) !!}
            @if ($errors->has('label'))
            <span class="help-block">
                {{ $errors->first('label') }}
            </span>
            @endif


        </div>
    </div>
</div>




<div class="form-group  margin-top-20">
    <label class="control-label col-md-3">تمميز منشوراته </label>
        
    
    <div class="col-md-4">
        <div class="input-icon right">
            <i class="fa"></i>

            <input @if ( isset($role->id) && $role->highlight_posts == 1 ) checked @endif name='highlight_posts' value='1' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple">
            


        </div>
    </div>
</div>

<hr>


<div class="form-group  margin-top-20">
<label class="control-label col-md-3">
الصلاحيات
<span class="required"> * </span>
</label>


    <div class="tab-pane" id="portlet_tab_1_2">
        <div class="skin skin-square">

            <div class="form-group">

                <div class="input-group">
                    <div class="icheck-list">

@foreach ($permissions as $main_permission)

<hr style='border-top: 3px solid #8c8b8b;'>

<label>

                            <input @if ( isset($role->id) && $role->permissions->contains('id' , $main_permission->id)) checked @endif name='permissions[]' value='{{$main_permission->id}}' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple"> <B style='color:red;'>{{$main_permission->label}} </B> 

                        </label>
						


						
@foreach ($main_permission->children_all_menu as $permission)
	
                        <label>

                            <input @if ( isset($role->id) && $role->permissions->contains('id' , $permission->id)) checked @endif name='permissions[]' value='{{$permission->id}}' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple"> {{$permission->label}} 

                        </label>

						
@foreach ($permission->children_all_menu as $sub_permission)

	
                        <label>

                            ---- <input @if ( isset($role->id) && $role->permissions->contains('id' , $sub_permission->id)) checked @endif name='permissions[]' value='{{$sub_permission->id}}' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple"> {{$sub_permission->label}} 

                        </label>

@endforeach						
						

@endforeach


@endforeach 						



                    </div>
                </div>
            </div>
        </div>
    </div>







</div> 






</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green">{{ $submiteText }}</button>

        </div>
    </div>
</div>