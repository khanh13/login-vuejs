
<template>
  <nav id="sidebar" v-show="$route.path === '/login' || $route.path === '/register' || $route.path === '/home' || $route.path === '/'
    || $route.path === '/reset-password' ? false : true " style="display: none;">
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <img src="backend/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Login Vuejs</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <router-link :to="{name: 'home'}" class="nav-link">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></router-link>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Todos</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link :to="{name: 'store-todo'}" class="collapse-item">Add Todo</router-link>
            <router-link :to="{name: 'todos'}" class="collapse-item">All Todos </router-link>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Users</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link :to="{name: 'user'}" class="collapse-item">All User</router-link>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
  </nav>
</template>
