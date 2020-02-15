@extends('layouts.app')

@section('styles')
<style>
.app-header {
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  width: 100%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  background-color: #009688;
  z-index: 1030;
  padding-right: 15px;
}
.app-header__logo {
  -webkit-box-flex: 1;
      -ms-flex: 1 0 auto;
          flex: 1 0 auto;
  color: #fff;
  text-align: center;
  font-family: 'Niconne';
  padding: 0 15px;
  font-size: 26px;
  font-weight: 400;
  line-height: 50px;
}

@media (min-width: 768px) {
  .app-header__logo {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
            flex: 0 0 auto;
    display: block;
    width: 230px;
    background-color: #007d71;
  }
}

.app-header__logo:focus, .app-header__logo:hover {
  text-decoration: none;
  color: #fff;
}

.app-sidebar__toggle {
  padding: 0 15px;
  font-family: fontAwesome;
  color: #fff;
  line-height: 2.4;
  -webkit-transition: background-color 0.3s ease;
  -o-transition: background-color 0.3s ease;
  transition: background-color 0.3s ease;
}

@media (max-width: 767px) {
  .app-sidebar__toggle {
    -webkit-box-ordinal-group: 0;
        -ms-flex-order: -1;
            order: -1;
  }
}

.app-sidebar__toggle:before {
  content: "\f0c9";
  font-size: 21px;
}

.app-sidebar__toggle:focus, .app-sidebar__toggle:hover {
  color: #fff;
  background-color: #00635a;
  text-decoration: none;
}

.app-nav {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  margin-bottom: 0;
  -webkit-box-pack: end;
      -ms-flex-pack: end;
          justify-content: flex-end;
}

@media (min-width: 768px) {
  .app-nav {
    -webkit-box-flex: 1;
        -ms-flex: 1 0 auto;
            flex: 1 0 auto;
  }
}

.app-nav__item {
  display: block;
  padding: 15px;
  line-height: 20px;
  color: #fff;
  -webkit-transition: background-color 0.3s ease;
  -o-transition: background-color 0.3s ease;
  transition: background-color 0.3s ease;
}

.app-nav__item:hover, .app-nav__item:focus {
  background: rgba(0, 0, 0, 0.1);
  color: #f6f6f6;
}

.app-search {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-item-align: center;
      align-self: center;
  margin-right: 15px;
  padding: 10px 0;
}

@media (max-width: 480px) {
  .app-search {
    display: none;
  }
}

.app-search__input {
  border: 0;
  padding: 5px 10px;
  padding-right: 30px;
  border-radius: 2px;
  background-color: rgba(255, 255, 255, 0.8);
  -webkit-transition: background-color 0.3s ease;
  -o-transition: background-color 0.3s ease;
  transition: background-color 0.3s ease;
}

.app-search__input::-webkit-input-placeholder {
  color: rgba(0, 0, 0, 0.4);
}

.app-search__input:-ms-input-placeholder {
  color: rgba(0, 0, 0, 0.4);
}

.app-search__input::-ms-input-placeholder {
  color: rgba(0, 0, 0, 0.4);
}

.app-search__input::placeholder {
  color: rgba(0, 0, 0, 0.4);
}

.app-search__button {
  position: absolute;
  right: 0;
  top: 10px;
  bottom: 10px;
  padding: 0 10px;
  border: 0;
  color: rgba(0, 0, 0, 0.8);
  background: none;
  cursor: pointer;
}

.app-notification {
  min-width: 270px;
}

.app-notification__title {
  padding: 8px 20px;
  text-align: center;
  background-color: rgba(0, 150, 136, 0.4);
  color: #333;
}

.app-notification__footer {
  padding: 8px 20px;
  text-align: center;
  background-color: #eee;
}

.app-notification__content {
  max-height: 220px;
  overflow-y: auto;
}

.app-notification__content::-webkit-scrollbar {
  width: 6px;
}

