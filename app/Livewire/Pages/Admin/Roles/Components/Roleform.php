<?php

namespace App\Livewire\Pages\Admin\Roles\Components;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\Attributes\Validate;

class Roleform extends Component
{
    #[Validate('required|max:50')]
    public $name;
    public $is_edit = false;
    public $id=0;
    public $role;
    public function mount($id, $is_edit = false)
    {
        $this->is_edit = $is_edit;
        if($id!=0)
        {
        $this->role = Role::find($id);

       $this->name = Role::find($id)->name;
        }

    }
    public function save()
    {

        if ($this->is_edit == false) {
            Role::create([
                'name' => $this->name,
            ]);
            session()->flash('message', 'Role created Successfully');
            session()->flash('alert-type', 'success');
            $this->redirectIntended(default: route('roles.index', absolute: false), navigate: true);
        } else {
            $this->role->update(['name' => $this->name,
            ]);
            session()->flash('message', 'Role updated Successfully');
            session()->flash('alert-type', 'success');
            $this->redirectIntended(default: route('role.edit', $this->role->id, absolute: false), navigate: true);
        }
    }
}
