<tr >
    <td>{{ $role->id }}</td>
    <td>{{ $role->name }}</td>
    <td>
        <button wire:navigate href="/admin/role/edit/{{ $role->id }}"  class="btn btn-inverse-warning"><i data-feather="edit"></i></button>

        <button wire:click="$parent.delete({{ $role->id }})" wire:confirm="Are you sure you want to delete"
            class="btn btn-inverse-danger"> <i data-feather="trash-2"></i></button>
    </td>

</tr>
