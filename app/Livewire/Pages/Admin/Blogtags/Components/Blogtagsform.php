<?php

namespace App\Livewire\Pages\Admin\Blogtags\Components;

use App\Models\Blogtag;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Blogtagsform extends Component
{
    #[Validate('required|max:200')]
    public $tag_name;
    public $is_edit = false;
    public $blogtag;
    public function mount(Blogtag $blogtag, $is_edit = false)
    {
        $this->blogtag = $blogtag;
        $this->is_edit = $is_edit;
        $this->tag_name = $blogtag->tag_name;
    }
    public function save()
    {


        if ($this->is_edit == false) {

            Blogtag::insert([
                'tag_name' => $this->tag_name,
                'tag_slug' => strtolower(str_replace(' ', '-', $this->tag_name)),
            ]);
            session()->flash('message', 'Blog Tag created Successfully');
            session()->flash('alert-type', 'success');
            $this->redirectIntended(default: route('blogtags.index', absolute: false), navigate: true);
        } else {


            $this->blogtag->update([
                'tag_name' => $this->tag_name,
                'tag_slug' => strtolower(str_replace(' ', '-', $this->tag_name)),
            ]);

            session()->flash('message', 'Blog Tag updated Successfully');
            session()->flash('alert-type', 'success');
            $this->redirectIntended(default: route('blogtags.edit', $this->blogtag->id, absolute: false), navigate: true);
        }
    }

}
