<x-app>
  <h2>Gestão</h2>

  <div class="bg-light p-3 shadow-sm">
    {{ html()->modelForm($user, 'PUT', route('users.update', $user->id))->open() }}
      <div class="row">
        @include('users._form')
      </div>
      <div class="d-flex justify-content-end">
        <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">Cancelar</a>
        <button class="btn btn-primary">Salvar</button>
      </div>
    {{ html()->closeModelForm() }}
  </div>  
  
</x-app>