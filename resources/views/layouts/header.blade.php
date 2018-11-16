
<div class="header py-4">
  <div class="container">
    <div class="d-flex">
      <a class="header-brand" href="{{ url('/') }}">
        <img src="{{ $logo_url }}" class="header-brand-img" alt="{{ config('app.name', 'Laravel') }}">
      </a>
      <div class="d-flex order-lg-2 ml-auto">
      @guest
      <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
        <li class="nav-item">
          <a href="https://ursinusgivingday.com/users" class="nav-link ">
            <i class="fe fe-users"></i> Users
          </a>
        </li>
        <li class="nav-item">
          <a href="https://ursinusgivingday.com/settings" class="nav-link ">
            <i class="fe fe-settings"></i> Settings
          </a>
        </li>
      </ul>
      <div class="nav-item d-none d-md-flex">
        <a href="{{ route('register') }}" class="nav-link pr-0 leading-none" data-toggle="dropdown">
          Register
        </a>
      </div>
      @else
        @include('layouts.notifications')
        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
            <span class="avatar avatar-{{ auth()->user()->color }}">{{ auth()->user()->initials }}</span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default">{{ Auth::user()->name }}</span>
              <small class="text-muted d-block mt-1">{{ Auth::user()->email }}</small>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="#">
              <i class="dropdown-icon fe fe-user"></i> Profile
            </a>
            <a class="dropdown-item" href="#">
              <i class="dropdown-icon fe fe-settings"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="dropdown-icon fe fe-log-out"></i> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
      @endguest
      </div>
      <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>
