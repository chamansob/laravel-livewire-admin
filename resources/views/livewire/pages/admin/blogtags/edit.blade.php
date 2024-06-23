<?php

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;


new #[Layout('layouts.dashboard')] class extends Component {
    //
    public $blogtag;

}; ?>
@section('title', breadcrumb())
<div>

    <div class="page-content">

        <livewire:dashboard.components.breadcrumbs  :button="true" :function="'create'" />

        <a wire:navigate href="/admin/blogtags" class="btn btn-inverse-info my-2">Show Blog Tag</a>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Blog Tag </h6>

                        <livewire:pages.admin.blogtags.components.blogtagsform :blogtag="$blogtag" :is_edit="true" />
                    </div>
                </div>
            </div>

        </div>


        </div>
         </div>
