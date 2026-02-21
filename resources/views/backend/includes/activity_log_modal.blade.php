<div class="modal-header">
<h5 class="modal-title" id="activityLogLabel"> {{__('lang.activity_list')}} | {{ $info->title ?? $info->product->title ?? $info->project->title ?? $info->user->name ?? $info->warehouse->title ?? $info->name  ?? ''}} </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="card">
<div class="card-body">
<div  class="row">

<table id="div_task_products_table" class="table table-hover mt-1 mb-0">
<thead class="thead-light">
<tr>
<th>#</th>
<th>{{__('lang.activity')}}</th>
<th>{{__('lang.created_at')}}</th>
<th>{{__('lang.created_by')}}</th>
<th>{{__('lang.before')}}</th>
<th>{{__('lang.after')}}</th>
</tr>
</thead>
<tbody >

@foreach( $activity_log as $k=>$log )
<tr>
<th scope="row">{{$k+1}}</th>
<td>{{__('lang.'.$log->description)}}</td>                                 
<td>{{$log->created_at}}</td> 
<td>{{$log->user->name ?? ''}}</td>   
<td>
@if( is_array(Arr::get($log , 'properties.old') ) )
@foreach( Arr::get($log , 'properties.old') as $k=>$log_item )

<li> {{ __('lang.'.$k)}} : {{ get_key_trans($k,$log_item) }} </li>

@endforeach
@endif
</td>  
<td>
@if( is_array(Arr::get($log , 'properties.attributes') ) )
@foreach( Arr::get($log , 'properties.attributes') as $k=>$log_item )

<li> {{__('lang.'.$k)}} : {{ get_key_trans($k,$log_item) }} </li>

@endforeach
@endif
</td>  
</tr>
@endforeach

</tbody>
</table>


</div>  <!-- end row -->
</div> <!-- end card body-->
</div> <!-- end card -->

</div>

