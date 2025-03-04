<ul class="treeview">
@foreach ($permissions as $permission)
    @if (array_key_exists('title', $permission))
      <li>
        <div>
          <input type="checkbox" class="title-check form-check-input me-2">
          <span class="title">{{ $permission['title'] }}</span>
        </div>
        <ul>
          @if (!empty($permission['items']))
            @foreach ($permission['items'] as $item)
              <li class="description">
                <input type="checkbox" name="permissions[]" value="{{ $item['name'] }}" {{ isset($role) && $role->permissions->where('name', $item['name'])->first() ? 'checked' : ''}} class="permission-check form-check-input me-2"> {{ $item['description'] }}
              </li>
            @endforeach
          @endif
        </ul>
      </li>
    @endif
@endforeach
</ul>

@push('js')
<script>
  const $treeview = document.querySelector('.treeview');
  const $treeviewUls = document.querySelectorAll('.treeview ul');
  const $treeviewTitle = document.querySelectorAll('.title');
  const $titleCheck = document.querySelectorAll('.title-check');
  const $permissionCheck = document.querySelectorAll('.permission-check');

  $treeviewTitle.forEach(element => {
    element.addEventListener('click', () => {
      element.parentNode.parentNode.classList.toggle('opened');
    });
  });

  $titleCheck.forEach(element => {
    element.addEventListener('change', () => {
      const children = element.parentNode.nextElementSibling.children;
      const checked = element.checked; 

      for (const child of children) {
        child.firstElementChild.checked = checked;          
      }
    })
  });

  $treeviewUls.forEach(element => {
    isAllChecked(element);
  });

  $permissionCheck.forEach(element => {
    element.addEventListener('change', () => {
      isAllChecked(element.parentNode.parentNode);
    })
  });

  function isAllChecked(element) {
    var check = true;

    for (let child of element.children) {
      
      for (input of child.children) {
        if (! input.checked) {
          check = false;
          break;
        }
      }
    }

    element.previousElementSibling.firstElementChild.checked = check;
  }

</script>
@endpush