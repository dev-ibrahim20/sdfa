
@if (count($errors) || Session()->has('msg'))

<div class="col-12 alert_div">

@if (count($errors))
@foreach ($errors->all() as $error)
<div class="row">
<p style="color:red;"> <i style="color:black;" class="fe-alert-circle"></i>  {!! $error !!} </p>
</div>
@endforeach

@endif

@if (Session()->has('msg'))
<div class="alert alert-{{ Session::get('alert') }}" role="{{ Session::get('alert') }}"  >
<i class="fe-check"></i> {!! Session::get("msg") !!}
</div>
@endif

</div>
@push('scripts')
<script>
$('.alert_div').show().delay(5000).fadeOut();
</script>
@endpush
@endif
