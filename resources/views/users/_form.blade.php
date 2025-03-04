<div class="form-group col-md-5 mb-3">
  {{ html()
      ->label('Nome', 'name') 
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
<div class="form-group col-md-5 mb-3">
  {{ html()
      ->label('Email', 'email') 
      ->attributes([
        'class' => 'form-label'
      ])
  }}
  {{ html()
      ->email('email')
      ->required()
      ->attributes([
        'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')
      ])
  }}
  <x-input-error field="email"/>
</div>
<div class="form-group col-md-2 mb-3">
  {{ html()
      ->label('Atribuição', 'role') 
      ->attributes([
        'class' => 'form-label'
      ])
  }}
  {{ html()
      ->select('role', $roles->pluck('name', 'id')->all(), isset($user) ? $user->roles()->implode('id', ',') : null )
      ->placeholder('Selecione...')
      ->required()
      ->attributes([
        'class' => 'form-select' . ($errors->has('role') ? ' is-invalid' : '')
      ])
  }}
  <x-input-error field="role"/>
</div>