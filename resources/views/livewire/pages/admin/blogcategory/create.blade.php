<?php

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;


new #[Layout('layouts.dashboard')] class extends Component {
    //

}; ?>
@section('title', breadcrumb())
<div>

    <div class="page-content">

        <livewire:dashboard.components.breadcrumbs :name="'Create Blog Category'" :button="true" :function="'create'" />

         <a wire:navigate href="/admin/blogcategory" class="btn btn-inverse-info my-2">Show Blog Category</a>
       <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Create Blog Category </h6>
                    <livewire:pages.admin.blogcategory.components.blogcategoryform />
                </div>
            </div>
        </div>

    </div>


    </div>
