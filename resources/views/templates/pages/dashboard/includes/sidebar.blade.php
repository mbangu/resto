<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="{{ asset("/assets/img/logo.png")}}" class="header-logo" /> <span
            class="logo-name">Restaurant</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
          <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-bag"></i><span>Restaurant</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="#">Categories restaurants</a></li>
            <li><a class="nav-link" href="#">Liste restaurants</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="settings"></i><span>Parametres</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="#">ajouter restaurant</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Changer de mot de passe</a></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="x-square"></i><span>Deconnexion</span></a>
            <ul class="dropdown-menu">
                <li><a href={{ route("logout")}}>Deconnexion</a></li>
            </ul>
          </li>
      </ul>
    </aside>
  </div>
