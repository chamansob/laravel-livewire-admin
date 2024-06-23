<tr >
    <td>{{ $bcat->id }}</td>
    <td>{{ $bcat->category_name }}</td>
    <td>{{ $bcat->category_slug }}</td>

    <td><button wire:click="$parent.status({{ $bcat->id }})" wire:confirm="Are you sure you want to {{ ($bcat->status==1) ? 'active':'deactive' }}" class="btn badge rounded-pill bg-{{ ($bcat->status==0) ? 'success':'danger' }}">{{ ($bcat->status==0) ? 'Active':'Deactive' }}
                                                    </button></td>
    <td>
        <button wire:navigate href="/admin/blogcategory/edit/{{ $bcat->id }}"  class="btn btn-inverse-warning"><i data-feather="edit"></i></button>

        <button wire:click="$parent.delete({{ $bcat->id }})" wire:confirm="Are you sure you want to delete"
            class="btn btn-inverse-danger"> <i data-feather="trash-2"></i></button>
    </td>

</tr>
