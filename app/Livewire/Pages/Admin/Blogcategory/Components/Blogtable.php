<?php

namespace App\Livewire\Pages\Admin\Blogcategory\Components;

use Livewire\Component;
use App\Models\Blogcategory;
class Blogtable extends Component
{

    public Blogcategory $bcat;

    public function render()
    {
        return view('livewire.pages.admin.blogcategory.components.blogtable');
    }
}
