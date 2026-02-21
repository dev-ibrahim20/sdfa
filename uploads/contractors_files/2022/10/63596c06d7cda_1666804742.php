@extends('frontend.layouts.default')
@section('content')
<section class="main-content mt-3">
<div class="container-xl">


<div class="row rtl">				
<div class="col-lg-12" style="margin-bottom:10px;">
<div class="tagsection">
@foreach( $page_sub_categories as $sub_category )
<a href="{{url('')}}/{{$sub_category->name}}" > {{$sub_category->web_name ?? ''}} </a>
@endforeach
</div>
</div>
</div>



<nav aria-label="breadcrumb">
<ol class="breadcrumb rtl">
<li class="breadcrumb-item"><a href="{{url('')}}">الرئيسية</a></li>

@if( isset($category->parent->title) )
	<li class="breadcrumb-item"><a href="">  
      {{$category->parent->title}}
	  </a></li>
    @endif
    
<li class="breadcrumb-item"> {{$category->title}}  </li>
</ol>
</nav>

<div class="row gy-4 rtl ">






<div class="col-lg-8">

<div class="row gy-4">



@foreach ($posts as $post)

<div class="col-sm-6">
<div class="post post-grid rounded bordered">
<div class="thumb top-rounded">
<a href="{{$post->path()}}" class="category-badge position-absolute"> 
{{$category->title}}  </a>
<span class="post-format">
<i class="icon-picture"></i>
</span>
<a href="{{$post->path()}}">
<div class="inner">

@if(isset($post->image['image']))
<img src="{{url('')}}/image/230/153/{{$post->image['image']}}" alt="{{ $post->image['title'] or $post->title }}" >
@else
<img src="{{$post->image_from_live_site}}" alt="{!!$post->title!!}" >
@endif
</div>
</a>
</div>
<div class="details">
<ul class="meta list-inline mb-0">

@foreach ( $post->sources as $source )
<li class="list-inline-item"><a href="{{$source->path()}}">
{{$source->title}}
</a></li>
@endforeach


<li class="list-inline-item">{{$post->PublishDateTime()}}</li>
</ul>
<h5 class="post-title mb-3 mt-3"><a href="{{$post->path()}}">{!!$post->title!!}
</a></h5>
</div>
</div>
</div>

@endforeach







</div>



</div>


<div class="col-lg-4">


@include('frontend.includes.posts_tabs_sidebar')

@include('frontend.includes.newsletter_sidebar')



</div>

</div>

</div>
</section>
@endsection
@section('meta')
<title>{{$category->title}} | {{config('app.name')}}</title>
@endsection