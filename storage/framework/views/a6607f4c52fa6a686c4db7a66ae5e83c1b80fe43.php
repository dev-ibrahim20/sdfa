<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

<div class="slimscroll-menu">

<!--- Sidemenu -->
<div id="sidebar-menu">

<ul class="metismenu" id="side-menu">

<li class="menu-title"><?php echo e(__('lang.navigation')); ?></li>

<li>
<a href="<?php echo e(url( config('settings.BackendPath'))); ?>">
<i class="fe-home"></i>
<span> <?php echo e(__('lang.dashboard')); ?>   </span>
</a>
</li>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_samplings')): ?>
<li>
<a href="<?php echo e(url( config('settings.BackendPath'))); ?>/samplings">
<i class="fe-grid"></i>
<span> <?php echo e(__('lang.samplings')); ?>   </span>
</a>
</li>
<?php endif; ?>


<!--
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_tasks')): ?>
<li>
<a href="<?php echo e(url( config('settings.BackendPath'))); ?>/tasks">
<i class="fas fa-tasks"></i>
<span> <?php echo e(__('lang.buildings')); ?>   </span>
</a>
</li>
<?php endif; ?>
-->

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_cities')): ?>
<li>
<a href="<?php echo e(url( config('settings.BackendPath'))); ?>/cities">
<i class="mdi mdi-adjust "></i>
<span> <?php echo e(__('lang.cities')); ?>   </span>
</a>
</li>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_workplaces')): ?>
<li>
<a href="<?php echo e(url( config('settings.BackendPath'))); ?>/workplaces">
<i class="fas fa-tasks"></i>
<span> <?php echo e(__('lang.workplaces')); ?>   </span>
</a>
</li>
<?php endif; ?>





<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['stock_transactions_report'])): ?>
<li class="<?php echo e(Request::is(config('settings.BackendPath').'/reports/*') ? 'active' : ''); ?>" >
<a href="javascript: void(0);">
<i class="fas fa-chart-bar"></i>
<span> <?php echo e(__('lang.reports')); ?> <?php echo e(Request::is('reports/*') ? 'active' : ''); ?></span>
<span class="menu-arrow"></span>
</a>
<ul class="nav-second-level" aria-expanded="false">
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_transactions_report')): ?>
<li>
<a href="<?php echo e(url(config('settings.BackendPath'))); ?>/reports">
<i class="fe-file-text"></i><span>
تقارير
</span></a>
</li>



<?php endif; ?>
</ul>
</li>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['list_translate','list_clear_cache','list_general_settings','list_vendors','list_contractors','list_categories','list_units'])): ?>
<li class="<?php echo e(Request::is(config('settings.BackendPath').'/settings/*') || Request::is(config('settings.BackendPath').'/languages/*') || Request::is(config('settings.BackendPath').'/translate/*') ? 'active' : ''); ?>" >
<a href="javascript: void(0);">
<i class="fe-folder"></i>
<span> <?php echo e(__('lang.settings')); ?> <?php echo e(Request::is('settings/*') || Request::is('languages/*') || Request::is('translate/*') ? 'active' : ''); ?></span>
<span class="menu-arrow"></span>
</a>
<ul class="nav-second-level" aria-expanded="false">





















<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_clear_cache')): ?>
<li>
<a href="<?php echo e(url(config('settings.BackendPath'))); ?>/clear-cache">
<i class="fe-file-text"></i><span>
<?php echo e(__('lang.clear_cache')); ?>

</span></a>
</li>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_general_settings')): ?>
<li>
<a href="<?php echo e(url(config('settings.BackendPath').'/general-settings')); ?>">
<i class="fe-file-text"></i><span>
 <?php echo e(__('lang.general_settings')); ?>

</span></a>
</li>
<?php endif; ?>

</ul>
</li>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['list_users', 'list_roles'])): ?>
<li>
<a href="javascript: void(0);">
<i class="fe-folder"></i>
<span> <?php echo e(__('lang.users')); ?>  </span>
<span class="menu-arrow"></span>
</a>
<ul class="nav-second-level" aria-expanded="false">

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_users')): ?>
<li>
<a href="<?php echo e(url(config('settings.BackendPath'))); ?>/users">
<i class="fe-file-text"></i><span>
<?php echo e(__('lang.users')); ?>

</span></a>
</li>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_roles')): ?>
<li>
<a href="<?php echo e(url(config('settings.BackendPath'))); ?>/roles">
<i class="fe-file-text"></i><span>
<?php echo e(__('lang.roles')); ?>

</span></a>
</li>
<?php endif; ?>

</ul>
</li>
<?php endif; ?>


</ul>

</div>
<!-- End Sidebar -->

<div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
<?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/test1/resources/views/backend/includes/sidebar.blade.php ENDPATH**/ ?>