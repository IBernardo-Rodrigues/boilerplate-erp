<x-app>
  <h2>Gestão</h2>

  <div class="bg-light p-3 shadow-sm">
    {{ html()->form('POST', route('users.store'))->open() }}
      <div class="row">
        @include('users._form')
      </div>
      <div class="d-flex justify-content-end">
        <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">Cancelar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    {{ html()->form()->close() }}
  </div>  
  
</x-app>