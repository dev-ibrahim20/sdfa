
<div class="form-body">

<div class="row">



    <div class="col-xl-12">
        <div class="card-box">


<div class="row">
<?php $i = 0; ?>
@foreach ($data as $k=>$row)
<div class="col-sm-3">
<div class="form-group">
<input type="text" name="{{$i}}" value="{{ $row ?? $k }}" class="form-control" >
</div>
</div>
<?php $i++; ?>
@endforeach
</div>

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

