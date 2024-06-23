<?php

namespace App\Livewire\Pages\Admin\Blogcategory\Components;

use Livewire\Component;
use App\Models\Blogcategory;
use Livewire\Attributes\Validate;

class Blogcategoryform extends Component
{
    #[Validate('required|max:50')]
    public $category_name;
    public $blogcategory;
    public $is_edit = false;

    public function mount(Blogcategory $blogcategory, $is_edit = false)
    {
        $this->is_edit = $is_edit;
        $this->category_name = $blogcategory->category_name;
        $this->blogcategory = $blogcategory;
    }
    public function save()
    {

        if ($this->is_edit == false) {
            Blogcategory::insert([
                'category_name' => $this->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $this->category_name)),
            ]);
            session()->flash('message', 'Blog Category created Successfully');
            session()->flash('alert-type', 'success');
            $this->redirectIntended(default: route('blogcategory.index', absolute: false), navigate: true);
        } else {
            $this->blogcategory->update([
                'category_name' => $this->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $this->category_name)),
            ]);
            session()->flash('message', 'Blog Category updated Successfully');
            session()->flash('alert-type', 'success');
            $this->redirectIntended(default: route('blogcategory.edit', $this->blogcategory->id, absolute: false), navigate: true);
        }
    }

}
