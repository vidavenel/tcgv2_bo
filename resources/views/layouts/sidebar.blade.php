<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li @if(request()->path() === 'admin')class="active"@endif>
                <a href="{{ config('tcgv2_bo.route.dashboard') }}"> <i class="fa fa-home"></i> Tableau de bord</a>
            </li>
            <li @if(request()->segment(2) == 'commandes')class="active"@endif">
            <a href="{{ route(config('tcgv2_bo.route.commande_index')) }}"> <i class="fa fa-home"></i> Commandes</a>
            </li>
            @if($user->hasRole('admin|superadmin'))
                <li class="treeview @if(request()->segment(2) == 'employees' || request()->segment(2) == 'roles' || request()->segment(2) == 'permissions') active @endif">
                    <a href="#">
                        <i class="fa fa-star"></i> <span>Employés</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Liste des employés</a>
                        </li>
                        <li><a href="#"><i class="fa fa-plus"></i> Créer un employé</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->
