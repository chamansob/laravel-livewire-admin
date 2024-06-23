<?php

namespace App\Livewire\Dashboard\Components;

use App\Livewire\Actions\Logout;
use Livewire\Component;

class Nav extends Component
{
    public function render()
    {
        return view('livewire.dashboard.components.nav');
    }
    public function logout(Logout $logout): void
    {

        $logout();

        $this->redirect('/admin/login', navigate: true);
    }
}
