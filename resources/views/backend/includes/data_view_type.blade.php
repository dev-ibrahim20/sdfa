

<div class="btn-group mb-3 ml-2 d-none d-sm-inline-block">
<a href="{{url('')}}/{{config('settings.BackendPath')}}/switch-data-view/kanban"><button type="button" class="btn btn-{{ \Auth::user()->data_view_type == 'kanban' ? 'dark' : 'link text-dark' }}">  <i class="mdi mdi-apps"></i> </button></a>
</div>

<div class="btn-group mb-3 d-none d-sm-inline-block">
<a href="{{url('')}}/{{config('settings.BackendPath')}}/switch-data-view/list"><button type="button" class="btn btn-{{ \Auth::user()->data_view_type == 'list' ? 'dark' : 'link text-dark' }} "><i class="mdi mdi-format-list-bulleted-type"></i></button></a>
</div>
