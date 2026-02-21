@if( $files->count() )
<table class="table table-striped table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
<thead>
<tr>
<th> {{__('lang.title')}} </th>
<th> Download </th>
</tr>
</thead>

<tbody>
@foreach( $files as $file )
<tr>
<td>{{$file->title ?? ''}}</td>
<td>  <a target="_blank" href="{{url('')}}/uploads/contractors_files/{{ $file->file_name  ?? '' }}" > <i class="fa fa-download" aria-hidden="true"></i> </a> </td>
</tr>
@endforeach

</tbody>
</table>
@endif