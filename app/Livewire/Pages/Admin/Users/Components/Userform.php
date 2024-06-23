<?php

namespace App\Livewire\Pages\Admin\Users\Components;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class Userform extends Component
{
    use WithFileUploads;
    #[Validate('required|max:200')]
    public $username;
    #[Validate('required|max:200')]
    public $name;
    #[Validate('required|email|max:200')]
    public $email;
    public $path = 'uploads/users/thumbnail';
    #[Validate('image|max:1024')]
    public $photo;
    public $photo_main;
    public $phone;
    public $password;
    public $top;
    public $about;
    public $role;
    public $roles;
    public $roles_id;

    public $user;
    public $is_edit = false;
    public function mount(User $user, $is_edit = false)
    {
        $this->is_edit = $is_edit;
        $this->user = $user;
        $this->username = $user->username;
        $this->name = $user->name;
        $this->photo_main  = $user->photo;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->about  = $user->about;
       // dd(count($user?->roles));
        if($is_edit && count($user?->roles)!=0){
        $this->roles_id  = $user?->roles[0]->id;
        }
        $this->roles = Role::select('name', 'id')->get();
    }

    public function save()
    {

        if ($this->is_edit == false) {
            if ($this->photo) {
                $save_url = $this->photo->store($this->path, 'public');
            }
           $user= User::insert(['name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'phone' => $this->phone,
                'photo' =>  $save_url,
                'role' => 'admin',
            ]);
            $role = Role::find($this->roles_id, 'name');
            $user->assignRole($role);

            session()->flash('message', 'User created Successfully');
            session()->flash('alert-type', 'success');
            $this->redirectIntended(default: route('blog.index', absolute: false), navigate: true);
        } else {


            if ($this->photo) {
                $save_url = $this->photo->store($this->path, 'public');
            } else {
                $save_url = $this->user->photo;
            }

            $this->user->update([
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'password' =>(empty($this->password)) ? $this->user->password : Hash::make($this->password),
                'phone' => $this->phone,
                'photo' =>  $save_url,
                'role' =>   'admin',

            ]);
            $role=Role::find($this->roles_id,'name');
            //dd($role->name);
            $this->user->assignRole($role->name);

            session()->flash('message', 'User updated Successfully');
            session()->flash('alert-type', 'success');
            $this->redirectIntended(default: route('user.edit', $this->user->id, absolute: false), navigate: true);
        }
    }
}
