<?php

namespace App\Livewire\Pages\Admin\Blogs\Components;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Blogcategory;
use App\Models\Blogtag;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Blogform extends Component
{
    use WithFileUploads;
    #[Validate('required|max:200')]
    public $post_title;
    public $blogcategory;
    public $path = 'uploads/blogs/thumbnail';
    #[Validate('image|max:1024')]
    public $blogcat;
    public $blogtags;
    public $post_image;
    public $post_image_main;
    public $short_descp;
    public $long_descp;
    public $post_tags_ids = [];
    public $blogcat_id;
    public $blog;
    public $is_edit = false;

    public function mount(Blog $blog, $is_edit = false)
    {
        $this->is_edit = $is_edit;
        $this->post_title = $blog->post_title;
        $this->post_image_main  = $blog->post_image;
        $this->short_descp = $blog->short_descp;
        $this->long_descp = $blog->long_descp;
        $this->blogcat_id  = $blog->blogcat_id;
        $this->post_tags_ids  = explode(",",$blog->post_tags);
        $this->blog = $blog;
        $this->blogcat= Blogcategory::select('category_name','id')->where('status',0)->get();
        $this->blogtags = Blogtag::select('tag_name', 'id')->get();
    }

    public function save()
    {


        if ($this->is_edit == false) {
            if ($this->post_image) {
                $save_url = $this->post_image->store($this->path, 'public');
            }
            Blog::insert([
                'blogcat_id' => $this->blogcat,
                'user_id' => Auth::user()->id,
                'post_title' => $this->post_title,
                'post_slug' => strtolower(str_replace(' ', '-', $this->post_title)),
                'post_image' =>  $save_url,
                'short_descp' => $this->short_descp,
                'long_descp' => $this->long_descp,
                //'post_tags' => $this->blogtags,
            ]);
            session()->flash('message', 'Blog created Successfully');
            session()->flash('alert-type', 'success');
            $this->redirectIntended(default: route('blog.index', absolute: false), navigate: true);
        } else {

            $tags=implode(",",$this->post_tags_ids);
            if ($this->post_image) {
                $save_url = $this->post_image->store($this->path, 'public');
            }else
            {
                $save_url = $this->blog->post_image;
            }

            $this->blog->update([
                'blogcat_id' => $this->blogcat_id,
                'user_id' => Auth::user()->id,
                'post_title' => $this->post_title,
                'post_slug' => strtolower(str_replace(' ', '-', $this->post_title)),
                'post_image' =>  $save_url,
                'short_descp' => $this->short_descp,
                'long_descp' => $this->long_descp,
                'post_tags' => $tags,
                 ]);

            session()->flash('message', 'Blog updated Successfully');
            session()->flash('alert-type', 'success');
            $this->redirectIntended(default: route('blog.edit', $this->blog->id, absolute: false), navigate: true);
        }
    }

}
