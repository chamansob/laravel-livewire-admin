<?php

namespace App\Livewire\Pages\Admin\Permissions\Components;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Permission;

class Permisssionform extends Component
{
    #[Validate('required|max:50')]
    public $name;
    public $is_edit = false;
    public $id = 0;
    public $permission;
    public $group_names;
    public $group_name_id;
    public function mount($id, $is_edit = false)
    {
        $this->is_edit = $is_edit;
        $this->group_names = PERMISSION;
        if ($id != 0) {
            $this->permission = Permission::find($id);
            $this->name = Permission::find($id)->name;
            $this->group_name_id = Permission::find($id)->group_name;
        }
    }
    public function save()
    {

        if ($this->is_edit == false) {
            Permission::create([
                'name' => $this->name,
                'group_name' => $this->group_name_id,
            ]);
            session()->flash('message', 'Permission created Successfully');
            session()->flash('alert-type', 'success');
            $this->redirectIntended(default: route('permissions.index', absolute: false), navigate: true);
        } else {
            $this->permission->update([
                'name' => $this->name,
                'group_name' => $this->group_name_id,
            ]);
            session()->flash('message', 'Permission updated Successfully');
            session()->flash('alert-type', 'success');
            $this->redirectIntended(default: route('permission.edit', $this->permission->id, absolute: false), navigate: true);
        }
    }
}
