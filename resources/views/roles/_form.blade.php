<div class="form-group col-md-5 mb-3">
  {{ html()
      ->label('Descrição', 'name') 
      ->attributes([
        'class' => 'form-label'
      ])
  }}
  {{ html()
      ->text('name')
      ->required()
      ->attributes([
        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')
      ])
  }}
  <x-input-error field="name"/>
</div>

<div class="row mb-3">
  <div class="card bg-light mt-3 p-3">
    <h5>Atribuições</h5>

    <div>
      @include('roles._treeview-permissions')
    </div>
  </div>
</div>