.app-notification__content::-webkit-scrollbar-thumb {
  background: rgba(0, 0, 0, 0.2);
}

.app-notification__item {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  padding: 8px 20px;
  color: inherit;
  border-bottom: 1px solid #ddd;
  -webkit-transition: background-color 0.3s ease;
  -o-transition: background-color 0.3s ease;
  transition: background-color 0.3s ease;
}

.app-notification__item:focus, .app-notification__item:hover {
  color: inherit;
  text-decoration: none;
  background-color: #e0e0e0;
}

.app-notification__message,
.app-notification__meta {
  margin-bottom: 0;
}

.app-notification__icon {
  padding-right: 10px;
}

.app-notification__message {
  line-height: 1.2;
}

.app-sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  padding-top: 70px;
  width: 230px;
  overflow: auto;
  z-index: 10;
  background-color: #222d32;
  -webkit-box-shadow: 0px 8px 17px rgba(0, 0, 0, 0.2);
          box-shadow: 0px 8px 17px rgba(0, 0, 0, 0.2);
  -webkit-transition: left 0.3s ease,
 width 0.3s ease;
  -o-transition: left 0.3s ease,
 width 0.3s ease;
  transition: left 0.3s ease,
 width 0.3s ease;
}

.app-sidebar::-webkit-scrollbar {
  width: 6px;
}

.app-sidebar::-webkit-scrollbar-thumb {
  background: rgba(0, 0, 0, 0.2);
}

@media print {
  .app-sidebar {
    display: none;
  }
}

@media (max-width: 767px) {
  .app-sidebar__overlay {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    z-index: 9;
  }
}

.app-menu {
  margin-bottom: 0;
  padding-bottom: 40px;
}

.app-menu__item {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 12px 15px;
  font-size: 1.08em;
  border-left: 3px solid transparent;
  -webkit-transition: border-left-color 0.3s ease,
 background-color 0.3s ease;
  -o-transition: border-left-color 0.3s ease,
 background-color 0.3s ease;
  transition: border-left-color 0.3s ease,
 background-color 0.3s ease;
  color: #fff;
}

.app-menu__item.active, .app-menu__item:hover, .app-menu__item:focus {
  background: #34444a;
  border-left-color: #009688;
  text-decoration: none;
  color: #fff;
}

.app-menu__icon {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 auto;
          flex: 0 0 auto;
  width: 25px;
}

.app-menu__label {
  white-space: nowrap;
  -webkit-box-flex: 1;
      -ms-flex: 1 1 auto;
          flex: 1 1 auto;
}

.treeview.is-expanded [data-toggle='treeview'] {
  border-left-color: #009688;
  background: #34444a;
}

.treeview.is-expanded .treeview-menu {
  max-height: 100vh;
}

/*
 .treeview.is-expanded .treeview-indicator {
  -webkit-transform: rotate(90deg);
      -ms-transform: rotate(90deg);
          transform: rotate(90deg);
}
*/
.treeview-menu {
  max-height: 0;
  overflow: hidden;
  -webkit-transition: max-height 0.3s ease;
  -o-transition: max-height 0.3s ease;
  transition: max-height 0.3s ease;
  background: #2a383e;
}

.treeview-item {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 5px 5px 5px 20px;
  font-size: 1em;
  color: #fff;
  padding: 12px !important;
}

.treeview-item.active, .treeview-item:hover, .treeview-item:focus {
  background: #0d1214;
  text-decoration: none;
  color: #fff;
}

.treeview-item .icon {
  margin-right: 10px;
}

.treeview-indicator {
  -webkit-transform-origin: center;
      -ms-transform-origin: center;
          transform-origin: center;
  -webkit-transition: -webkit-transform 0.3s ease;
  transition: -webkit-transform 0.3s ease;
  -o-transition: transform 0.3s ease;
  transition: transform 0.3s ease;
  transition: transform 0.3s ease, -webkit-transform 0.3s ease;
}

