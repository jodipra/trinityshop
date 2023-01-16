<div class="sidebar" data-color="white" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
  <div class="logo"><a href="#" class="simple-text logo-normal">
      Trinity House
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item  {{ Request::is('dashboard') ? 'active':'' }} ">
        <a class="nav-link" href="{{ url('dashboard') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('listperumahan') ? 'active':'' }} ">
        <a class="nav-link" href="{{ url('listperumahan') }}">
          <i class="material-icons">holiday_village</i>
          <p>List Perumahan</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('add-listperumahan') ? 'active':'' }} ">
        <a class="nav-link" href="{{ url('add-listperumahan') }}">
          <i class="material-icons">add_business</i>
          <p>Add List perumahan</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('unitrumah') ? 'active':'' }} ">
        <a class="nav-link" href="{{ url('unitrumah') }}">
          <i class="material-icons">house</i>
          <p>Unit Rumah</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('add-unitrumah') ? 'active':'' }} ">
        <a class="nav-link" href="{{ url('add-unitrumah') }}">
          <i class="material-icons">add_home</i>
          <p>Add Unit Rumah</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('orders') ? 'active':'' }} ">
        <a class="nav-link" href="{{ url('orders') }}">
          <i class="material-icons">content_paste</i>
          <p>Orders</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('users') ? 'active':'' }} ">
        <a class="nav-link" href="{{ url('users') }}">
          <i class="material-icons">persons</i>
          <p>Users</p>
        </a>
      </li>
    </ul>
  </div>
</div>