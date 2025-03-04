<div class="navbar d-xxl-flex align-items-center justify-content-between justify-content-md-end px-3">

    <p class="material-icons menu-hamburger d-md-none p-0 m-0">
        menu
    </p>
    <div class="user-info-wrapper d-flex align-items-center gap-3">
        <span>{{ auth()->user()->name }}</span>
        
        <div class="dropdown">
        <div class="profile-image position-relative" data-bs-toggle="dropdown">
            <img src="{{ auth()->user()->profile_img ? asset('storage/' . auth()->user()->profile_img) : asset('assets/img/no-profile.jpg') }}" alt="" width="40" height="40" class="rounded-circle position-absolute top-0 bottom-0 start-0 end-0">
        </div>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('profile.index') }}">Minha Conta</a></li>
            <li><a class="dropdown-item" href="{{ route('change-password.edit') }}">Redefinir Senha</a></li>
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('DELETE')
            <li><button type="submit" class="dropdown-item" href="#">Sair</button></li>
            </form>
        </ul>
        </div>
    </div>
</div>