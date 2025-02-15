<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
<div class="main-sidebar-header active">
    <!-- Logo pour les écrans de bureau - Thème clair -->
    <a class="desktop-logo logo-light active d-flex align-items-center" href="{{ url('/' . $page='home') }}">
        <img src="{{ URL::asset('assets/img/brand/logo2.png') }}" class="main-logo" alt="logo">
    </a>

    <!-- Logo pour les écrans de bureau - Thème sombre -->
    <a class="desktop-logo logo-dark active d-flex align-items-center" href="{{ url('/' . $page='home') }}">
        <img src="{{ URL::asset('assets/img/brand/logo2.png') }}" class="main-logo dark-theme" alt="logo">
    </a>

    <!-- Logo pour les écrans mobiles - Thème clair -->
    <a class="logo-icon mobile-logo icon-light active d-flex align-items-center" href="{{ url('/' . $page='home') }}"">
        <img src="{{ URL::asset('assets/img/brand/logo2.png') }}" class="logo-icon" alt="logo">
        <span style="font-size: 20px; font-weight: bold; color: #333; margin-left: 10px;">Invoice</span>
    </a>

    <!-- Logo pour les écrans mobiles - Thème sombre -->
    <a class="logo-icon mobile-logo icon-dark active d-flex align-items-center" href="{{ url('/' . $page='index') }}">
        <img src="{{ URL::asset('assets/img/brand/logo2.png') }}" class="logo-icon dark-theme" alt="logo">
    </a>
</div>


    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/brand/user.png')}}">
                    <span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->name}}</h4>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">Invoice</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . $page='home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/>
                        <path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/>
                    </svg>
                    <span class="side-menu__label">Page Principale</span><span class="badge badge-success side-badge">1</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                    <i class="fa fa-user side-menu__icon"></i>
                    <span class="side-menu__label">Gestion de Client</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('clients.create') }}">Ajouter un client</a></li>
                    <li><a class="slide-item" href="{{ route('clients.index') }}">Liste des clients</a></li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                    <i class="fa fa-cogs side-menu__icon"></i>
                    <span class="side-menu__label">Gestion Produit</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('produits.create') }}">Ajouter Produit</a></li>
                    <li><a class="slide-item" href="{{ route('produits.index') }}">Liste de Produit</a></li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                    <i class="fa fa-file-invoice side-menu__icon"></i>
                    <span class="side-menu__label">Gestion Facture</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('factures.create') }}">Ajouter Facture</a></li>
                    <li><a class="slide-item" href="{{ route('factures.index') }}">Liste de Facture</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<!-- main-sidebar -->
