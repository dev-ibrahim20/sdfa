<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

<div class="slimscroll-menu">

<!--- Sidemenu -->
<div id="sidebar-menu">

<ul class="metismenu" id="side-menu">

<li class="menu-title">{{__('lang.navigation')}}</li>

<li>
<a href="{{url( config('settings.BackendPath'))}}">
<i class="fe-home"></i>
<span> {{__('lang.dashboard')}}   </span>
</a>
</li>


@can('list_samplings')
<li>
<a href="{{url( config('settings.BackendPath'))}}/samplings">
<i class="fe-grid"></i>
<span> {{__('lang.samplings')}}   </span>
</a>
</li>
@endcan


<!--
@can('list_tasks')
<li>
<a href="{{url( config('settings.BackendPath'))}}/tasks">
<i class="fas fa-tasks"></i>
<span> {{__('lang.buildings')}}   </span>
</a>
</li>
@endcan
-->

@can('list_cities')
<li>
<a href="{{url( config('settings.BackendPath'))}}/cities">
<i class="mdi mdi-adjust "></i>
<span> {{__('lang.cities')}}   </span>
</a>
</li>
@endcan


@can('list_workplaces')
<li>
<a href="{{url( config('settings.BackendPath'))}}/workplaces">
<i class="fas fa-tasks"></i>
<span> {{__('lang.workplaces')}}   </span>
</a>
</li>
@endcan


{{-- @can('list_contractors')
<li>
<a href="{{url( config('settings.BackendPath'))}}/contractors">
<i class="fa fa-hammer "></i>
<span>{{__('lang.contractors')}}</span>
</a>
</li>
@endcan --}}


@canany(['stock_transactions_report'])
<li class="{{ Request::is(config('settings.BackendPath').'/reports/*') ? 'active' : '' }}" >
<a href="javascript: void(0);">
<i class="fas fa-chart-bar"></i>
<span> {{__('lang.reports')}} {{ Request::is('reports/*') ? 'active' : '' }}</span>
<span class="menu-arrow"></span>
</a>
<ul class="nav-second-level" aria-expanded="false">
@can('stock_transactions_report')
<li>
<a href="{{url(config('settings.BackendPath'))}}/reports">
<i class="fe-file-text"></i><span>
تقارير
</span></a>
</li>

{{-- <li>
<a href="{{url(config('settings.BackendPath'))}}/reports/sample_report">
<i class="fe-file-text"></i><span>
الموقف التنفيذى
</span></a>
</li>
 --}}

@endcan
</ul>
</li>
@endcanany


@canany(['list_translate','list_clear_cache','list_general_settings','list_vendors','list_contractors','list_categories','list_units'])
<li class="{{ Request::is(config('settings.BackendPath').'/settings/*') || Request::is(config('settings.BackendPath').'/languages/*') || Request::is(config('settings.BackendPath').'/translate/*') ? 'active' : '' }}" >
<a href="javascript: void(0);">
<i class="fe-folder"></i>
<span> {{__('lang.settings')}} {{ Request::is('settings/*') || Request::is('languages/*') || Request::is('translate/*') ? 'active' : '' }}</span>
<span class="menu-arrow"></span>
</a>
<ul class="nav-second-level" aria-expanded="false">

{{-- <li>
<a href="{{url( config('settings.BackendPath'))}}/building_tasks">
<i class="mdi mdi-apps "></i>
<span>   Tasks Structure   </span>
</a>
</li> --}}

{{-- <li>
<a href="{{url( config('settings.BackendPath'))}}/building_floors">
<i class="mdi mdi-apps "></i>
<span>   Buildings Floors  </span>
</a>
</li> --}}

{{-- @can('list_products')
<li>
<a href="{{url( config('settings.BackendPath'))}}/products">
<i class="mdi mdi-apps "></i>
<span> {{__('lang.products')}}   </span>
</a>
</li>
@endcan --}}

{{-- @can('list_vendors')
<li>
<a href="{{url( config('settings.BackendPath'))}}/vendors">
<i class="fa fa-users"></i>
<span> {{__('lang.vendors')}}   </span>
</a>
</li>
@endcan --}}


{{-- @can('list_categories')
<li>
<a href="{{url( config('settings.BackendPath'))}}/categories">
<i class="fa fa-hammer "></i>
<span>{{__('lang.categories')}}</span>
</a>
</li>
@endcan --}}



{{-- @can('list_units')
<li>
<a href="{{url( config('settings.BackendPath'))}}/units">
<i class="fa fa-hammer "></i>
<span>{{__('lang.units')}}</span>
</a>
</li>
@endcan --}}


{{-- @can('list_project_stages')
<li>
<a href="{{url(config('settings.BackendPath'))}}/project_stages">
<i class="fe-file-text"></i><span>
{{__('lang.project_stages')}}
</span></a>
</li>
@endcan --}}

{{-- @can('list_translate')
<li>
<a href="{{url(config('settings.BackendPath'))}}/translate">
<i class="fe-file-text"></i><span>
{{__('lang.translate')}}
</span></a>
</li>
@endcan --}}

@can('list_clear_cache')
<li>
<a href="{{url(config('settings.BackendPath'))}}/clear-cache">
<i class="fe-file-text"></i><span>
{{__('lang.clear_cache')}}
</span></a>
</li>
@endcan

@can('list_general_settings')
<li>
<a href="{{url(config('settings.BackendPath').'/general-settings')}}">
<i class="fe-file-text"></i><span>
 {{__('lang.general_settings')}}
</span></a>
</li>
@endcan

</ul>
</li>
@endcanany


@canany(['list_users', 'list_roles'])
<li>
<a href="javascript: void(0);">
<i class="fe-folder"></i>
<span> {{__('lang.users')}}  </span>
<span class="menu-arrow"></span>
</a>
<ul class="nav-second-level" aria-expanded="false">

@can('list_users')
<li>
<a href="{{url(config('settings.BackendPath'))}}/users">
<i class="fe-file-text"></i><span>
{{__('lang.users')}}
</span></a>
</li>
@endcan

@can('list_roles')
<li>
<a href="{{url(config('settings.BackendPath'))}}/roles">
<i class="fe-file-text"></i><span>
{{__('lang.roles')}}
</span></a>
</li>
@endcan

</ul>
</li>
@endcanany


</ul>

</div>
<!-- End Sidebar -->

<div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
