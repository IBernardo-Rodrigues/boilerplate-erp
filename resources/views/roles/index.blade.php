<x-app>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Atribuições</h2>

    <a href="{{ route('roles.create') }}" class="btn btn-primary">
      Adicionar Novo
    </a>
  </div>
  <x-alerts/>
  <div class="card bg-light p-3">
    <h5>Atribuições</h5>

    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>DESCRIÇÃO</th>
            <th class="text-center">AÇÃO</th>
          </tr>
        </thead>
        <tbody>
          @forelse($roles as $role)
          <tr>
            <td>{{ $role->name }}</td>
            <td class="text-center">
              <div class="btn-group dropstart">
                <span class="material-icons" data-bs-toggle="dropdown">more_vert</span>
                <ul class="dropdown-menu">
                  @can('roles_view')
                  <li>
                    <a class="dropdown-item" href="{{ route('roles.show', $role->id) }}">
                      Visualizar
                    </a>
                  </li>
                  @endcan
                  @can('roles_edit')
                  <li>
                    <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}">
                      Editar
                    </a>
                  </li>
                  @endcan
                  @can('roles_delete')
                  <li>
                      <button class="dropdown-item btn-open-modal" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete" data-route="{{ route('roles.destroy', $role->id) }}">
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

    {{ $roles->links() }}
  </div>

  @include('components.modal-confirm-delete')
</x-app>