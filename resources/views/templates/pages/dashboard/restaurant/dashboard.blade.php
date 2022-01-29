@extends('templates.pages.dashboard.layouts.base')


@section('content')


{{-- <div class="loader"></div> --}}
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar sticky">
      <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                collapse-btn"> <i data-feather="align-justify"></i></a></li>
          <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
              <i data-feather="maximize"></i>
            </a></li>
          <li>
            <form class="form-inline mr-auto">
              <div class="search-element">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                <button class="btn" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </form>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
            class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
            <span class="badge headerBadge1">
              6 </span> </a>
          <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
            <div class="dropdown-header">
              Messages
              <div class="float-right">
                <a href="#">Mark All As Read</a>
              </div>
            </div>
            <div class="dropdown-list-content dropdown-list-message">
              <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
                    text-white"> <img alt="image" src="{{ asset("/assets/img/users/user-1.png")}}" class="rounded-circle">
                </span> <span class="dropdown-item-desc"> <span class="message-user">John
                    Deo</span>
                  <span class="time messege-text">Please check your mail !!</span>
                  <span class="time">2 Min Ago</span>
                </span>
              </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                  <img alt="image" src={{ asset("/assets/img/users/user-2.png")}} class="rounded-circle">
                </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                    Smith</span> <span class="time messege-text">Request for leave
                    application</span>
                  <span class="time">5 Min Ago</span>
                </span>
              </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                  <img alt="image" src={{ asset("/assets/img/users/user-5.png")}} class="rounded-circle">
                </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                    Ryan</span> <span class="time messege-text">Your payment invoice is
                    generated.</span> <span class="time">12 Min Ago</span>
                </span>
              </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                  <img alt="image" src={{ asset("/assets/img/users/user-4.png")}} class="rounded-circle">
                </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                    Smith</span> <span class="time messege-text">hii John, I have upload
                    doc
                    related to task.</span> <span class="time">30
                    Min Ago</span>
                </span>
              </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                  <img alt="image" src={{ asset("/assets/img/users/user-3.png")}} class="rounded-circle">
                </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                    Joshi</span> <span class="time messege-text">Please do as specify.
                    Let me
                    know if you have any query.</span> <span class="time">1
                    Days Ago</span>
                </span>
              </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                  <img alt="image" src={{ asset("/assets/img/users/user-2.png")}} class="rounded-circle">
                </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                    Smith</span> <span class="time messege-text">Client Requirements</span>
                  <span class="time">2 Days Ago</span>
                </span>
              </a>
            </div>
            <div class="dropdown-footer text-center">
              <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </li>
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
            class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
          </a>
          <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
            <div class="dropdown-header">
              Notifications
              <div class="float-right">
                <a href="#">Mark All As Read</a>
              </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
              <a href="#" class="dropdown-item dropdown-item-unread"> <span
                  class="dropdown-item-icon bg-primary text-white"> <i class="fas
                      fa-code"></i>
                </span> <span class="dropdown-item-desc"> Template update is
                  available now! <span class="time">2 Min
                    Ago</span>
                </span>
              </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
                      fa-user"></i>
                </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                    Sugiharto</b> are now friends <span class="time">10 Hours
                    Ago</span>
                </span>
              </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i
                    class="fas
                      fa-check"></i>
                </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                  moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                    Hours
                    Ago</span>
                </span>
              </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                    class="fas fa-exclamation-triangle"></i>
                </span> <span class="dropdown-item-desc"> Low disk space. Let's
                  clean it! <span class="time">17 Hours Ago</span>
                </span>
              </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
                      fa-bell"></i>
                </span> <span class="dropdown-item-desc"> Welcome to Otika
                  template! <span class="time">Yesterday</span>
                </span>
              </a>
            </div>
            <div class="dropdown-footer text-center">
              <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src={{ asset("/assets/img/user.png")}}
              class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
          <div class="dropdown-menu dropdown-menu-right pullDown">
            <div class="dropdown-title">Hello Sarah Smith</div>
            <a href="profile.html" class="dropdown-item has-icon"> <i class="far
                  fa-user"></i> Profile
            </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
              Activities
            </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
              Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href={{ route('logout')}} class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
              Se connecter
            </a>
          </div>
        </li>
      </ul>
    </nav>

    {{-- sidebar --}}

    @include('templates.pages.includes.sidebar')

    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="row ">
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15">New Booking</h5>
                        <h2 class="mb-3 font-18">258</h2>
                        <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src={{ asset("/assets/img/banner/1.png")}} alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15"> Customers</h5>
                        <h2 class="mb-3 font-18">1,287</h2>
                        <p class="mb-0"><span class="col-orange">09%</span> Decrease</p>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src={{ asset("/assets/img/banner/2.png")}} alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15">New Project</h5>
                        <h2 class="mb-3 font-18">128</h2>
                        <p class="mb-0"><span class="col-green">18%</span>
                          Increase</p>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src={{ asset("/assets/img/banner/3.png")}} alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15">Revenue</h5>
                        <h2 class="mb-3 font-18">$48,697</h2>
                        <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src={{ asset("/assets/img/banner/4.png")}} alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
        </div>
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                  <div class="card-header">
                      <h4>Revenue Chart</h4>
                  </div>
                  <div class="card-body">
                      <ul class="list-inline text-center">
                          <li class="list-inline-item p-r-30"><i data-feather="arrow-up-circle" class="col-green"></i>
                              <h5 class="m-b-0">$675</h5>
                              <p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                          </li>
                          <li class="list-inline-item p-r-30"><i data-feather="arrow-down-circle" class="col-orange"></i>
                              <h5 class="m-b-0">$1,587</h5>
                              <p class="text-muted font-14 m-b-0">Monthly Earnings</p>
                          </li>
                          <li class="list-inline-item p-r-30"><i data-feather="arrow-up-circle" class="col-green"></i>
                              <h5 class="mb-0 m-b-0">$45,965</h5>
                              <p class="text-muted font-14 m-b-0">Yearly Earnings</p>
                          </li>
                      </ul>
                      <div id="chart-rev" ></div>
                  </div>
              </div>
          </div>
          </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="main-footer">
      <div class="footer-left">
        <a href="#">Restaurant</a></a>
      </div>
      <div class="footer-right">
      </div>
    </footer>
  </div>
</div>

@include('templates.pages.dashboard.restaurant.script')


@endsection
