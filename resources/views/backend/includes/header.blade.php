<!-- Topbar Start -->
<div class="navbar-custom navbar-custom-light">
<ul class="list-unstyled topnav-menu float-right mb-0">

<li class="dropdown notification-list">
<a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQysqwVdNUKASMQcQau2kXUBBgpHjRz_YqRJwduBzCQfCIrSFvz&s" alt="user-image" class="rounded-circle">
<span class="pro-user-name ml-1">
{{Auth::user()->name}}<i class="mdi mdi-chevron-down"></i>
</span>
</a>
<div class="dropdown-menu dropdown-menu-right profile-dropdown ">


<a href="{{url('')}}/{{config('settings.BackendPath')}}/switch-language/{{ \Auth::user()->language == 'en' ? 'ar' : 'en' }}" class="dropdown-item notify-item">
<i class="fe-refresh-ccw "></i>
<span> {{ \Auth::user()->language == 'en' ? 'العربية' : 'English' }} </span>
</a>


<!-- item-->
<a href="{{url('')}}/logout" class="dropdown-item notify-item">
<i class="fe-log-out"></i>
<span>{{__('lang.logout')}} </span>
</a>

</div>
</li>


</ul>

<!-- LOGO -->
<div class="logo-box">
<a href="index.html" class="logo text-center">
<span class="logo-lg">
<img src="{{url('')}}/assets/admin/images/logo-light.png" alt="" height="50">
<!-- <span class="logo-lg-text-light">Connect-PS</span> -->
</span>
<span class="logo-sm">
<!-- <span class="logo-sm-text-dark">U</span> -->
<img src="{{url('')}}/assets/admin/images/logo-sm.png" alt="" height="24">
</span>
</a>
</div>

<ul class="list-unstyled topnav-menu topnav-menu-left m-0">
<li>
<button class="button-menu-mobile waves-effect waves-light">
<i class="fe-menu"></i>
</button>



</li>


</ul>
</div>
<!-- end Topbar -->