@media (min-width: 768px) {
  .sidebar-mini.sidenav-toggled .app-sidebar__user-name,
  .sidebar-mini.sidenav-toggled .app-sidebar__user-designation,
  .sidebar-mini.sidenav-toggled .treeview-indicator {
    display: none;
  }
  .sidebar-mini.sidenav-toggled .app-sidebar__user-avatar {
    width: 30px;
    height: 30px;
  }
  .sidebar-mini.sidenav-toggled .app-content {
    margin-left: 50px;
  }
  .sidebar-mini.sidenav-toggled .app-sidebar {
    left: 0;
    width: 50px;
    overflow: hidden;
  }
  .sidebar-mini.sidenav-toggled .app-sidebar:hover {
    overflow: visible;
  }
  .sidebar-mini.sidenav-toggled .app-menu__item {
    overflow: hidden;
  }
  .sidebar-mini.sidenav-toggled .app-menu__item:hover {
    overflow: visible;
  }
  .sidebar-mini.sidenav-toggled .app-menu__item:hover .app-menu__label {
    opacity: 1;
  }
  .sidebar-mini.sidenav-toggled .app-menu__item:hover + .treeview-menu {
    visibility: visible;
  }
  .sidebar-mini.sidenav-toggled .app-menu__label {
    display: block;
    position: absolute;
    top: 0;
    left: 50px;
    min-width: 180px;
    padding: 12px 5px 12px 20px;
    margin-left: -3px;
    line-height: 1;
    opacity: 0;
    background: #0d1214;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
  }
  .sidebar-mini.sidenav-toggled .treeview:hover .app-menu__item {
    overflow: visible;
    background: #0d1214;
    border-left-color: #009688;
    color: #fff;
  }
  .sidebar-mini.sidenav-toggled .treeview:hover .app-menu__label {
    opacity: 1;
  }
  .sidebar-mini.sidenav-toggled .treeview:hover .treeview-menu {
    max-height: 100vh;
    opacity: 1;
    visibility: visible;
    z-index: 10;
  }
  .sidebar-mini.sidenav-toggled .treeview .app-menu__label {
    border-bottom-right-radius: 0;
  }
  .sidebar-mini.sidenav-toggled .treeview-menu {
    position: absolute;
    left: 50px;
    min-width: 180px;
    padding: 12px 0;
    opacity: 0;
    border-bottom-right-radius: 4px;
    z-index: 9;
    visibility: hidden;
    -webkit-transition: visibility 0.3s ease;
    -o-transition: visibility 0.3s ease;
    transition: visibility 0.3s ease;
  }
}

