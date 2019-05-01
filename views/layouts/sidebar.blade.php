<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Gestion</li>
            <li @if(request()->path() === 'tcgadmin')class="active"@endif><a href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
            <!-- Optionally, you can add icons to the links -->
            <li @if(request()->segment(2) == 'commandes')class="active"@endif"><a href="{{ route(config('tcgv2_bo.route.commande_index')) }}"><i class="fa fa-shopping-cart"></i> <span>Commandes</span></a></li>
            <li @if(request()->segment(2) == 'commandes-non-payees')class="active"@endif"><a href="{{ route(config('tcgv2_bo.route.commande_abandonnees')) }}"><i class="fa fa-shopping-bag"></i> <span>Commandes abandonnées</span></a></li>
            {{--<li><a href="#"><i class="fa fa-times"></i> <span>Commandes expirées</span></a></li>
            <li><a href="#"><i class="fa fa-send"></i> <span>Accessoires à envoyer</span></a></li>--}}
            <li @if(request()->segment(2) == 'code-promo')class="active"@endif"><a href="{{ route(config('tcgv2_bo.route.code_promo')) }}"><i class="fa fa-gift"></i> <span>Code promo</span></a></li>
            <li class="header">Administration</li>
            <li @if(request()->segment(2) == 'employees' || request()->segment(2) == 'roles' || request()->segment(2) == 'permissions') class="active" @endif"><a href="{{ route('admin.employees.index') }}"><i class="fa fa-users"></i> <span>Employés</span></a></li>
            {{--<li><a href="../admin_demarche.html"><i class="fa fa-university"></i> <span>Démarches</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-basket"></i> <span>Articles</span></a></li>
            <li><a href="#"><i class="fa fa-cogs"></i> <span>Paramètres</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-car"></i> <span>Ants</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">Véhicule</a></li>
                    <li><a href="#">Département</a></li>
                    <li><a href="#">Régions</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-sitemap"></i> <span>Pages</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../page_cgv.html">CGV</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Mention légales</a></li>
                </ul>
            </li>--}}
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>