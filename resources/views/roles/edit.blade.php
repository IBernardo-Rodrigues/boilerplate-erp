<x-app>
  <h2>Atribuições</h2>

  <div class="card bg-light p-3">
    {{ html()->modelForm($role, 'PUT', route('roles.update', $role->id))->open() }}
      <div class="row">
        @include('roles._form')
      </div>
      <div class="d-flex justify-content-end">
        <a href="{{ route('roles.index') }}" class="btn btn-secondary me-2">Cancelar</a>
        <button class="btn btn-primary">Salvar</button>
      </div>
    {{ html()->closeModelForm() }}
  </div>  
  
</x-app>