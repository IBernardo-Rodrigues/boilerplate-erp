<x-app>
  <h2>Gestão</h2>

  <div class="bg-light rounded shadow-dm p-3">
    <h5 class="mb-4">Usuários</h5>

    <div class="row p-2">
      <div class="col-md-12 mb-3">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><strong>Nome:</strong></h5>
            <p class="card-text">{{ $user->name }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><strong>Email:</strong></h5>
            <p class="card-text">{{ $user->email }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><strong>Função:</strong></h5>
            <p class="card-text">{{ $user->roles()->implode('name', ',') }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-end mt-2">
      <a class="btn btn-primary" href="{{ route('users.index') }}">Voltar</a>
    </div>
  </div>
</x-app>