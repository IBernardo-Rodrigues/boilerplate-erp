<x-app>
  <h3 class="fw-bold mb-4">Atribuições</h3>

  <div class="bg-light rounded p-3">
    <h4 class="mb-4">Atribuição</h4>

    <div class="row p-2">
      <div class="col-md-12 mb-3">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><strong>Descrição:</strong></h5>
            <p class="card-text">{{ $role->description }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-end mt-2">
      <a class="btn btn-primary" href="{{ route('roles.index') }}">Voltar</a>
    </div>
  </div>
</x-app>