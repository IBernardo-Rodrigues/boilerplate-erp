<aside class="sidebar">
  <div class="logo">
    <img src="{{ asset('assets/img/logo.png') }}" width="20" alt="Logo">
  </div>

  <div class="menu-toggler-wrapper">
    <div class="menu-toggler">
      <span class="material-icons">
        keyboard_double_arrow_right
      </span>
    </div>
  </div>

  @canany(['dashboard_view', 'users_view', 'roles_view'])
  <div class="menu">
    @can('dashboard_view')
      <a href="{{ route('dashboard') }}" class="link">
      <span class="material-icons">dashboard</span>
      <span class="link-content">Dashboard</span>
    </a>
    @endcan
    @can('users_view') 
    <a href="{{ route('users.index') }}" class="link"> 
      <span class="material-icons">group</span>
      <span class="link-content">Gestão</span>
    </a>
    @endcan
    @can('roles_view')
    <a href="{{ route('roles.index') }}" class="link"> 
      <span class="material-icons">edit_attributes</span>
      <span class="link-content">Atribuições</span>
    </a>
    @endcan
  </div>
  @endcanany
</aside>
