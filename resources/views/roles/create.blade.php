<x-app>
  <h2>Atribuições</h2>

  <div class="bg-light p-3 shadow-sm">
    {{ html()->form('POST', route('roles.store'))->open() }}
      <div class="row">
        @include('roles._form')
      </div>
      <div class="d-flex justify-content-end">
        <a href="{{ route('roles.index') }}" class="btn btn-secondary me-2">Cancelar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    {{ html()->form()->close() }}
  </div>  
  
</x-app>