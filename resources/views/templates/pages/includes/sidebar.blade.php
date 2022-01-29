<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="{{ asset("/assets/img/logo.png")}}" class="header-logo" /> <span
            class="logo-name"></span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
          <a href="{{ route('restaurant/dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="shopping-bag"></i><span>Article</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href={{ route('categories_articles')}}>Categories articles</a></li>
            <li><a class="nav-link" href={{ route('articles')}}>Liste des articles</a></li>
{{--            <li><a class="nav-link" href={{ route('serveurs')}}>Ajouter article</a></li>--}}
            <li><a class="nav-link" href={{ route('serveurs')}}>Ajouter stock</a></li>
            <li><a class="nav-link" href={{ route('serveurs')}}>Liste de stocks</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-cart"></i><span>Vente</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href={{ route('commandes')}}>Commandes</a></li>
            <li><a class="nav-link" href={{ route('commandes/livraisons')}}>Livraison</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="calendar"></i><span>Rapport</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href={{ route('categories_articles')}}>Journal de vente</a></li>
            <li><a class="nav-link" href={{ route('categories_articles')}}>Historique commandes</a></li>
          </ul>
        </li>
        {{-- <li class="menu-header">Parametres</li> --}}
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="settings"></i><span>Parametres</span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profil</a></li>
            <li><a href="#">Changer de mot de passe</a></li>
            <li><a class="nav-link" href={{ route('points_de_ventes')}}>Points de vente</a></li>
            <li><a class="nav-link" href={{ route('clients')}}>Clients</a></li>
            <li><a class="nav-link" href={{ route('serveurs')}}>Serveurs</a></li>
            <li><a class="nav-link" href={{ route('tables')}}>Tables</a></li>
            <li><a class="nav-link" href={{ route('espaces')}}>Espaces</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="x-square"></i><span>Deconnexion</span></a>
          <ul class="dropdown-menu">
            <li><a href={{ route("logout")}}>Se deconnecter</a></li>
          </ul>
        </li>
      </ul>
    </aside>
  </div>
