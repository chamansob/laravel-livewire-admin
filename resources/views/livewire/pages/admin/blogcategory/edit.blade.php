<?php

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Blogcategory;

new #[Layout('layouts.dashboard')] class extends Component {
    //
    public $blogcategory;

}; ?>
@section('title', breadcrumb())
<div>

    <div class="page-content">

        <livewire:dashboard.components.breadcrumbs  :button="true" :function="'create'" />

        <a wire:navigate href="/admin/blogcategory" class="btn btn-inverse-info my-2">Show Blog Category</a>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Blog Category </h6>

                        <livewire:pages.admin.blogcategory.components.blogcategoryform :blogcategory="$blogcategory" :is_edit="true" />
                    </div>
                </div>
            </div>

        </div>


        </div>
         </div>
