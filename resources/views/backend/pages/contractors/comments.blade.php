@if($comments->count())
<span class="text-nowrap mb-2 d-inline-block">

<a href="#" style="color:#48ad56" ><i data-toggle="modal" data-target="#exampleModal" class="fa fa-thumbs-up mr-3" aria-hidden="true"> {{$contractor->ratings->where('rating',1)->count()}} </i></a>

<a href="#" style="color:#ED314C" ><i class="fa fa-thumbs-down mr-3" aria-hidden="true"> {{$contractor->ratings->where('rating',0)->count()}} </i> </a>

<a href="#"  style="color:#6C757D" ><i class="mdi mdi-comment-multiple-outline " aria-hidden="true">  </i>  <b> {{$contractor->ratings->whereNotNull('comment')->count()}} </b></a>
</span>

<table class="table table-striped table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
<thead>
<tr>
<th> {{__('lang.created_by')}} </th>
<th> {{__('lang.comment')}} </th>
</tr>
</thead>

<tbody>
@foreach( $comments as $comment )
<tr>
<td>{{$comment->user->name ?? ''}}</td>
<td> {!! $comment->rating ==  1 ? '<i class="fa fa-thumbs-up mr-3" aria-hidden="true">' : '<i class="fa fa-thumbs-down mr-3" aria-hidden="true">' !!}  {{$comment->comment}}</td>
</tr>
@endforeach

</tbody>
</table>
@endif