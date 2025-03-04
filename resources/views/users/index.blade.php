<x-app>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Gestão</h2>

    <div class="d-flex align-items-center gap-3">
      <a href="{{ route('users.create') }}" class="btn btn-primary d-block">
        Adicionar
      </a>
    </div>
  </div>

  <x-alerts/>
  <div class="card bg-light p-3 mb-3">
    <h5>Filtrar</h5>

    {{ html()->form('GET', route('users.index'))->open() }}
    <div class="row">
      <div class="form-group col-md-3 mb-3">
        {{ html()
            ->label('NOME', 'name') 
            ->attributes([
              'class' => 'form-label'
            ])
        }}
        {{ html()
            ->text('name')
            ->attributes([
              'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')
            ])
            ->value(request()->name)
        }}
        <x-input-error field="name"/>
      </div>
      
      <div class="form-group col-md-3 mb-3">
        {{ html()
            ->label('EMAIL', 'email') 
            ->attributes([
              'class' => 'form-label'
            ])
        }}
        {{ html()
            ->email('email')
            ->attributes([
              'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')
            ])
            ->value(request()->email)
        }}
        <x-input-error field="email"/>
      </div>
      
      <div class="form-group col-md-2 mb-3">
        {{ html()
            ->label('ATRIBUIÇÃO', 'role') 
            ->attributes([
              'class' => 'form-label'
            ])
        }}
        {{ html()
            ->select('role', $roles->pluck('name', 'id')->all(), request()->role )
            ->placeholder('Selecione...')
            ->attributes([
              'class' => 'form-select' . ($errors->has('role') ? ' is-invalid' : '')
            ])
        }}
        <x-input-error field="role"/>
      </div>
    </div>
    <div class="d-flex gap-3">
        <button type="submit" class="btn btn-primary">
          Filtrar
        </button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary text-white">
          Limpar
        </a>
    </div>
    {{ html()->form()->close() }}
  </div>

  <div class="card bg-light p-3">
    <h5>Usuários</h5>

    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>ATRIBUIÇÃO</th>
            <th class="text-center">AÇÃO</th>
          </tr>
        </thead>
        <tbody>
          @forelse($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles()->implode('name', ',') }}</td>
            <td class="text-center">
              <div class="btn-group dropstart">
                <span class="material-icons" data-bs-toggle="dropdown">more_vert</span>
                <ul class="dropdown-menu">
                  @can('users_view')
                  <li>
                    <a class="dropdown-item" href="{{ route('users.show', $user->id) }}">
                      Visualizar
                    </a>
                  </li>
                  @endcan
                  @can('users_edit')
                  <li>
                    <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                      Editar
                    </a>
                  </li>
                  @endcan
                  @can('users_delete')
                  <li>
                      <button class="dropdown-item btn-open-modal" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete" data-route="{{ route('users.destroy', $user->id) }}">
                        Deletar
                      </button>
                  </li>
                  @endcan
                </ul>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="4" class="text-center">Nenhuma informação encontrada</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{ $users->links() }}
  </div>

  @include('components.modal-confirm-delete')
</x-app>