<?php

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.dashboard')] class extends Component {
    public $blog;
    public $post_tags_ids = [];
}; ?>
@section('title', breadcrumb())
<div>

    <div class="page-content">

        <livewire:dashboard.components.breadcrumbs :name="'Create Blog'" :button="true" :function="'create'" />

        <a wire:navigate href="/admin/blogs" class="btn btn-inverse-info my-2">Show Blog</a>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Blog </h6>

                        <livewire:pages.admin.blogs.components.blogform :blog="$blog" :is_edit="true" />
                    </div>
                </div>
            </div>

        </div>


    </div>