.dropdown-menu {
  border-radius: 0;
  -webkit-box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.dropdown-menu.dropdown-menu-right {
  left: auto;
  right: 0;
}

.dropdown-item .fa,
.dropdown-item .icon {
  margin-right: 5px;
  vertical-align: middle;
}

.btn {
  cursor: pointer;
}


</style>



@endsection
@section('content')

<header class="app-header"><a class="app-header__logo" href="index.html">Bookie</a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

        <ul class="app-nav">
            <li class="app-search">

                <form method="GET" action="{{url('/search')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="search" id="search" class="form-control" placeholder="Search Books" value="{{ old('search') }}">
                        </div>
                        <div class="col-md-6">
                            <button class="btn"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <form method="POST" action="{{route('order')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="order" id="search" class="form-control app-search__input" placeholder="Search Order">
                        </div>
                        <div class="col-md-4">

                           <button class="btn btn app-search__button"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </li>
            <!--Notification Menu-->
            <li>
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
                    <i class="fa fa-bell-o fa-lg"></i>
                </a>
            </li>
            <!-- User Menu-->
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <i class="fa fa-user fa-lg"></i>
                </a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item" href="page-user.html">
                            <i class="fa fa-cog fa-lg"></i> Settings
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('profile',auth()->user()->id)}}">
                            <i class="fa fa-user fa-lg"></i> Profile
                        </a>
                    </li>
                    <li>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </li>
        </ul>

    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <div class="app-sidebar">

        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="{{route('admin.index')}}">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-book"></i>
                    <span class="app-menu__label">Books</span>
                    <i class="treeview-indicator fa fa-plus"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('book.index') }}">
                            <i class="icon fa fa-angle-right"></i> All Books
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{ route('book.create') }}">
                            <i class="icon fa fa-angle-right"></i> Add Book
                        </a>
                    </li>
                    <li>
                    <a href="{{url('admin/chat')}}" class="nav-link cart  my-2 my-lg-0" role="button">
                    <span><i class="fa fa-envelope" style=" font-size:17px;" aria-hidden="true"></i></span>
                    <span class="quntity">
                        {{DB::table('messages')
                    ->where('read',0)
                    ->where('to',Auth::user()->id)
                    ->count()}}
                    </span>
                </a>
                    </li>
                </ul>
            </li>





            <li>
                <a class="app-menu__item" href="{{ route('category.index') }}">
                    <i class="app-menu__icon fa fa-list-alt"></i>
                    <span class="app-menu__label">Categories</span>
                </a>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-sliders"></i>
                    <span class="app-menu__label">Sliders</span>
                    <i class="treeview-indicator fa fa-plus"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('slider.index') }}">
                            <i class="icon fa fa-angle-right"></i> All Sliders
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{ route('slider.create') }}">
                            <i class="icon fa fa-angle-right"></i> Add Slider
                        </a>
                    </li>
                </ul>
            </li>



            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-sliders"></i>
                    <span class="app-menu__label">Users</span>
                    <i class="treeview-indicator fa fa-plus"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('users-control') }}">
                            <i class="icon fa fa-angle-right"></i> All Users
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{ route('users.create') }}">
                            <i class="icon fa fa-angle-right"></i> Create Book Store
                        </a>
                    </li>
                </ul>
            </li>



            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-sliders"></i>
                    <span class="app-menu__label">Borrowers</span>
                    <i class="treeview-indicator fa fa-plus"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{url('/admin/borrowers')}}">
                            <i class="icon fa fa-angle-right"></i> Borrowers
                        </a>
                    </li>

                </ul>
            </li>

            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-sliders"></i>
                    <span class="app-menu__label">Orders</span>
                    <i class="treeview-indicator fa fa-plus"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{url('admin/order')}}">
                            <i class="icon fa fa-angle-right"></i> Orders
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a class="app-menu__item" href="{{url('admin/contact')}}">
                    <i class="app-menu__icon fa fa-address-card"></i>
                    <span class="app-menu__label">Contact us</span>
                </a>
            </li>





        </ul>
    </div>


<div class="container">
  
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <chat-app :user="{{ auth()->user() }}"></chat-app>
        </div>
    </div>
</div>



@endsection


@section('scripts')
<script src="{{ asset('js/bookshop.bundle.js') }}"></script>

<script>
    (function() {
        "use strict";

        var treeviewMenu = $('.app-menu');

        // Toggle Sidebar
        $('[data-toggle="sidebar"]').click(function(event) {
            event.preventDefault();
            $('.app').toggleClass('sidenav-toggled');
        });

        // Activate sidebar treeview toggle
        $("[data-toggle='treeview']").click(function(event) {
            event.preventDefault();
            if (!$(this).parent().hasClass('is-expanded')) {
                treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
                treeviewMenu.find("[data-toggle='treeview']").children('.treeview-indicator').removeClass('fa-minus').addClass('fa-plus');
            }
            $(this).parent().toggleClass('is-expanded');
            $(this).children('.treeview-indicator').toggleClass('fa-plus fa-minus');
        });

        // Set initial active toggle
        $("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

        //Activate bootstrip tooltips
        $("[data-toggle='tooltip']").tooltip();
    })();
</script>

@endsection